<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Users\Facades\UsersErrorsHelper;

class ClientsRequest extends FormRequest
{
    protected $client_type = 2;

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
                    'client' => [
                        'required',
                        'integer',
                        Rule::exists('users', 'id')->where(function ($query) {
                            $query->where('deleted_at', null)->where('user_type', $this->client_type);
                        }),
                    ],
                ];
                break;
            case 'POST':
                $default = [
                    // Required Address Info
                    'name' => 'required|string|max:255',
                    'email' => 'required|email:rfc,filter|unique:users,email'.$delete_check,
                    'password' => 'string|min:6',
                    'image' => 'string',
                    'phone' => 'unique:patient,phone'
                ];
                break;
            case 'PUT':
                $default = [
                    'client' => [
                        'required',
                        'integer',
                        Rule::exists('users', 'id')->where(function ($query) {
                            $query->where('deleted_at', null)->where('user_type', $this->client_type);
                        }),
                    ],
                    'name' => 'string|regex:'.UsersErrorsHelper::regexName().'|max:255',
                    'email' => [
                        'email:rfc,filter',
                        Rule::unique('users', 'email')->ignore($this->patient),
                    ],
                    'image' => 'string',
                    'is_active' => 'boolean',
                ];
                break;

            default:
                $default = [];
                break;
        }

        return $default;
    }

    public function attributes()
    {
        return [
            'address.country_id' => 'country',
            'address.city_id' => 'city',
            'address.district_id' => 'district',

            'address.street' => 'street',
            'address.title' => 'title',
            'address.nearest_landmark' => 'Nearest Landmark',
            // Optional Address Info
            'address.address_phone' => 'Address Phone',
            'address.building_no' => 'building Number',
            'address.apartment_no' => 'Apartment Number',
            'address.floor_no' => 'Floor Number',
            'address.lat' => 'lat',
            'address.lng' => 'lng',
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

    protected function prepareForValidation()
    {
        prepareBeforeValidation($this, [], 'client');
    }
}
