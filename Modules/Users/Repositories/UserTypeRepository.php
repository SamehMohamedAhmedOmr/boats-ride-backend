<?php

namespace Modules\Users\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;
use Modules\Users\Entities\UserTypes;

class UserTypeRepository extends LaravelRepositoryClass
{
    public function __construct(UserTypes $user)
    {
        $this->model = $user;
    }

    public function getTypeID($key)
    {
        return $this->model->where('key',$key)->first()->id;
    }
}