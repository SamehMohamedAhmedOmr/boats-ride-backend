<?php

namespace Modules\Yacht\Services\CMS;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Yacht\Transformers\CMS\YachtResource;
use Modules\Yacht\Repositories\TimeSlotRepository;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\Frontend\ServiceResource;

class TimeSlotService extends LaravelServiceClass
{
    protected $repository, $mediaService;

    public function __construct(TimeSlotRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->repository);
        } else {
            $model = parent::all($this->repository, true);
        }
        
        $model = TimeSlotResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }


}
