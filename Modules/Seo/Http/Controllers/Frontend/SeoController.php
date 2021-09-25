<?php

namespace Modules\Seo\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Seo\Services\Frontend\SeoService;

class SeoController extends Controller
{
    private $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
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


}
