<?php

namespace Modules\Yacht\Repositories;

use Modules\Yacht\Entities\Trip;
use Illuminate\Support\Facades\DB;
use Modules\Frontend\Entities\Banners;
use Modules\Services\Entities\Service;
use Illuminate\Support\Facades\Session;
use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;

class TripRepository extends LaravelRepositoryClass
{
    public function __construct(Trip $model)
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

                $q->orWhere('id', 'LIKE', '%'.$search_keys.'%');
            });
        }

        if(request()->has('email') || request()->has('phone'))
        {
            // $query = $query->whereHas('client',function($query){
            //                         $query->when(request('phone'),function($q){
            //                             return $q->where('phone',request('phone'));
            //                         })->when(request('email'),function($q){
            //                             return $q->whereHas('user',function($q){
            //                                 $q->where('email',request('email'));
            //                             });
            //                         });
            //                     });
            $query =  $query->when(request('phone'),function($q){
                                        return $q->where('phone',request('phone'));
                                    })->when(request('email'),function($q){
                                        return $q->where('email',request('email'));
                                    });
        }

        if(request()->has('status'))
        {
            $query = $query->where('status',(int) request('status'));
        }
        
        
        if(request()->has('from_date'))
        {
            $query = $query->where('start_date','>=',request('from_date'));
        }
        
        if(request()->has('to_date'))
        {
            $query = $query->where('end_date','<=',request('to_date'));
        }

        if(request()->has('booking_number'))
        {
            $query = $query->where('booking_number', request('booking_number'));
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

    public function getCountPerStatuses()
    {
         return $this->model->select(DB::raw('count(CASE WHEN status = ' . TripStatusEnum::RESERVATION . ' THEN 1 END) as total_reservation_trips'),
                                     DB::raw('count(CASE WHEN status = ' . TripStatusEnum::CONFIRM . ' THEN 1 END) as total_confirmed_trips'))
                                     ->first();
    }

}
