<?php

namespace Modules\Yacht\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Yacht\Services\CMS\TimeSlotService;

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
   

    
}
