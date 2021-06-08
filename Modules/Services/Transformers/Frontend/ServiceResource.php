<?php

namespace Modules\Services\Transformers\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->description,
            'price'=>$this->price,
            'minimum_hours_booking'=>$this->minimum_hours_booking,
            'max_quantity'=>$this->max_quantity,
            'slug'=>$this->slug,
            'image'=>$this->image_url,
        ];;
    }
}
