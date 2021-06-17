<?php

namespace Modules\Seo\Repositories;

use Modules\Seo\Entities\Seo;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class SeoRepository extends LaravelRepositoryClass
{

    public function __construct(Seo $model)
    {
        $this->model  = $model;
    }

    public function paginate($per_page = 15, $conditions = [], $search_keys = null, $sort_key = 'id', $sort_order = 'asc', $lang = null)
    {
        $query = $this->filtering($search_keys);

        return parent::paginate($query, $per_page, $conditions, $sort_key, $sort_order);
    }

    private function filtering($search_keys){
        $query = $this->model->whereNull('seoable_id')->whereNull('seoable_type');
        
        return $query;
    }
}
