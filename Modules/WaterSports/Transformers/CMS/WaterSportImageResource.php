<?php

namespace Modules\WaterSports\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;

class WaterSportImageResource extends JsonResource
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
            'image'=>$this->image_url,
            'thumbnail'=>$this->thumbnail_url
        ];
    }
}
