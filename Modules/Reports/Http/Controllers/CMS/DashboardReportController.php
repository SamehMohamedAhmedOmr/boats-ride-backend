<?php

namespace Modules\Reports\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Base\ResponseShape\ApiResponse;
use Illuminate\Contracts\Support\Renderable;
use Modules\Reports\Services\CMS\DashboardReportService;
use Modules\Reports\Transformers\CMS\DashboardReportResource;

class DashboardReportController extends Controller
{
    private $service;

    public function __construct(DashboardReportService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = $this->service->index();
        return ApiResponse::format(200, new DashboardReportResource($data), null);
    }

}
