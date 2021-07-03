<?php

namespace Modules\Users\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Users\Services\CMS\PermissionService;

class PermissionController extends Controller
{
    private $service;

    public function __construct(PermissionService $service)
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
