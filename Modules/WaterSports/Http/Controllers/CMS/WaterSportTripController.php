<?php

namespace Modules\WaterSports\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\WaterSports\Services\CMS\WaterSportTripService;
use Modules\WaterSports\Http\Requests\CMS\WaterSportTripRequest;

class WaterSportTripController extends Controller
{
    private $service;

    public function __construct(WaterSportTripService $service)
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
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(WaterSportTripRequest $request)
    {
        return $this->service->store($request);
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

    

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(WaterSportTripRequest $request, $id)
    {
        return $this->service->update($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function deleteImage($id)
    {
        return $this->service->deleteImage($id);
    }

    public function listEnums()
    {
        return $this->service->listEnums();
    }
}
