<?php

namespace Modules\Users\Services\Common;

use Illuminate\Support\Facades\Auth;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Services\Classes\MediaService;
use Modules\Users\Repositories\ClientsRepository;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Transformers\AdminResource;
use Modules\Users\Transformers\ClientsResource;
use Modules\Users\Transformers\UserSummaryResource;

class UserService extends LaravelServiceClass
{
    private $user_repo;
    private $client_repo;
    private $mediaService;

    protected $admin_type = 1;
    protected $client_type = 2;
    protected $doctor_type = 3;


    public function __construct(
        UserRepository $user,
        ClientsRepository $client_repo,
        MediaService $mediaService
    )
    {
        $this->user_repo = $user;
        $this->client_repo = $client_repo;

        $this->mediaService = $mediaService;
    }


    public function userSummary()
    {
        if (request('is_pagination')) {
            list($users, $pagination) = parent::paginate($this->user_repo, false, [
                'user_type' => $this->client_type
            ]);
        } else {
            $users = $this->user_repo->all([
                'user_type' => $this->client_type
            ]);
            $pagination = null;
        }

        $users->load('patient');

        $users = UserSummaryResource::collection($users);
        return ApiResponse::format(200, $users, [], $pagination);
    }

    public function get()
    {
        $user = Auth::user();

        $user = $this->getUserResource($user);

        return ApiResponse::format(201, $user);
    }

    public function update($id, $request = null)
    {
        $user = $this->user_repo->update($id, $request->all());
        $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'profile') : null;

        if ($request->has('phone') && $user->user_type == $this->client_type) {
            $data = [
                'phone' => $request->phone,
            ];

            if ($image){
                $data['image'] = $image;
            }
            $this->client_repo->update($user->patient->id, $data);
        }

        $user = $this->getUserResource($user);

        return ApiResponse::format(201, $user);
    }


    private function getUserResource($user)
    {
        if ($user->user_type == $this->admin_type) {
            $user->load('admin');
            $user = AdminResource::make($user);
        } elseif ($user->user_type == $this->client_type) {
            $user->load('patient');
            $user = ClientsResource::make($user);
        }
        return $user;
    }

}
