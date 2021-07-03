<?php

namespace Modules\WaterSports\Transformers\CMS;

use Modules\Seo\Transformers\CMS\SeoResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\WaterSports\Enums\WaterSportStatusEnum;

class WaterSportResource extends JsonResource
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
            'water_sport_description'=>$this->water_sport_description,
            'what_to_expect_description'=>$this->what_to_expect_description,
            'routes'=>$this->routes,
            'slug'=>$this->slug,
            'status'=>$this->status,
            'status_name'=>WaterSportStatusEnum::getKey($this->status),
            'code'=>$this->code,
            'color'=>$this->color,
            'corporate_company'=>$this->corporate_company,
            'corporate_price'=>(double)$this->corporate_price,
            'selling_per_hour'=>$this->selling_per_hour,
            'special_price'=>(double) $this->special_price,
            'total_price' => (double) $this->total_price,
            'minimum_booking'=>$this->minimum_booking,
            'apply_vat'=>$this->apply_vat,
            'location'=>$this->location,
            'images'=>WaterSportImageResource::collection($this->whenLoaded('images')),
            'seo'=>new SeoResource($this->whenLoaded('seo'))
        ];
    }
}
