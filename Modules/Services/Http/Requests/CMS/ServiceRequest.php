<?php

namespace Modules\Services\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Seo\Facades\SeoHelper;
use Modules\Services\Enums\PriceModelEnum;
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
            'name.en'=>['required','string','max:65000', $this->isMethod('POST') ? Rule::unique('services','name->en') : Rule::unique('services','name->en')->ignore($this->route('service')) ],
            'name.ar'=>['required','string','max:65000',$this->isMethod('POST') ? Rule::unique('services','name->ar') : Rule::unique('services','name->ar')->ignore($this->route('service'))],
            'description'=>'required|array|size:2',
            'description.en'=>'required|string|max:1000000000',
            'description.ar'=>'required|string|max:1000000000',
            'price'=>'required|numeric|min:1',
            'price_model'=>'required|integer|in:'.implode(',',PriceModelEnum::values()),
            'minimum_hours_booking'=>'required|integer|min:1',
            'max_quantity'=>'required|integer|min:1',
            'image'=>$this->isMethod('POST') ? 'required|string' : 'string',
            
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
