<?php

namespace Modules\WaterSports\Entities;

use Modules\Seo\Entities\Seo;
use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\WaterSports\Entities\WaterSportImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterSport extends Model
{
    use HasFactory,Translatable,SoftDeletes;

    protected $guarded = ['id'];
    
    public $translatable = ['name','what_to_expect_description','water_sport_description','routes','slug','location'];
    protected $casts = ['name' => 'json','what_to_expect_description' =>'json',
                         'water_sport_description' => 'json',
                        'routes' => 'json',
                         'slug' => 'json',
                        'location' => 'json']; 

    public function images()
    {
        return $this->hasMany(WaterSportImage::class,'water_sport_id');
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
