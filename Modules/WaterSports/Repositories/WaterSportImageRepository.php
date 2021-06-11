<?php

namespace Modules\WaterSports\Repositories;

use Illuminate\Support\Facades\Session;
use Modules\WaterSports\Entities\WaterSportImage;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class WaterSportImageRepository extends LaravelRepositoryClass
{
    public function __construct(WaterSportImage $model)
    {
        $this->model = $model;
    }


    public function insertMultiImages(array $images)
    {
        $this->model->insert($images);
    }
   
}
