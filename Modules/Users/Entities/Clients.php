<?php

namespace Modules\Users\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\Base\Services\Classes\MediaService;

class Clients extends Model
{
    use SoftDeletes;

    protected $table = 'clients';
    protected $fillable = ['user_id','phone','facebook_id','device_id','device_os','app_version'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
