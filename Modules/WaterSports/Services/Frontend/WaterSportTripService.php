<?php

namespace Modules\WaterSports\Services\Frontend;

use Illuminate\Support\Facades\Session;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\WaterSports\Repositories\WaterSportTripRepository;



class WaterSportTripService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(WaterSportTripRepository $repository)
    {
        $this->repository = $repository;
    }


    public function showVoutcherEmail($booking_number){
        Session::put('locale', 'en');
        $model = $this->repository->get($booking_number,[],'booking_number',['waterSport.images']);
        return $model;
    }

}    