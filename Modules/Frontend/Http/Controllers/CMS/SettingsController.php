<?php

namespace Modules\Frontend\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Frontend\Services\CMS\SettingsService;
use Modules\Frontend\Http\Requests\CMS\SettingsRequest;

class SettingsController extends Controller
{
    private $service;

    public function __construct(SettingsService $service)
    {
        $this->service = $service;
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SettingsRequest $request)
    {
        return $this->service->store($request);
    }

 
}
