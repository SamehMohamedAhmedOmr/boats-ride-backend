<?php

namespace Modules\Frontend\Services\CMS;

use Throwable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Frontend\Transformers\SettingsResource;
use Modules\Frontend\Repositories\SettingsRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;

class SettingsService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(SettingsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($request = null){

        return  DB::transaction(function () use($request){
              $settings = $this->repository->updateOrCreate([],$request->validated());
              return ApiResponse::format(200, SettingsResource::make($settings));
          });
         
      }
  
}