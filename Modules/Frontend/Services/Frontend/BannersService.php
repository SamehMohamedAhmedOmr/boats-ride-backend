<?php

namespace Modules\Frontend\Services\Frontend;

use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Frontend\Transformers\Frontend\BannerResource;


class BannersService extends LaravelServiceClass
{
    protected $repository;

    public function __construct(BannersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        list($model, $pagination) = parent::paginate($this->repository, true, [
            'is_active' => 1,
        ]);

        $model = BannerResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

}
