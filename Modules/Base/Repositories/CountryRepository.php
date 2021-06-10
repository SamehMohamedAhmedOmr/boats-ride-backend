<?php


namespace Modules\Base\Repositories;

use Modules\Base\Facade\Language;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;
use Modules\Base\Entities\Country;

class CountryRepository extends LaravelRepositoryClass
{
    protected $lang_model;
    protected $admin_type = 1;


    public function __construct(Country $country)
    {
        $this->model = $country;
        $this->cache = 'country';
    }


    /* CMS Methods */
    public function paginate($per_page = 15, $conditions = null, $search_keys = null, $sort_key = 'id', $sort_order = 'asc', $lang = null)
    {
        $query = $this->filtering($search_keys);

        return parent::paginate($query, $per_page, $conditions, $sort_key, $sort_order);
    }

    public function all($conditions = [], $search_keys = null)
    {
        $query = $this->filtering($search_keys);

        return $query->where($conditions)->get();
    }

    private function filtering($search_keys)
    {

        $query = $this->model;

        list($country_ids, $is_admin) = $this->countryIds();

        if ($is_admin) {
            $query = $query->whereIn('id', $country_ids);
        }

        if ($search_keys) {
        }

        return $query;
    }

    public function get($value, $conditions = [], $column = 'id', $with = [])
    {
        $data = $conditions != []
            ? $this->model->where($conditions)
            : $this->model;

        $data = $with != []
            ? $data->with($with)
            : $data;

        list($country_ids, $is_admin) = $this->countryIds();

        if ($is_admin) {
            $data = $data->whereIn('id', $country_ids);
        }

        $data = $column
            ? $data->where($column, $value)
            : $data;

        $data = $data->first();

        return $data;
    }

    public function countryIds()
    {
        $country_ids = [];
        $is_admin = false;
        $user = \Auth::user();
       
        return [$country_ids , $is_admin];
    }

}
