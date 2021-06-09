<?php

namespace Modules\Yacht\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Yacht\Enums\FuelTypeEnum;
use Modules\Yacht\Enums\HullTypeEnum;
use Modules\Yacht\Enums\YachtTypeEnum;
use Modules\Yacht\Enums\EngineTypeEnum;
use Modules\Yacht\Enums\YachtStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class YachtRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|array|size:2',
            'name.en'=>['required','string','max:65000', $this->isMethod('POST') ? Rule::unique('yachts','name->en') : Rule::unique('yachts','name->en')->ignore($this->route('yacht')) ],
            'name.ar'=>['required','string','max:65000',$this->isMethod('POST') ? Rule::unique('yachts','name->ar') : Rule::unique('yachts','name->ar')->ignore($this->route('yacht'))],
            'what_expect_description'=>'required|array|size:2',
            'what_expect_description.en'=>'required|string|max:65000',
            'what_expect_description.ar'=>'required|string|max:65000', 
            'what_is_included'=>'required|array|size:2',
            'what_is_included.en'=>'required|string|max:65000',
            'what_is_included.ar'=>'required|string|max:65000', 
            'facilities'=>'required|array|size:2',
            'facilities.en'=>'required|string|max:65000',
            'facilities.ar'=>'required|string|max:65000',
            'type'=>'required|integer|in:'.implode(',',YachtTypeEnum::values()),
            'status'=>'required|integer|in:'.implode(',',YachtStatusEnum::values()),
            'color'=>'required|string|max:255',
            'code'=>'required|string|max:255',
            'passenger_capacity'=>'required|integer|min:1',
            'size'=>'required|integer|min:1',
            'no_of_captain'=>'required|integer|min:1',
            'crew_members'=>'required|integer|min:1',
            'corporate_company'=>'required|string|max:255',
            'corporate_price'=>'required|numeric',
            'selling_per_hour'=>'required|integer|min:1',
            'yacht_special_price'=>'numeric',
            'minimum_hours_booking'=>'required|integer|min:1',
            'apply_vat'=>'required|boolean',
            'manufacturer'=>'required|string|max:255',
            'cruising_speed'=>'required|integer|min:1',
            'max_speed'=>'required|integer|min:1',
            'horse_Power'=>'required|integer|min:1',
            'length'=>'required|integer|min:1',
            'fuel_type'=>'required|integer|in:'.implode(',',FuelTypeEnum::values()),
            'hull_type'=>'required|integer|in:'.implode(',',HullTypeEnum::values()),
            'engine_type'=>'required|integer|in:'.implode(',',EngineTypeEnum::values()),
            'beam'=>'required|integer|min:1',
            'water_slider'=>'boolean',
            'safety_equipment'=>'boolean',
            'soft_drinks_refreshments'=>'boolean',
            'swimming_equipment'=>'boolean',
            'ice_tea_water'=>'boolean',
            'DVD_player'=>'boolean',
            'satellite_system'=>'boolean',
            'red_carpet_on_arrival'=>'boolean',
            'spacious_saloon'=>'boolean',
            'BBQ_grill_equipment'=>'boolean',
            'fresh_towels'=>'boolean',
            'yacht_slippers'=>'boolean',
            'bathroom_amenities'=>'boolean',
            'under_water_light'=>'boolean',
            'LED_screen_tv'=>'boolean',
            'sunbathing_on_the_foredeck'=>'boolean',
            'fishing_equipment'=>'boolean',
            'services'=>'required|array|distinct',
            'services.*'=>'required|integer|exists:services,id',
            'images'=>$this->isMethod('POST') ? 'required|array' : 'array',
            'images.*'=>'required|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
