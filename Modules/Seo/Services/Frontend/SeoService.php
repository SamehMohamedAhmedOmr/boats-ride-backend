<?php

namespace Modules\Seo\Services\Frontend;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Seo\Repositories\SeoRepository;
use Modules\Seo\Transformers\Frontend\SeoResource;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SeoService extends LaravelServiceClass
{
    private $seo_repo;

    public function __construct(
        SeoRepository $seo_repo
    ) {
        $this->seo_repo = $seo_repo;
    }

    public function show($id)
    {
        $model = Cache::remember('seo_' . $id, 24 * 60 * 60, function () use($id) {
            $model = $this->seo_repo->getByUrl($id);
            $model = SeoResource::make($model);

            return $model;
        });
        
        return ApiResponse::format(200, $model);
    }

}
