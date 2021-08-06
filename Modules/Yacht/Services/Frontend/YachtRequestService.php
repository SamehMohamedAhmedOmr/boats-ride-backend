<?php

namespace Modules\Yacht\Services\Frontend;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Notifications\Services\CMS\EmailService;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Yacht\Repositories\YachtRequestRepository;
use Modules\Yacht\Transformers\Frontend\OfferResource;

class YachtRequestService extends LaravelServiceClass
{
    protected $repository, $email_service;

    public function __construct(YachtRequestRepository $repository, EmailService $email_service)
    {
        $this->repository = $repository;
        $this->email_service = $email_service;
    }

    public function store($request = null)
    {
        Session::put('locale', 'en');
        $model = $this->repository->create($request->validated(),'yacht');
        return $this->email_service->email(env('REQUESTS_EMAIL'),'Yacht','emails.yacht_request','new yacht request',['request'=>$model]);
    }

}