<?php

namespace Modules\Services\Entities;

use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Services\Classes\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,Translatable;
    protected $guarded = [];
    public $translatable = ['name','description','slug'];
    protected $casts = ['name' => 'json','description' => 'json', 'slug' => 'json'];   


    public function getImageUrlAttribute(){
        return MediaService::constructUrl($this->image);
    }
}
