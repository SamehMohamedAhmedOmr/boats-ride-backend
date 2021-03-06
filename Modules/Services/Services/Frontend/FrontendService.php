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
        $model = parent::all($this->repository);

        $model = ServiceResource::collection($model);
        return ApiResponse::format(200, $model, null);
    }

   

    public function show($id)
    {   
        $model = $this->repository->getDataBySlug($id);
        $model->load('seo');
        $model = ServiceResource::make($model);
        return ApiResponse::format(200, $model);
    }

}
