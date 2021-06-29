<?php


namespace Modules\ContactUs\Services\Frontend;

use Illuminate\Support\Facades\Session;
use Modules\Base\Facade\Pagination;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\ContactUs\Repositories\ContactUsRepository;
use Modules\Layouts\Repositories\layouts\PageLayoutRepository;
use Modules\Layouts\Services\CMS\FrontendSettingsService;
use Modules\Notifications\Services\CMS\EmailService;
use Modules\Configuration\Facades\TenantHelper;

class ContactUsService extends LaravelServiceClass
{
    protected $repository;
    private $email_service;
    private $pageLayoutRepository;
    private $frontend_settings_service;
    public function __construct(ContactUsRepository $contactUsRepository)
    {
        $this->repository = $contactUsRepository;
        // $this->email_service = $email_service;
    }

    


    public function store($request = [])
    {
        $render_data = [
                'name'  => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'message'  => $request['message'],
            ];
        $this->repository->create($render_data);


        // $email = $contactUsEmail ? $this->email_service->email(
        //     $contactUsEmail,
        //     'contactus',
        //     'ContactUs.contact-us',
        //     'Contact Us Email',
        //     $render_data
        // ) : ApiResponse::format(200, '', 'Success');
        // Send contact us email
        // return $email;
    }
}
