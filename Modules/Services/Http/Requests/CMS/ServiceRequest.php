<?php

namespace Modules\Services\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name.en'=>'required|string|max:32000',
            'name.ar'=>'required|string|max:32000',
            'description'=>'required|array|size:2',
            'description.en'=>'required|string|max:32000',
            'description.ar'=>'required|string|max:32000',
            'price'=>'required|numeric|min:1',
            'price_model'=>'required|integer',
            'minimum_hours_booking'=>'required|integer|min:1',
            'max_quantity'=>'required|integer|min:1',
            'image'=>'required|string',
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
