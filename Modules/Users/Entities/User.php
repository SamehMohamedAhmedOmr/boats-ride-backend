<?php

namespace Modules\Users\Entities;

use Modules\ACL\Entities\Role;
use Laravel\Passport\HasApiTokens;
use Modules\ACL\Entities\UserHasRoles;
use Modules\Users\Entities\Permission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticated;


class User extends Authenticated
{
    use Notifiable, HasApiTokens, SoftDeletes;

    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'is_active', 'token_last_renew'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function client()
    {
        return $this->hasOne(Clients::class, 'user_id', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'id');
    }


    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'user_roles',
            'user_id',
            'role_id'
        )
            ->using(UserHasRoles::class);
    }

    
    public function permissions(){
        return $this->belongsToMany(Permission::class,'admin_permissions','user_id','permission_id');
    }

}
