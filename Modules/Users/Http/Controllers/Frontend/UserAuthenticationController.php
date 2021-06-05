<?php

namespace Modules\Users\Http\Controllers\Frontend;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Users\Http\Requests\DoctorRegisterRequest;
use Modules\Users\Http\Requests\LoginRequest;
use Modules\Users\Http\Requests\PasswordForgetRequest;
use Modules\Users\Http\Requests\PasswordRequest;
use Modules\Users\Http\Requests\PasswordResetRequest;
use Modules\Users\Http\Requests\RegisterRequest;
use Modules\Users\Services\Common\AuthenticationService;
use Modules\Base\Facade\UtilitiesHelper;
class UserAuthenticationController extends Controller
{
    private $authService;

    public function __construct(AuthenticationService $auth)
    {
        $this->authService = $auth;
    }

    /**
     * Handles user login
     *
     * @param loginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        return $this->authService->loginAsUser();
    }

    /**
     * Handles Doctor login
     *
     * @param loginRequest $request
     * @return JsonResponse
     */
    public function loginAsDoctor(LoginRequest $request)
    {
        return $this->authService->loginAsDoctor();
    }

    /**
     * Register api
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }


    /**
     * Register api
     *
     * @param DoctorRegisterRequest $request
     * @return JsonResponse
     */
    public function registerAsDoctor(DoctorRegisterRequest $request)
    {
        return $this->authService->registerAsDoctor($request);
    }

    public function logout()
    {
        return $this->authService->logout();
    }

    /**
     * Handles Reset Password
     *
     * @param PasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(PasswordRequest $request)
    {
        return $this->authService->resetPassword();
    }

    public function forgetPassword(PasswordForgetRequest $request)
    {
        return $this->authService->forgetPassword();
    }

    /**
     * Reset password
     *
     * @param PasswordResetRequest $request
     * @return JsonResponse
     */
    // public function forgetChangePassword(PasswordResetRequest $request)
    // {
    //     return $this->authService->forgetChangePassword();
    // }
    public function forgetChangePassword(PasswordResetRequest $request)
    {
        $this->authService->forgetChangePassword();
        return redirect()->back()->with('success', 'Your password changed Successfully, Please login with the new password');
    }


    public function getResetPasswordForm($token)
    {
        $tokenValid = $this->authService->isForgetPasswordTokenValidToUse($token);      
        return view("users::reset-form", ['token' => $token, 'web_url' => env('WEBSITE_URL'), 'tokenValid' => $tokenValid]);
    }
}
