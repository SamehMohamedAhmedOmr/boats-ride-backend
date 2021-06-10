<?php

namespace Modules\Users\Entities;

use Modules\Base\Entities\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Services\Classes\MediaService;

class Clients extends Model
{
    use SoftDeletes;

    protected $table = 'clients';
    protected $fillable = ['user_id','phone','facebook_id','device_id','device_os','app_version','title','address','country_id'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
