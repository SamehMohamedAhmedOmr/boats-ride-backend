<?php

namespace Modules\WaterSports\Services\CMS;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Seo\Services\CMS\SeoService;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Yacht\Transformers\CMS\EnumResource;
use Modules\WaterSports\Enums\WaterSportStatusEnum;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Services\Transformers\CMS\ServiceResource;
use Modules\Yacht\Transformers\CMS\YachtEnumsResource;
use Modules\WaterSports\Repositories\WaterSportRepository;
use Modules\WaterSports\Transformers\CMS\WaterSportResource;
use Modules\WaterSports\Repositories\WaterSportImageRepository;
use Modules\WaterSports\Transformers\CMS\WaterSportEnumsResource;

class WaterSportService extends LaravelServiceClass
{
    protected $repository, $mediaService, $seo_service;

    public function __construct(WaterSportRepository $repository,
                                MediaService $mediaService,
                                SeoService $seo_service,
                                WaterSportImageRepository $water_sport_image)
    {
        $this->repository = $repository;
        $this->mediaService = $mediaService;
        $this->water_sport_image = $water_sport_image; 
        $this->seo_service = $seo_service;
    }

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->repository);
        } else {
            $model = parent::all($this->repository, true);
        }

        $model = WaterSportResource::collection($model);
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

            $slug = ['en'=>Str::slug($request->input('name.en')) , 
                             'ar'=>Str::slug($request->input('name.ar'),'-',null)];

                             
            $model =  $this->repository->create($request->validated() + ['slug'=>$slug]);
            
            if($request->images){
                $this->handleUploadImages($request->images,$model->id);
            }

            $this->seo_service->storeSeo($request->input('seo',[]),$model->id,$this->repository->getModelPath());
             
            $model = WaterSportResource::make($model);

            return ApiResponse::format(201, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->repository->get($id);
        $model->load(['images','seo']);
        $model = WaterSportResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {
        return DB::transaction(function () use ($request,$id) {

            $slug = ['en'=>Str::slug($request->input('name.en')) , 
                             'ar'=>Str::slug($request->input('name.ar'),'-',null)];

                             
            $model =  $this->repository->update($id, $request->validated() + ['slug'=>$slug]);

            
            if($request->images){
                $this->handleUploadImages($request->images,$model->id);
            }

            $this->seo_service->updateSeo($request->input('seo',[]),$model->id,$this->repository->getModelPath());
             
            $model = WaterSportResource::make($model);

            return ApiResponse::format(200, $model, 'updated!');
        });

        
    }

    public function delete($id)
    {
        $this->seo_service->deleteSeo($id,$this->repository->getModelPath());
        $model = $this->repository->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }

    protected function removeImageFromStorage($old_model)
    {
        if(\Storage::disk('public')->exists($old_model->image))
        {
            $this->mediaService->deleteImage('public/'.$old_model->image);
        }

        if(\Storage::disk('public')->exists($old_model->thumbnail))
        {
            $this->mediaService->deleteImage('public/'.$old_model->thumbnail);
        }
    }

    protected function handleUploadImages(array $images,$id)
    {
        $prepared_data = [];

        foreach($images as $image){
            
            $base64_image = ($image) ? $this->mediaService->uploadImageBas64($image, 'waterSports') : null;
            $thumbnail = ($image) ? $this->mediaService->generateThumbnailBas64($image, 'waterSports') : null;
            $prepared_data[] = ['image'=>$base64_image,'thumbnail'=>$thumbnail,'water_sport_id'=>$id];
        }
       
        $this->water_sport_image->insertMultiImages($prepared_data);
    }

    public function deleteImage($id)
    {  
        $image = $this->water_sport_image->get($id);
        $this->removeImageFromStorage($image);
        $this->water_sport_image->delete($id);
        return ApiResponse::format(200, null, 'deleted!');
    }

    public function listWaterSportStatus()
    {
        return WaterSportStatusEnum::translatedValues();
    }
    public function listEnums()
    {
        $enums = new WaterSportEnumsResource(
                                    $this->listWaterSportStatus()
                                );
        return ApiResponse::format(200, $enums, 'query successfully !');                                
    }
}
