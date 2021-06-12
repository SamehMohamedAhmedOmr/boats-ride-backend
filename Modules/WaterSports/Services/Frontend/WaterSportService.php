<?php

namespace Modules\WaterSports\Services\Frontend;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Yacht\Transformers\CMS\YachtResource;
use Modules\WaterSports\Enums\WaterSportStatusEnum;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\WaterSports\Repositories\WaterSportRepository;
use Modules\Services\Transformers\Frontend\ServiceResource;
use Modules\WaterSports\Transformers\Frontend\WaterSportResource;
use Modules\WaterSports\Transformers\Frontend\WaterSportTripResource;

class WaterSportService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(WaterSportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        list($model, $pagination) = parent::paginate($this->repository,false,['status'=>WaterSportStatusEnum::APPROVE]);
        $model->load(['images']);
        $model = WaterSportResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

   

    public function show($id)
    {
        $local = Session::get('locale');
        
        $model = $this->repository->get($id,[],'slug->'. ($local == 'all' ? 'en' : $local));
        
        $model->load(['images']);

        $model = WaterSportResource::make($model);
        return ApiResponse::format(200, $model);
    }

}
