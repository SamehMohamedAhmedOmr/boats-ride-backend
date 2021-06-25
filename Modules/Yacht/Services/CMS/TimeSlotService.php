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
use Modules\Yacht\Transformers\CMS\TimeSlotResource;
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

    public function getTimeSlotsForYacht($date,$yacht_id)
    {
        return [
            $this->getAvalialbleSlotsForYacht($date,$yacht_id),
            $this->getUnAvalialbleSlotsForYacht($date,$yacht_id)
        ];
    }

    public function getAvalialbleSlotsForYacht($date,$yacht_id)
    {
        return $this->repository->getAvalialbleSlotsForYacht($date,$yacht_id);
    }

    
    public function getUnAvalialbleSlotsForYacht($date,$yacht_id)
    {
        return $this->repository->getUnAvalialbleSlotsForYacht($date,$yacht_id);
    }

    public function getTimeSlotsForWaterSport($date,$water_sport_id)
    {
        return [
            $this->getAvalialbleSlotsForWaterSport($date,$water_sport_id),
            $this->getUnAvalialbleSlotsForWaterSport($date,$water_sport_id)
        ];
    }

    public function getAvalialbleSlotsForWaterSport($date,$water_sport_id)
    {
        return $this->repository->getAvalialbleSlotsForWaterSport($date,$water_sport_id);
    }

    
    public function getUnAvalialbleSlotsForWaterSport($date,$water_sport_id)
    {
        return $this->repository->getUnAvalialbleSlotsForWaterSport($date,$water_sport_id);
    }

}
