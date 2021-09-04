<?php

namespace Modules\Yacht\Entities;

use Modules\Base\Services\Classes\MediaService;
use Modules\Seo\Entities\Seo;
use Modules\Base\traits\Translatable;
use Modules\Services\Entities\Service;
use Modules\Yacht\Entities\YachtImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Yacht extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    protected $guarded = ['id'];
    public $translatable = ['name', 'what_expect_description', 'what_is_included', 'facilities', 'slug'];
    protected $casts = ['name' => 'json', 'what_expect_description' => 'json',
        'what_is_included' => 'json',
        'facilities' => 'json',
        'slug' => 'json'];


    public function services()
    {
        return $this->belongsToMany(Service::class, 'yacht_service', 'yacht_id');
    }

    public function images()
    {
        return $this->hasMany(YachtImage::class, 'yacht_id');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function getBannerImageUrlAttribute(){
        return MediaService::constructUrl($this->banner_image);
    }

    public function getBannerThumbnailUrlAttribute(){
        return MediaService::constructUrl($this->banner_thumbnail);
    }
}
