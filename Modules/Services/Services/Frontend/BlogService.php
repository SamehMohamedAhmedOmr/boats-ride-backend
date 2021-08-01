<?php

namespace Modules\Services\Services\Frontend;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Seo\Services\CMS\SeoService;
use Modules\Services\Enums\PriceModelEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Services\Repositories\BlogRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\Frontend\BlogResource;

class BlogService extends LaravelServiceClass
{
    protected $repository, $mediaService, $seo_service;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $model= parent::all($this->repository,true,['is_active'=>true]);

        $model = BlogResource::collection($model);
        return ApiResponse::format(200, $model, null);
    }

   

    public function show($id)
    {        
        $model = $this->repository->getDataBySlug($id);
        $model->load('seo');
        $model = BlogResource::make($model);
        return ApiResponse::format(200, $model);
    }




}
