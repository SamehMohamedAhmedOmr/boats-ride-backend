<?php

namespace Modules\WaterSports\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Seo\Facades\SeoHelper;
use Illuminate\Foundation\Http\FormRequest;
use Modules\WaterSports\Enums\WaterSportStatusEnum;
use Modules\WaterSports\Http\Requests\CMS\WaterSportImageResource;

class WaterSportRequest extends FormRequest
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
            'name.en'=>['required','string','max:65000', $this->isMethod('POST') ? Rule::unique('water_sports','name->en') : Rule::unique('water_sports','name->en')->ignore($this->route('water_sport')) ],
            'name.ar'=>['required','string','max:65000',$this->isMethod('POST') ? Rule::unique('water_sports','name->ar') : Rule::unique('water_sports','name->ar')->ignore($this->route('water_sport'))],
            'water_sport_description'=>'required|array|size:2',
            'water_sport_description.en'=>'required|string|max:5000000',
            'water_sport_description.ar'=>'required|string|max:5000000', 
            'what_to_expect_description'=>'required|array|size:2',
            'what_to_expect_description.en'=>'required|string|max:5000000',
            'what_to_expect_description.ar'=>'required|string|max:5000000', 
            'routes'=>'required|array|size:2',
            'routes.en'=>'required|string|max:65000',
            'routes.ar'=>'required|string|max:65000', 
            'status'=>'required|integer|in:'.implode(',',WaterSportStatusEnum::values()),
            'code'=>'required|string|max:255',
            'color'=>'required|string|max:50',
            'corporate_company'=>'required|string|max:255',
            'corporate_price'=>'required|numeric|min:1',
            'selling_per_hour'=>'required|integer|min:1',
            'special_price'=>'required|numeric|min:1',
            'minimum_booking'=>'required|integer|min:1',
            'apply_vat'=>'required|boolean',
            // 'location'=>'required|string|max:65000',
            'location'=>'required|array|size:2',
            'location.en'=>'required|string|max:65000',
            'location.ar'=>'required|string|max:65000',
            'images'=>$this->isMethod('POST') ? 'required|array' : 'array',
            'images.*'=>'required|string',
            'banner' => $this->isMethod('POST') ? 'required|string' : 'string'
        ] + SeoHelper::validationRules();
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
