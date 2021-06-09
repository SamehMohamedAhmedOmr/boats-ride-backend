<?php

namespace Modules\Yacht\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Services\Classes\MediaService;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YachtImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageUrlAttribute(){
        return MediaService::constructUrl($this->image);
    }

    public function getThumbnailUrlAttribute(){
        return MediaService::constructUrl($this->thumbnail);
    }
}
