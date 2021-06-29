<?php
namespace Modules\ContactUs\Repositories;

use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;
use Modules\ContactUs\Entities\Contactus;

class ContactUsRepository extends LaravelRepositoryClass
{
    protected $model;
   
    public function __construct(Contactus $contactus)
    {
        $this->model = $contactus;
    }
}
