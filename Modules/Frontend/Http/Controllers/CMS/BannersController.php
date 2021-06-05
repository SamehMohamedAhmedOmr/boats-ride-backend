<?php

namespace Modules\Frontend\Http\Controllers\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Base\Requests\PaginationRequest;
use Modules\Frontend\Http\Requests\BannersRequest;
use Modules\Frontend\Services\CMS\BannersService;
use Throwable;

class BannersController extends Controller
{
    private $service;

    public function __construct(BannersService $service)
    {
        $this->service = $service;
    }


    // API RESOURCE METHODS

    /**
     *
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function index(PaginationRequest $request)
    {
        return $this->service->index();
    }

    /**
     *
     * @param BannersRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(BannersRequest $request)
    {
        return $this->service->store($request);
    }

    public function show(BannersRequest $request)
    {
        return $this->service->show($request->banner);
    }

    public function update(BannersRequest $request)
    {
        return $this->service->update($request->banner, $request);
    }

    public function destroy(BannersRequest $request)
    {
        return $this->service->delete($request->banner);
    }


    /**
     *
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function export(PaginationRequest $request)
    {
        return $this->service->export();
    }

}
