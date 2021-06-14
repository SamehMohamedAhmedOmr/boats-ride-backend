<?php

namespace Modules\Seo\Repositories;

use Modules\Seo\Entities\Seo;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class SeoRepository extends LaravelRepositoryClass
{

    public function __construct(Seo $model)
    {
        $this->model  = $model;
    }
}
