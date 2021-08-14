<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Request;
use Modules\Yacht\Entities\YachtImage;
use Modules\Yacht\Enums\YachtStatusEnum;
use Modules\Seo\Transformers\CMS\SeoResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Services\Transformers\CMS\ServiceResource;

class YachtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'slug'=>$this->slug,
            'name'=>$this->name,
            'what_is_included'=>$this->what_is_included,
            'facilities'=>$this->facilities,
            'what_expect_description'=>$this->what_expect_description,
            'type'=>$this->type,
            'status'=>$this->status,
            'status_name'=>YachtStatusEnum::getKey($this->status),
            'code'=>$this->code,
            'color'=>$this->color,
            'passenger_capacity'=>$this->passenger_capacity,
            'size'=>$this->size,
            'beds'=>$this->beds,
            'no_of_captain'=>$this->no_of_captain,
            'crew_members'=>$this->crew_members,
            'corporate_company'=>$this->corporate_company,
            'corporate_price'=> (float) $this->corporate_price,
            'selling_per_hour'=>$this->selling_per_hour,
            'yacht_special_price'=>(float) $this->yacht_special_price,
            'minimum_hours_booking'=>$this->minimum_hours_booking,
            'apply_vat'=>(bool)$this->apply_vat,
            'manufacturer'=>$this->manufacturer,
            'cruising_speed'=>(int)$this->cruising_speed,
            'max_speed'=>(int)$this->max_speed,
            'horse_Power'=>(int)$this->horse_Power,
            'length'=>(int)$this->length,
            'fuel_type'=>(int)$this->fuel_type,
            'hull_type'=>(int)$this->hull_type,
            'engine_type'=>(int)$this->engine_type,
            'beam'=>(int)$this->beam,
            'water_slider'=>(bool)$this->water_slider,
            'safety_equipment'=>(bool)$this->safety_equipment,
            'soft_drinks_refreshments'=>(bool)$this->soft_drinks_refreshments,
            'swimming_equipment'=>(bool)$this->swimming_equipment,
            'ice_tea_water'=>(bool)$this->ice_tea_water,
            'DVD_player'=>(bool)$this->DVD_player,
            'satellite_system'=>(bool)$this->satellite_system,
            'red_carpet_on_arrival'=>(bool)$this->red_carpet_on_arrival,
            'spacious_saloon'=>(bool)$this->spacious_saloon,
            'BBQ_grill_equipment'=>(bool)$this->BBQ_grill_equipment,
            'fresh_towels'=>(bool)$this->fresh_towels,
            'yacht_slippers'=>(bool)$this->yacht_slippers,
            'bathroom_amenities'=>(bool)$this->bathroom_amenities,
            'under_water_light'=>(bool)$this->under_water_light,
            'LED_screen_tv'=>(bool)$this->LED_screen_tv,
            'sunbathing_on_the_foredeck'=>(bool)$this->sunbathing_on_the_foredeck,
            'fishing_equipment'=>(bool)$this->fishing_equipment,
            'images'=> YachtImageResource::collection($this->whenLoaded('images')),
            'services'=> ServiceResource::collection($this->whenLoaded('services')),
            'seo'=>new SeoResource($this->whenLoaded('seo'))
        ];
    }
}
