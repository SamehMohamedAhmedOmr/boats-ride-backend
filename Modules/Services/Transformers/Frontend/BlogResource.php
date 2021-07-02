<?php

namespace Modules\Services\Transformers\Frontend;

use Modules\Seo\Transformers\CMS\SeoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'slug'=>$this->slug,
            'image'=>$this->image_url,
            'thumbnail'=>$this->thumbnail_url,
            'label'=>$this->label,
            'author'=>$this->author,
            'seo'=>new SeoResource($this->whenLoaded('seo'))
        ];
    }
}
