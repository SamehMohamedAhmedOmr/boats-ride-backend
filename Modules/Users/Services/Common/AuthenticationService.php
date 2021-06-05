<?php

namespace Modules\Users\Services\Common;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Services\Classes\MediaService;
use Modules\Notifications\Services\CMS\EmailService;
use Modules\Users\Entities\Clients;
use Modules\Users\Facades\UsersErrorsHelper;
use Modules\Users\Repositories\ResetPasswordRepository;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Transformers\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\PasswordBroker;

class AuthenticationService extends LaravelServiceClass
{
    private $user_repo;
    private $reset_password_repo;
    private $email_service;
    private $mediaService;

    private $admin_type = 1;
    private $client_type = 2;
    private $doctor_type = 3;

    private $session;

    public function __construct(
        UserRepository $user,
        ResetPasswordRepository $resetPassword,
        EmailService $email_service,
        MediaService $mediaService,
        SessionManager $session
    )
    {
        $this->user_repo = $user;
        $this->reset_password_repo = $resetPassword;
        $this->email_service = $email_service;

        $this->mediaService = $mediaService;

        $this->session = $session;
    }

    /**
     * Handles User login
     *
     * @return JsonResponse
     */
    public function loginAsUser()
    {
        $loginStatus = $this->user_repo->AuthAttempt();

        if ($loginStatus) {
            $user =  Auth::user();

            if ($user->user_type != $this->client_type) { // should 2 to be Client
                UsersErrorsHelper::unAuthenticated();
            }

            $this->checkinActiveStatus($user);

            $tokenResult = $user->createToken(env('APP_NAME'));

            $user = $this->user_repo->update($user->id, ['token_last_renew' => Carbon::now()]);

            $token = $tokenResult->token;
            (request('remember_me'))? $token->expires_at = Carbon::now()->addMonths(2) : $token->expires_at = Carbon::now()->addMonths(1);
            $token->save();

            // Determine The Response Shape in login
            $auth = new UserResource($user, $tokenResult->accessToken, $token->expires_at);

            return ApiResponse::format(200, $auth, trans('user.login'));
        } else {
            UsersErrorsHelper::unAuthenticated();
        }
    }

    /**
     * Handles Doctor login
     *
     * @return JsonResponse
     */
    public function loginAsDoctor()
    {
        $loginStatus = $this->user_repo->AuthAttempt();

        if ($loginStatus) {
            $user =  Auth::user();

            if ($user->user_type != $this->doctor_type) { // should 3 to be Client
                UsersErrorsHelper::unAuthenticated();
            }

            $this->checkinActiveStatus($user);

            $tokenResult = $user->createToken(env('APP_NAME'));

            $user = $this->user_repo->update($user->id, ['token_last_renew' => Carbon::now()]);

            $token = $tokenResult->token;
            (request('remember_me'))? $token->expires_at = Carbon::now()->addMonths(2) : $token->expires_at = Carbon::now()->addMonths(1);
            $token->save();


            $user->load('doctor');
            $user = $this->loadDoctorData($user);

            // Determine The Response Shape in login
            $auth = new UserResource($user, $tokenResult->accessToken, $token->expires_at);

            return ApiResponse::format(200, $auth, trans('user.login'));
        } else {
            UsersErrorsHelper::unAuthenticated();
        }
    }
    /**
     * Handles Admin login
     *
     * @return JsonResponse
     */
    public function loginAsAdmin()
    {
        $loginStatus = $this->user_repo->AuthAttempt();

        if ($loginStatus) {
            $user =  Auth::user();

            if ($user->user_type != $this->admin_type) { // should 1 to be Admin
                UsersErrorsHelper::unAuthenticated();
            }

            $this->checkinActiveStatus($user);

            $tokenResult = $user->createToken(env('APP_NAME'));

            $user = $this->user_repo->update($user->id, ['token_last_renew' => Carbon::now()]);

            $token = $tokenResult->token;
            (request('remember_me'))? $token->expires_at = Carbon::now()->addMinutes(120) : $token->expires_at = Carbon::now()->addMinutes(60);
            $token->save();

            // Determine The Response Shape in login
            $auth = new UserResource($user, $tokenResult->accessToken, $token->expires_at);

            return ApiResponse::format(200, $auth, trans('user.login'));
        } else {
            UsersErrorsHelper::unAuthenticated();
        }
    }


    private function checkinActiveStatus($user){
        if (!$user->is_active) {
            UsersErrorsHelper::inActiveAccount();
        }
    }

    /**
     * Handles Register
     *
     * @param $request
     * @return JsonResponse
     */
    public function register($request)
    {
        return DB::transaction(function () use ($request) {

            $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'profile') : null;

            //Create User Record
            $user = $this->user_repo->create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'user_type' => $this->client_type, // client type = 2
            ]);

            // Create Client Record
            $client = new Clients();
            $client->phone = request('phone');
            $client->image = $image;
            $user->patient()->save($client);

            // Save token Last Renew
            $tokenResult = $user->createToken(env('APP_NAME'));
            $user = $this->user_repo->update($user->id, ['token_last_renew' => Carbon::now()]);

            // Save New Token
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addMonths(1);
            $token->save();

            // Determine The Response Shape in register
            $auth = new UserResource($user, $tokenResult->accessToken, $token->expires_at, true);

            return ApiResponse::format(200, $auth, trans('user.register'));
        });

    }


    public function logout()
    {
        $value = false;
        if (Auth::check()) {
            $value = Auth::user()->token()->revoke();
        }
        return ApiResponse::format(200, $value, 'Logout Successfully');
    }

    /**
     * Handles Reset Password
     *
     * @return JsonResponse
     */
    public function resetPassword()
    {
        $oldPassword = request('old_password');
        $check = Hash::check($oldPassword, Auth::user()->password);
        if ($check) {
            Auth::user()->password = bcrypt(request('new_password'));
            Auth::user()->save();
            return ApiResponse::format(200, [], trans('passwords.change'));
        } else {
            UsersErrorsHelper::inCorrectPassword();
        }
    }

    /**
     * Create token password forget
     *
     * @param  [string] email
     * @return JsonResponse
     */
    public function forgetPassword()
    {
        $user = $this->user_repo->getData(['email' => request('email')]);
        $passwordReset = $this->reset_password_repo->updateOrCreate(
            [
                'email' => $user->email
            ],
            [
                'email' => $user->email,
                'token' => $this->generateResetPassswordToken($user)
            ]
        );
        if ($user && $passwordReset) {
            $render_data = [
                'token' => $passwordReset->token,
                'subdomain'=> \URL::to('/'),
                'recipient' => $user->name,
            ];

            // Send email with token
            $this->email_service->email(
                $user->email,
                'Users',
                'Reset-Password.reset-password',
                '[' . config('app.name') . '] Please reset your Password',
                $render_data
            );
        }

        return ApiResponse::format(200, null, trans('passwords.sent'));
    }

    /**
     * Generate token for reset password
     *
     * @param  [User] $user
     * @return JsonResponse
     */
    public function generateResetPassswordToken($user)
    {
        $passwordBroker = resolve(PasswordBroker::class);
        return $passwordBroker->createToken($user);
    }

    public function isResetPassswordTokenExpired($update_at)
    {
        return Carbon::parse($update_at)->addMinutes(config('auth.passwords.users.expire'))->isPast();
    }


    public function isForgetPasswordTokenValidToUse($token)
    {
         $passwordReset = $this->reset_password_repo->getData(
            [
                ['token', $token],
            ]
        );


        return ($passwordReset && ! $this->isResetPassswordTokenExpired($passwordReset->updated_at));

    }

    /**
     * Reset password
     *
     */
    public function forgetChangePassword()
    {
        $passwordReset = $this->reset_password_repo->getData(
            [
                ['token', request('token')],
            ]
        );

        if (!$passwordReset) {
            UsersErrorsHelper::tokenInvalid();
        }

        if ($this->isResetPassswordTokenExpired($passwordReset->updated_at)) {
            $this->reset_password_repo->delete($passwordReset->id);
            UsersErrorsHelper::tokenExpired();
        }

        // Get the user object
        $user = $this->user_repo->getData(['email' => $passwordReset->email]);

        // Update User object
        $user = $this->user_repo->update($user->id, ['password' => bcrypt(request('password'))]);

        // delete reset password record
        $this->reset_password_repo->delete($passwordReset->id);

        // Sending Confirmation Email
        $render_data = [
            'recipient' => $user->name,
        ];

        $this->email_service->email(
            $user->email,
            'Users',
            'Reset-Password.success-reset-password',
            '[' . config('app.name') . '] Password Change Successfully',
            $render_data
        );

        return ApiResponse::format(200, null, trans('passwords.change'));
    }
}
