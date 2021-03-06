<?php

namespace Modules\Users\Services\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Base\Facade\ExcelExportHelper;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Users\ExcelExports\AdminExport;
use Modules\Users\Transformers\AdminResource;
use Modules\Users\Repositories\UserRepository;
use Modules\Users\Repositories\AdminRepository;
use Modules\Users\Transformers\PermissionResource;
use Modules\Base\Services\Classes\LaravelServiceClass;

class AdminService extends LaravelServiceClass
{
    private $user_repo;
    private $adminRepository;
    protected $admin_type = 1;

    public function __construct(UserRepository $user_repo, AdminRepository $adminRepository)
    {
        $this->user_repo = $user_repo;
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        if (request('is_pagination')) {
            list($users, $pagination) = parent::paginate($this->user_repo, true, [
                'user_type' => $this->admin_type
            ]);
        } else {
            $users = parent::all($this->user_repo, true, [
                'user_type' => $this->admin_type
            ]);
            $pagination = null;
        }

        $users->load([
            'roles',
        ]);

        $users = AdminResource::collection($users);
        return ApiResponse::format(200, $users, null, $pagination);
    }

    /**
     * Handles Add New Admin
     *
     * @param null $request
     * @return JsonResponse
     */
    public function store($request = null)
    {
        return DB::transaction(function () use ($request) {

            $user_data = $request->all();
            $user_data['user_type'] = $this->admin_type;
            $user_data['password'] = bcrypt($user_data['password']);

            $user =  $this->user_repo->create($user_data);

            $this->user_repo->syncRoles($user, $request->roles);

            $this->user_repo->syncPermissions($user,$request->input('permissions',[]));

            $user->load([
                'roles',
            ]);

            $user = AdminResource::make($user);
            return ApiResponse::format(201, $user, 'Admin Added!');
        });
    }

    public function show($id)
    {
        $user = $this->user_repo->get($id, [
            'user_type' => $this->admin_type
        ]);

        $user->load([
            'roles','permissions'
        ]);

        $user = AdminResource::make($user);
        return ApiResponse::format(201, $user);
    }

    public function update($id, $request = null)
    {
        $user = $this->user_repo->update($id, $request->only('name', 'email', 'is_active'));

        if ($request->roles) {
            $this->user_repo->syncRoles($user, $request->roles);
        }
        
        if ($request->permissions) {
            $this->user_repo->syncPermissions($user,$request->permissions);
        }
          
        $user->load([
            'roles',
        ]);

        $user = AdminResource::make($user);
        return ApiResponse::format(200, $user);
    }

    public function delete($id)
    {
        $user = $this->user_repo->delete($id);
        return ApiResponse::format(200, $user, 'Admin Deleted!');
    }

    public function export(){
        $file_path = ExcelExportHelper::export('Admins', \App::make(AdminExport::class));

        return ApiResponse::format(200, $file_path);
    }


    public function getMyPermissions($user_id)
    {
        $perms = $this->user_repo->getMyPermission($user_id);
        return ApiResponse::format(200, PermissionResource::collection($perms));
    }
}
