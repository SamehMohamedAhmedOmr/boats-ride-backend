<?php

namespace Modules\Yacht\Transformers\CMS;

use Modules\Yacht\Entities\YachtImage;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Services\Transformers\CMS\ServiceResource;
use Modules\Yacht\Transformers\CMS\YachtImageResource;

class YachtResource extends JsonResource
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
            'slug'=>$this->slug,
            'name'=>$this->name,
            'what_is_included'=>$this->what_is_included,
            'facilities'=>$this->facilities,
            'what_expect_description'=>$this->what_expect_description,
            'type'=>$this->type,
            'status'=>$this->status,
            'code'=>$this->code,
            'color'=>$this->color,
            'passenger_capacity'=>$this->passenger_capacity,
            'size'=>$this->size,
            'no_of_captain'=>$this->no_of_captain,
            'crew_members'=>$this->crew_members,
            'corporate_company'=>$this->corporate_company,
            'corporate_price'=> (float) $this->corporate_price,
            'selling_per_hour'=>$this->selling_per_hour,
            'yacht_special_price'=>(float) $this->yacht_special_price,
            'minimum_hours_booking'=>$this->minimum_hours_booking,
            'apply_vat'=>$this->apply_vat,
            'manufacturer'=>$this->manufacturer,
            'cruising_speed'=>$this->cruising_speed,
            'max_speed'=>$this->max_speed,
            'horse_Power'=>$this->horse_Power,
            'length'=>$this->length,
            'fuel_type'=>$this->fuel_type,
            'hull_type'=>$this->hull_type,
            'engine_type'=>$this->engine_type,
            'beam'=>$this->beam,
            'water_slider'=>$this->water_slider,
            'safety_equipment'=>$this->safety_equipment,
            'soft_drinks_refreshments'=>$this->soft_drinks_refreshments,
            'swimming_equipment'=>$this->swimming_equipment,
            'ice_tea_water'=>$this->ice_tea_water,
            'DVD_player'=>$this->DVD_player,
            'satellite_system'=>$this->satellite_system,
            'red_carpet_on_arrival'=>$this->red_carpet_on_arrival,
            'spacious_saloon'=>$this->spacious_saloon,
            'BBQ_grill_equipment'=>$this->BBQ_grill_equipment,
            'fresh_towels'=>$this->fresh_towels,
            'yacht_slippers'=>$this->yacht_slippers,
            'bathroom_amenities'=>$this->bathroom_amenities,
            'under_water_light'=>$this->under_water_light,
            'LED_screen_tv'=>$this->LED_screen_tv,
            'sunbathing_on_the_foredeck'=>$this->sunbathing_on_the_foredeck,
            'fishing_equipment'=>$this->fishing_equipment,
            'images'=> YachtImageResource::collection($this->whenLoaded('images')),
            'services'=> ServiceResource::collection($this->whenLoaded('services')),
        ];
    }
}
