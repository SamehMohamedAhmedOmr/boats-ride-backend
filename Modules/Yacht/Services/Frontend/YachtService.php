<?php

namespace Modules\Yacht\Services\Frontend;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Yacht\Transformers\CMS\YachtResource;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\Frontend\ServiceResource;

class YachtService extends LaravelServiceClass
{
    protected $repository, $mediaService;

    public function __construct(YachtRepository $repository,
                                MediaService $mediaService)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $model = parent::all($this->repository,false,['status'=>YachtStatusEnum::APPROVE]);
        $model->load(['services','images']);
        $model = YachtResource::collection($model);
        return ApiResponse::format(200, $model, null);
    }

   

    public function show($id)
    {        
        $model = $this->repository->getDataBySlug($id);
        
        $model->load(['services','images','seo']);
        
        $model = YachtResource::make($model);
        return ApiResponse::format(200, $model);
    }

}
