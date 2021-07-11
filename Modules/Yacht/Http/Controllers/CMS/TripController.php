<?php

namespace Modules\Yacht\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Yacht\Services\CMS\TripService;
use Illuminate\Contracts\Support\Renderable;
use Modules\Base\Requests\PaginationRequest;
use Modules\Yacht\Http\Requests\CMS\TripRequest;

class TripController extends Controller
{
    private $service;

    public function __construct(TripService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(PaginationRequest $request)
    {
        return $this->service->index();
    }

   
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TripRequest $request)
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


    public function sendVoutcherEmail($booking_number){
        return $this->service->sendVoutcherEmail($booking_number);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TripRequest $request, $id)
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
