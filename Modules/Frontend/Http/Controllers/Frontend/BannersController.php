<?php

namespace Modules\Frontend\Http\Controllers\Frontend;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Base\Requests\PaginationRequest;
use Modules\Frontend\Services\Frontend\BannersService;

class BannersController extends Controller
{
    private $service;

    public function __construct(BannersService $service)
    {
        $this->service = $service;
    }


    /**
     *
     * @param PaginationRequest $request
     * @return JsonResponse
     */
    public function index(PaginationRequest $request)
    {
        return $this->service->index();
    }

}
