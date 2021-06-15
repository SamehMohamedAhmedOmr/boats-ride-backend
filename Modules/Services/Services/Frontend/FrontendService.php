<?php

namespace Modules\Services\Services\Frontend;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\Frontend\ServiceResource;

class FrontendService extends LaravelServiceClass
{
    protected $repository, $mediaService;

    public function __construct(ServiceRepository $repository,
                                MediaService $mediaService)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        list($model, $pagination) = parent::paginate($this->repository);

        $model = ServiceResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

   

    public function show($id)
    {
        $local = Session::get('locale');
        
        $model = $this->repository->get($id,[],'slug->'. ($local == 'all' ? 'en' : $locale));
        $model->load('seo');
        $model = ServiceResource::make($model);
        return ApiResponse::format(200, $model);
    }

}
