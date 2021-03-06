<?php

namespace Modules\Users\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\Base\Repositories\Classes\LaravelRepositoryClass;
use Modules\Users\Entities\User;

class UserRepository extends LaravelRepositoryClass
{
    public function __construct(User $user)
    {
        $this->model = $user;
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

        if ($search_keys) {
            $query = $query->where(function ($q) use ($search_keys){
                $q->where('name', 'LIKE', '%'.$search_keys.'%')
                    ->orWhere('email', 'LIKE', '%'.$search_keys.'%')
                    ->orWhere('id', 'LIKE', '%'.$search_keys.'%');
            });
        }
        return $query;
    }


    public function getData($conditions = [])
    {
        return $this->model->where($conditions)->first();
    }

    public function syncRoles($model, $roles)
    {
        $model->roles()->detach();
        $model->roles()->attach($roles);
    }

    public function AuthAttempt()
    {
        return Auth::attempt(
            [
                'email' => request('email'),
                'password' => request('password')
            ]
        );
    }

    public function search($search_key= null, $conditions = [], $with = [], $limit = 10){
        $query = $this->model;

        $query = $conditions != [] ? $query->where($conditions) : $query;

        $query = $with != [] ? $query->with($with) : $query;

        $query = $query->where('name', 'LIKE', '%'.$search_key.'%');

        $query = $query->where('is_active', 1);

        return $query->take($limit)->get();
    }

    
    public function syncPermissions($model,$permissions){
        $model->permissions()->sync($permissions);
    }

    public function getMyPermission($user_id){
        $admin = $this->get($user_id,[],'id',['permissions']);
        return $admin->permissions;
    }

}
