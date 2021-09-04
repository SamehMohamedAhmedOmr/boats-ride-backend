<?php

namespace Modules\Yacht\Services\CMS;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Yacht\Enums\FuelTypeEnum;
use Modules\Yacht\Enums\HullTypeEnum;
use Modules\Yacht\Enums\YachtTypeEnum;
use Modules\Yacht\Enums\EngineTypeEnum;
use Modules\Seo\Services\CMS\SeoService;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Repositories\YachtRepository;
use Modules\Yacht\Transformers\CMS\EnumResource;
use Modules\Yacht\Transformers\CMS\YachtResource;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Yacht\Repositories\YachtImageRepository;
use Modules\Frontend\Transformers\CMS\BannerResource;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\CMS\ServiceResource;
use Modules\Yacht\Transformers\CMS\YachtEnumsResource;

class YachtService extends LaravelServiceClass
{
    protected $repository, $mediaService, $seo_service;

    public function __construct(YachtRepository $repository,
                                MediaService $mediaService,
                                SeoService $seo_service,
                                YachtImageRepository $yacht_image)
    {
        $this->repository = $repository;
        $this->mediaService = $mediaService;
        $this->seo_service = $seo_service;
        $this->yacht_image_repository = $yacht_image;
    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->repository);
        } else {
            $model = parent::all($this->repository, true);
        }

        $model->load('images');
        $model = YachtResource::collection($model);
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

            $banner_image = ($request->banner) ? $this->mediaService->uploadImageBas64($request->banner, 'yacht') : null;
            $banner_thumbnail = ($request->banner) ? $this->mediaService->generateThumbnailBas64($request->banner, 'yacht') : null;

            $slug = ['en' => Str::slug($request->input('name.en')),
                'ar' => Str::slug($request->input('name.ar'), '-', null)];

            $data = $request->validated();
            $data['banner_image'] = $banner_image;
            $data['banner_thumbnail'] = $banner_thumbnail;

            $model = $this->repository->create($data + ['slug' => $slug]);

            $this->repository->attachServices($model, $request->services);

            if ($request->images) {
                $this->handleUploadImages($request->images, $model->id);
            }

            $this->seo_service->storeSeo($request->input('seo', []), $model->id, $this->repository->getModelPath());

            $model = YachtResource::make($model);

            return ApiResponse::format(201, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->repository->get($id);
        $model->load(['services', 'images', 'seo']);
        $model = YachtResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {
        return DB::transaction(function () use ($request, $id) {

            $banner_image = ($request->banner) ? $this->mediaService->uploadImageBas64($request->banner, 'yacht') : null;
            $banner_thumbnail = ($request->banner) ? $this->mediaService->generateThumbnailBas64($request->banner, 'yacht') : null;

            $slug = ['en' => Str::slug($request->input('name.en')),
                'ar' => Str::slug($request->input('name.ar'), '-', null)];


            $data = $request->validated();
            $data['banner_image'] = $banner_image;
            $data['banner_thumbnail'] = $banner_thumbnail;

            $model = $this->repository->update($id, $data + ['slug' => $slug]);

            $this->repository->syncServices($model, $request->services);

            if ($request->images) {
                $this->handleUploadImages($request->images, $model->id);
            }

            $this->seo_service->updateSeo($request->input('seo', []), $model->id, $this->repository->getModelPath());

            $model = YachtResource::make($model);

            return ApiResponse::format(200, $model, 'updated!');
        });


    }

    public function delete($id)
    {
        $this->seo_service->deleteSeo($id, $this->repository->getModelPath());
        $model = $this->repository->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }

    protected function removeImageFromStorage($old_model)
    {
        if (\Storage::disk('public')->exists($old_model->image)) {
            $this->mediaService->deleteImage('public/' . $old_model->image);
        }

        if (\Storage::disk('public')->exists($old_model->thumbnail)) {
            $this->mediaService->deleteImage('public/' . $old_model->thumbnail);
        }
    }

    protected function handleUploadImages(array $images, $id)
    {
        $prepared_data = [];

        foreach ($images as $image) {

            $base64_image = ($image) ? $this->mediaService->uploadImageBas64($image, 'yacht') : null;
            $thumbnail = ($image) ? $this->mediaService->generateThumbnailBas64($image, 'yacht') : null;
            $prepared_data[] = ['image' => $base64_image, 'thumbnail' => $thumbnail, 'yacht_id' => $id];
        }

        $this->yacht_image_repository->insertMultiImages($prepared_data);
    }

    public function deleteImage($id)
    {
        $image = $this->yacht_image_repository->get($id);
        $this->removeImageFromStorage($image);
        $this->yacht_image_repository->delete($id);
        return ApiResponse::format(200, null, 'deleted!');
    }

    public function listYachtTypes()
    {
        return YachtTypeEnum::translatedValues();
    }

    public function listYachtStatus()
    {
        return YachtStatusEnum::translatedValues();
    }

    public function listEngineTypes()
    {
        return EngineTypeEnum::translatedValues();
    }


    public function listFuelTypes()
    {
        return FuelTypeEnum::translatedValues();
    }


    public function listHullTypes()
    {
        return HullTypeEnum::translatedValues();
    }

    public function listEnums()
    {
        $enums = new YachtEnumsResource(
            $this->listYachtTypes(),
            $this->listYachtStatus(),
            $this->listFuelTypes(),
            $this->listHullTypes(),
            $this->listEngineTypes()
        );
        return ApiResponse::format(200, $enums, 'query successfully !');
    }
}
