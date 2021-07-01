<?php

namespace Modules\Services\Entities;

use Modules\Seo\Entities\Seo;
use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Services\Classes\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,Translatable,SoftDeletes;
    protected $guarded = ['id'];
    public $translatable = ['title','description','slug'];
    protected $casts = ['title' => 'json','description' => 'json', 'slug' => 'json'];   


    public function getImageUrlAttribute(){
        return MediaService::constructUrl($this->image);
    }

    public function getThumbnailUrlAttribute(){
        return MediaService::constructUrl($this->thumbnail);
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
