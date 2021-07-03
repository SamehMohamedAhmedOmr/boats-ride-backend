<?php

namespace Modules\Users\Services\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Users\Transformers\PermissionResource;
use Modules\Users\Repositories\PermissionRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;

class PermissionService extends LaravelServiceClass
{
    private $perm_repo;

    public function __construct(PermissionRepository $perm_repo)
    {
        $this->perm_repo = $perm_repo;
    }

    public function index()
    {
        $permissions = parent::all($this->perm_repo);

        $pagination = null;

        $permissions = PermissionResource::collection($permissions);
        return ApiResponse::format(200, $permissions, null, $pagination);
    }

}
