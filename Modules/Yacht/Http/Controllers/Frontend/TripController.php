<?php

namespace Modules\Yacht\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Base\ResponseShape\ApiResponse;
use Illuminate\Contracts\Support\Renderable;
use Modules\Yacht\Services\Frontend\TripService;

class TripController extends Controller
{
    private $service;

    public function __construct(TripService $service)
    {
        $this->service = $service;
    }
    
    public function showVoutcherEmail($booking_number){
        $trip = $this->service->showVoutcherEmail($booking_number);
        return view('yacht::emails.reservation',['render_data'=>['trip'=>$trip]]);
    }

    public function getVoutcherEmailLink($booking_number){
        return ApiResponse::format(200, ['url'=>route('trips.voutcher.email.show',$booking_number)]);
    }


}
