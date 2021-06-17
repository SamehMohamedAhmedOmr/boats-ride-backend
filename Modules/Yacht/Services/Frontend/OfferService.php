<?php

namespace Modules\Yacht\Services\Frontend;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\OfferRepository;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Yacht\Transformers\Frontend\OfferResource;

class OfferService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(OfferRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        list($model, $pagination) = parent::paginate($this->repository,true,['is_active'=>true]);

        $model = OfferResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

   

    public function show($id)
    {
        $local = Session::get('locale');
        
        $model = $this->repository->get($id,[],'slug->'. ($local == 'all' ? 'en' : $locale));
        $model->load('seo');
        $model = OfferResource::make($model);
        return ApiResponse::format(200, $model);
    }

}
