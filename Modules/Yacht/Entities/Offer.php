<?php

namespace Modules\Yacht\Entities;

use Modules\Seo\Entities\Seo;
use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Services\Classes\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory,Translatable;
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
