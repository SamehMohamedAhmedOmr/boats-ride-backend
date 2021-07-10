<?php

namespace Modules\WaterSports\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class WaterSportTimeslotsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'=>'date_format:Y-m-d',
            'water_sport_id'=>'required|integer|exists:water_sports,id'
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
