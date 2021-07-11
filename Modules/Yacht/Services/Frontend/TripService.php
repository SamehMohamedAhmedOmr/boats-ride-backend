<?php

namespace Modules\Yacht\Services\Frontend;

use Illuminate\Support\Facades\Session;
use Modules\Yacht\Repositories\TripRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;



class TripService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(TripRepository $repository)
    {
        $this->repository = $repository;
    }


    public function showVoutcherEmail($booking_number){
        Session::put('locale', 'en');
        $model = $this->repository->get($booking_number,[],'booking_number',['yacht.images']);
        return $model;
    }
}