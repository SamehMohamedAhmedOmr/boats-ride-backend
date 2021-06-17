<?php

namespace Modules\Seo\Services\CMS;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\ResponseShape\ApiResponse;
use Modules\Seo\Repositories\SeoRepository;
use Modules\Seo\Transformers\CMS\SeoResource;
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

    public function index()
    {
        $pagination = null;
        if (request('is_pagination')) {
            list($model, $pagination) = parent::paginate($this->seo_repo);
        } else {
            $model = parent::all($this->seo_repo, true);
        }

        $model = SeoResource::collection($model);
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

            
            $model =  $this->seo_repo->create($request->validated());
            
            $model = SeoResource::make($model);

            return ApiResponse::format(201, $model, 'Added!');
        });

    }

    public function show($id)
    {
        $model = $this->seo_repo->get($id);
        $model = SeoResource::make($model);
        return ApiResponse::format(200, $model);
    }

    public function update($id, $request = null)
    {

        $model = $this->seo_repo->update($id, $request->validated());

        $model = SeoResource::make($model);
        return ApiResponse::format(200, $model, 'updated!');
    }

    public function delete($id)
    {
        $model = $this->seo_repo->delete($id);
        return ApiResponse::format(200, $model, 'Deleted!');
    }

    
    public function storeSeo(array $data, int $seoable_id, string $seoable_type)
    {
        return  $this->seo_repo->create($data + compact('seoable_id', 'seoable_type'));
    }

    public function updateSeo(array $data, int $seoable_id, string $seoable_type)
    {
        try {
            $this->seo_repo->update('', $data + compact('seoable_id', 'seoable_type'), compact('seoable_id', 'seoable_type'), null);
        } catch (ModelNotFoundException $ex) {
            $this->seo_repo->create($data + compact('seoable_id', 'seoable_type'));
        }
    }

    public function deleteSeo(int $seoable_id, string $seoable_type)
    {
        $this->seo_repo->delete('', compact('seoable_id', 'seoable_type'), null);
    }
}
