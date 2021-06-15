<?php

namespace Modules\WaterSports\Entities;

use Modules\Seo\Entities\Seo;
use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\WaterSports\Entities\WaterSportImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterSport extends Model
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];
    
    public $translatable = ['name','what_to_expect_description','water_sport_description','routes','slug'];
    protected $casts = ['name' => 'json','what_to_expect_description' =>'json',
                         'water_sport_description' => 'json',
                        'routes' => 'json',
                         'slug' => 'json']; 

    public function images()
    {
        return $this->hasMany(WaterSportImage::class,'water_sport_id');
    }                     
            
    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }


}
