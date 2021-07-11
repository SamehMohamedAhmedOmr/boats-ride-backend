<?php

namespace Modules\WaterSports\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Base\ResponseShape\ApiResponse;
use Illuminate\Contracts\Support\Renderable;
use Modules\WaterSports\Services\Frontend\WaterSportTripService;

class WaterSportTripController extends Controller
{
    private $service;

    public function __construct(WaterSportTripService $service)
    {
        $this->service = $service;
    }
    
    public function showVoutcherEmail($booking_number){
        $trip = $this->service->showVoutcherEmail($booking_number);
        return view('watersports::emails.reservation',['render_data'=>['trip'=>$trip]]);
    }

    public function getVoutcherEmailLink($booking_number){
        return ApiResponse::format(200, ['url'=>route('waterSportTrips.voutcher.email.show',$booking_number)]);
    }

}
