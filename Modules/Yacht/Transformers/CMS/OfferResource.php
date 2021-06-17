<?php

namespace Modules\Yacht\Transformers\CMS;

use Modules\Seo\Transformers\CMS\SeoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'valid_date'=>$this->valid_date,
            'is_active'=>(bool)$this->is_active,
            'slug'=>$this->slug,
            'image'=>$this->image_url,
            'thumbnail'=>$this->thumbnail_url,
            'seo'=>new SeoResource($this->whenLoaded('seo'))
        ];
    }
}
