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
        $this->setSendEmailConfigs();
        $model = $this->repository->create($request->validated(), 'yacht');
        return $this->email_service->email(env('REQUESTS_EMAIL'), 'Yacht', 'emails.yacht_request', 'new yacht request', ['request' => $model]);
    }

    private function setSendEmailConfigs()
    {
        config(['mail.mailers.smtp.username' => env('SEND_REQUESTS_EMAIL'),
            'mail.mailers.smtp.password' => env('SEND_REQUESTS_EMAIL_PASS'),
            'mail.mailers.smtp.host' => env('SEND_REQUESTS_EMAIL_HOST'),
            'mail.mailers.smtp.port' => env('SEND_REQUESTS_EMAIL_PORT'),
            'mail.mailers.smtp.encryption' => env('SEND_REQUESTS_EMAIL_ENCRYPTION'),
            'mail.from.address' => env('SEND_REQUESTS_FROM_ADDRESS')
        ]);
    }

}
