<?php

namespace Modules\Frontend\Repositories;

use Illuminate\Support\Facades\Session;
use Modules\Frontend\Entities\Settings;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class SettingsRepository extends LaravelRepositoryClass
{
    public function __construct(Settings $model)
    {
        $this->model = $model;
    }


    public function getFirst($conditions = [],$load = [])
    {
        return $this->model->with($load)->where($conditions)->first();
    }

}
