<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Services\Classes\MediaService;
use Modules\Base\traits\Translatable;

class Banners extends Model
{
    Use SoftDeletes, Translatable;
    protected $table = 'banners';

    public $translatable = ['title'];
    protected $casts = ['title' => 'json'];

    protected $fillable = [
        'title', 'image', 'link', 'is_active'
    ];


    public function getImageAttribute($value){
        return MediaService::constructUrl($value);
    }

}
