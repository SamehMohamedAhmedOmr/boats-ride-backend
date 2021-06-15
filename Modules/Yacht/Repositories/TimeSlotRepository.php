<?php

namespace Modules\Yacht\Repositories;

use Modules\Yacht\Entities\Yacht;
use Modules\Yacht\Entities\TimeSlot;
use Illuminate\Support\Facades\Session;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class TimeSlotRepository extends LaravelRepositoryClass
{
    public function __construct(TimeSlot $model)
    {
        $this->model = $model;
    }


    public function getAvalialbleSlotsForYacht($date,$yacht_id)
    {
        return $this->model->availableInYachtTrips($date,$yacht_id)->get();
    }

    public function getUnAvalialbleSlotsForYacht($date,$yacht_id)
    {
        return $this->model->notAvailableInYachtTrips($date,$yacht_id)->get();
    }
   
}
