<?php

namespace Modules\WaterSports\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\WaterSports\Services\Frontend\WaterSportRequestService;
use Modules\WaterSports\Http\Requests\Frontend\WaterSportBookingRequest;

class WaterSportRequestController extends Controller
{
    private $service;

    public function __construct(WaterSportRequestService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(WaterSportBookingRequest $request)
    {
        return $this->service->store($request);
    }
}
