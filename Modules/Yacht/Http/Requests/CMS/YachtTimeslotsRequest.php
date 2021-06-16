<?php

namespace Modules\Yacht\Http\Requests\CMS;

use Illuminate\Foundation\Http\FormRequest;

class YachtTimeslotsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'=>'date_format:Y-m-d|after_or_equal:'.now()->format('Y-m-d'),
            'yacht_id'=>'required|integer|exists:yachts,id'
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
