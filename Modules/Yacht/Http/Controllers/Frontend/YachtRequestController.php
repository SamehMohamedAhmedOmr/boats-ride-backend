<?php

namespace Modules\Yacht\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Yacht\Http\Requests\Frontend\YachtRequest;
use Modules\Yacht\Services\Frontend\YachtRequestService;

class YachtRequestController extends Controller
{

    private $service;

    public function __construct(YachtRequestService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(YachtRequest $request)
    {
        return $this->service->store($request);
    }

}
