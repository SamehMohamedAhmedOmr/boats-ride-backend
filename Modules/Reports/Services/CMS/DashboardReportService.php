<?php

namespace Modules\Reports\Services\CMS;

use Modules\Yacht\Repositories\TripRepository;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Frontend\Repositories\SettingsRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\WaterSports\Repositories\WaterSportRepository;
use Modules\WaterSports\Repositories\WaterSportTripRepository;


class DashboardReportService extends LaravelServiceClass
{
    protected $yacht_repository; 
    protected $water_sport_repository; 
    protected $water_sport_trip_repository;
    protected $trip_repository;
    protected $settings_repository;

    
    public function __construct(YachtRepository $yacht_repository,
                                TripRepository  $trip_repository,
                                WaterSportRepository $water_sport_repository,
                                WaterSportTripRepository $water_sport_trip_repository,
                                SettingsRepository $settings_repository
                                )
{

$this->yacht_repository = $yacht_repository;
$this->trip_repository = $trip_repository;
$this->water_sport_repository = $water_sport_repository;
$this->water_sport_trip_repository = $water_sport_trip_repository;
$this->settings_repository = $settings_repository;

}

public function index()
{
 $yacht_trips_per_status = $this->trip_repository->getCountPerStatuses();
 $water_sport_trips_per_status = $this->water_sport_trip_repository->getCountPerStatuses();   
 $settings = $this->settings_repository->getFirst();
    
    return [
        'yacht_count'=> $this->yacht_repository->count(),
        'water_sport_count'=> $this->water_sport_repository->count(),
        'yacht_reserved_trips_count'=>  $yacht_trips_per_status ? $yacht_trips_per_status->total_reservation_trips : 0,
        'yacht_confirmed_trips_count'=>  $yacht_trips_per_status ? $yacht_trips_per_status->total_confirmed_trips : 0,
        'water_sport_reserved_trips'=> $water_sport_trips_per_status ? $water_sport_trips_per_status->total_reservation_trips : 0,
        'water_sport_confirmed_trips'=> $water_sport_trips_per_status ? $water_sport_trips_per_status->total_confirmed_trips : 0,
        'settings'=> $settings
    ];
}


}   