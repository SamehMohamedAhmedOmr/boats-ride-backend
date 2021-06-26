<?php

namespace Modules\Services\Services\CMS;

use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Modules\Seo\Services\CMS\SeoService;
use Modules\Services\Enums\PriceModelEnum;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\MediaService;
use Modules\Services\Repositories\BlogRepository;
use Modules\Services\Transformers\CMS\BlogResource;
use Modules\Frontend\Repositories\BannersRepository;
use Modules\Services\Repositories\ServiceRepository;
use Modules\Frontend\Transformers\CMS\BannerResource;
use Modules\Base\Services\Classes\LaravelServiceClass;

class BlogService extends LaravelServiceClass
{
    protected $repository, $mediaService, $seo_service;

    public function __construct(BlogRepository $repository,
                                SeoService $seo_service,
                                MediaService $mediaService)
    {
        $this->repository = $repository;
        $this->mediaService = $mediaService;
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

        $model = BlogResource::collection($model);
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

            $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'blogs') : null;
            $thumbnail = ($request->image) ? $this->mediaService->generateThumbnailBas64($request->image, 'blogs') : null;

            $data = $request->all();
            $data['image'] = $image;
            $data['thumbnail'] = $thumbnail;

            $data['slug'] = ['en'=>Str::slug($data['title']['en']) , 
                             'ar'=>Str::slug($data['title']['ar'],'-',null)];
            
            $model =  $this->repository->create($data);
            
            $this->seo_service->storeSeo($request->input('seo',[]),$model->id,$this->repository->getModelPath());

            $model = BlogResource::make($model);

            return ApiResponse::format(201, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->repository->get($id);
        $model->load('seo');
        $model = BlogResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {

        $image = ($request->image) ? $this->mediaService->uploadImageBas64($request->image, 'blogs') : null;
        $thumbnail = ($request->image) ? $this->mediaService->generateThumbnailBas64($request->image, 'blogs') : null;

        $data = $request->all();
        if ($image){
            $old_model = $this->repository->get($id);
            $data['image'] = $image;
            $data['thumbnail'] = $thumbnail;

            $this->deleteBlogImages($old_model);
        }

        $data['slug'] = ['en'=>Str::slug($data['title']['en']) , 
                             'ar'=>Str::slug($data['title']['ar'],'-',null)];

        $model = $this->repository->update($id, $data);

        $this->seo_service->updateSeo($request->input('seo',[]),$model->id,$this->repository->getModelPath());

        $model = BlogResource::make($model);
        return ApiResponse::format(200, $model, 'updated!');
    }

    public function delete($id)
    {
        $this->seo_service->deleteSeo($id,$this->repository->getModelPath());
        $old_model = $this->repository->get($id);
        $this->deleteBlogImages($old_model);
        $model = $this->repository->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }

    protected function deleteBlogImages($old_model)
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



}
