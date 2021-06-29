<?php

namespace Modules\ContactUs\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContactUs\Http\Requests\ContactUs;
use Modules\ContactUs\Services\Frontend\ContactUsService;

class ContactUsController extends Controller
{
    private $service;
    public function __construct(ContactUsService $contactUsService)
    {
        $this->service = $contactUsService;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ContactUs $request)
    {
        return $this->service->store($request->all());
    }
}
