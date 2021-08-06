<?php

namespace Modules\Frontend\Services\Frontend;

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

    public function show($request = null){

        $settings = $this->repository->getFirst();
 
        if($settings){
            $settings = SettingsResource::make($settings);
        }

        return ApiResponse::format(200, $settings); 
      }
  
}