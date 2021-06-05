<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannersRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $delete_check = ',deleted_at,NULL';

        switch ($this->getMethod()) {
            case 'GET':
            case 'DELETE':
                $default = [
                    'banner' => 'required|integer|exists:banners,id'.$delete_check,
                ];
                break;
            case 'POST':
                $default = [
                    'title' => 'required|array',
                    'title.en' => 'required|string|max:100',
                    'title.ar' => 'required|string|max:100',

                    'link' => 'required|string|max:255',
                    'type_id' => 'required|integer|exists:banner_types,id'.$delete_check,

                    'image' => 'string',

                ];
                break;
            case 'PUT':
                $default = [
                    'banner' => 'required|integer|exists:banners,id'.$delete_check,

                    'title' => 'array',
                    'title.en' => 'string|max:100',
                    'title.ar' => 'string|max:100',

                    'is_active' => 'boolean',
                    'image' => 'string',

                    'link' => 'string|max:255',
                ];
                break;

            default:
                $default = [];
                break;
        }

        return $default;
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

    protected function prepareForValidation()
    {
        prepareBeforeValidation($this, [], 'banner');
    }

}
