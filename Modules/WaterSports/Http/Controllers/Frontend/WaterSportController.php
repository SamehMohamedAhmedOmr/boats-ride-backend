<?php

namespace Modules\WaterSports\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\WaterSports\Services\Frontend\WaterSportService;

class WaterSportController extends Controller
{
    private $service;

    public function __construct(WaterSportService $service)
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


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return $this->service->show($id);
    }    

}
