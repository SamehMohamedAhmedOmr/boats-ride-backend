<?php

namespace Modules\Users\Repositories;

use Modules\Base\Repositories\Classes\LaravelRepositoryClass;
use Modules\Users\Entities\Admin;

class AdminRepository extends LaravelRepositoryClass
{
    public function __construct(Admin $admin)
    {
        $this->model = $admin;
    }

}
