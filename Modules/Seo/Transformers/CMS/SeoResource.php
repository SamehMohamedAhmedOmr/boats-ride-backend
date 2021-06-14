<?php

namespace Modules\Seo\Transformers\CMS;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->title,
            'description'=>$this->description,
            'keywords'=>$this->keywords,
        ];
    }
}
