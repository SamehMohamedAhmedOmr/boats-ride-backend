<?php

namespace Modules\Users\Repositories;

use Modules\Users\Entities\Admin;
use Modules\Users\Entities\Permission;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class PermissionRepository extends LaravelRepositoryClass
{
    public function __construct(Permission $permm)
    {
        $this->model = $permm;
    }

}
