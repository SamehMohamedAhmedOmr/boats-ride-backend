<?php

namespace Modules\Yacht\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Yacht\Services\CMS\TimeSlotService;
use Modules\Yacht\Transformers\CMS\TripTimeSlotsResource;

class TimeSlotController extends Controller
{
    private $service;

    public function __construct(TimeSlotService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return $this->service->index();
    }
   
    public function getTimeSlotsForYacht(Request $request)
    {
        list($available_slots,$unavailable_slots) = $this->service->getTimeSlotsForYacht($request->date,$request->yacht_id);

        return new TripTimeSlotsResource($available_slots, $unavailable_slots);
    }

    
}
