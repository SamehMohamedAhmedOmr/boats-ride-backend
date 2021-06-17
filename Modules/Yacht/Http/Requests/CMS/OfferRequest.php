<?php

namespace Modules\Yacht\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Seo\Facades\SeoHelper;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|array|size:2',
            'title.en'=>['required','string','max:65000', $this->isMethod('POST') ? Rule::unique('offers','title->en') : Rule::unique('offers','title->en')->ignore($this->route('offer')) ],
            'title.ar'=>['required','string','max:65000',$this->isMethod('POST') ? Rule::unique('offers','title->ar') : Rule::unique('offers','title->ar')->ignore($this->route('offer'))],
            'description'=>'required|array|size:2',
            'description.en'=>'required|string|max:65000',
            'description.ar'=>'required|string|max:65000',
            'valid_date'=>'required|date_format:Y-m-d',
            'is_active'=>'required|boolean',
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
