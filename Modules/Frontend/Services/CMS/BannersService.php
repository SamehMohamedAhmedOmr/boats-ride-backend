<?php

namespace Modules\Frontend\Services\CMS;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Services\Classes\MediaService;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Frontend\Transformers\CMS\BannerResource;
use Throwable;

class BannersService extends LaravelServiceClass
{
    protected $repository, $mediaService;

    public function __construct(BannersRepository $repository,
                                MediaService $mediaService)
    {
        $this->repository = $repository;
        $this->mediaService = $mediaService;
    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->repository);
        } else {
            $model = parent::all($this->repository, true);
        }

        $model = BannerResource::collection($model);
        return ApiResponse::format(200, $model, null, $pagination);
    }

    /**
     * Handles Add New Admin
     *
     * @param null $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store($request = null)
    {
        return DB::transaction(function () use ($request) {

            $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'banners') : null;

            $data = $request->all();
            $data['image'] = $image;

            $model =  $this->repository->create($data);

            $model = BannerResource::make($model);
            return ApiResponse::format(201, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->repository->get($id);

        $model = BannerResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {

        $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'banners') : null;

        $data = $request->all();
        if ($image){
            $data['image'] = $image;
        }

        $model = $this->repository->update($id, $data);


        $model = BannerResource::make($model);
        return ApiResponse::format(200, $model, 'updated!');
    }

    public function delete($id)
    {
        $model = $this->repository->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }

}
