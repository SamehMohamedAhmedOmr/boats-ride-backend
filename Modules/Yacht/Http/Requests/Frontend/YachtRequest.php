<?php

namespace Modules\Yacht\Http\Requests\Frontend;

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
            'name'=>'required|string|max:500',
            'email'=>'required|string|max:255|email:rfc,dns',
            'message'=>'required|string|max:65000',
            'phone'=>'required|string|max:25',
            'yacht_id'=>'required|integer|exists:yachts,id,deleted_at,NULL'
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
