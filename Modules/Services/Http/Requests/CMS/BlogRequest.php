<?php

namespace Modules\Services\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Seo\Facades\SeoHelper;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title.en'=>['required','string','max:65000', $this->isMethod('POST') ? Rule::unique('blogs','title->en') : Rule::unique('blogs','title->en')->ignore($this->route('blog')) ],
            'title.ar'=>['required','string','max:65000',$this->isMethod('POST') ? Rule::unique('blogs','title->ar') : Rule::unique('blogs','title->ar')->ignore($this->route('blog'))],
            'description'=>'required|array|size:2',
            'description.en'=>'required|string|max:2000000',
            'description.ar'=>'required|string|max:2000000',
            'image'=>$this->isMethod('POST') ? 'required|string' : 'string',
            'is_active'=>'required|boolean'
            
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
