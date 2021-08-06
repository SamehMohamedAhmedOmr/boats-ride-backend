<?php

namespace Modules\Frontend\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Frontend\Services\Frontend\SettingsService;

class SettingsController extends Controller
{
    
    private $service;

    public function __construct(SettingsService $service)
    {
        $this->service = $service;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id=null)
    {
        return $this->service->show();
    }
    
}
