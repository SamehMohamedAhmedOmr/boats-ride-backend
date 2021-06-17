<?php

namespace Modules\Seo\Http\Requests\CMS;

use Modules\Seo\Facades\SeoHelper;
use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'url'=>'string|max:255',
            'title.*'=>'array|size:2',
            'title.en'=>'string',
            'title.ar'=>'string',
            'description.*'=>'array|size:2',
            'description.en'=>'string',
            'description.ar'=>'string',
            'keywords.*'=>'array|size:2',
            'keywords.en'=>'array',
            'keywords.ar'=>'array',
            'keywords.en.*'=>'string',
            'keywords.ar.*'=>'string',
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
