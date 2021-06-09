<?php

namespace Modules\Yacht\Repositories;

use Modules\Yacht\Entities\Yacht;
use Modules\Yacht\Entities\YachtImage;
use Illuminate\Support\Facades\Session;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class YachtImageRepository extends LaravelRepositoryClass
{
    public function __construct(YachtImage $model)
    {
        $this->model = $model;
    }


    public function insertMultiImages(array $images)
    {
        $this->model->insert($images);
    }
   
}
