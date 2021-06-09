<?php

namespace Modules\Yacht\Repositories;

use Modules\Yacht\Entities\Yacht;
use Modules\Frontend\Entities\Banners;
use Modules\Services\Entities\Service;
use Illuminate\Support\Facades\Session;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class YachtRepository extends LaravelRepositoryClass
{
    public function __construct(Yacht $model)
    {
        $this->model = $model;
    }

    public function paginate($per_page = 15, $conditions = [], $search_keys = null, $sort_key = 'id', $sort_order = 'asc', $lang = null)
    {
        $query = $this->filtering($search_keys);

        return parent::paginate($query, $per_page, $conditions, $sort_key, $sort_order);
    }

    public function all($conditions = [], $search_keys = null)
    {
        $query = $this->filtering($search_keys);

        return $query->where($conditions)->get();
    }

    private function filtering($search_keys){
        $query = $this->model;

        if($search_keys)
        {
            $query = $query->where(function ($q) use ($search_keys){

                $local = Session::get('locale');

                $q->orWhere('name->'.$local, 'LIKE', '%'.$search_keys.'%')
                    ->orWhere('id', 'LIKE', '%'.$search_keys.'%');
            });
        }
        
        return $query;
    }

    public function getData($conditions = [])
    {
        return $this->model->where($conditions)->first();
    }

    public function attachServices($model,$data)
    {
        $model->services()->attach($data);
    }

    public function syncServices($model,$data)
    {
        $model->services()->detach();
        $model->services()->attach($data);
    }

}
