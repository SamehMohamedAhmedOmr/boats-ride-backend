<?php

namespace Modules\Yacht\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Yacht\Enums\TripStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Modules\Yacht\Repositories\TripRepository;
use Modules\Users\Repositories\ClientsRepository;

class TripRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_hour'=>'required|date_format:H:i',
            'start_date'=>'required|date_format:Y-m-d',
            'end_hour'=>'required|date_format:H:i',
            'end_date'=>'required|date_format:Y-m-d',
            'status'=>'required|integer|in:'.implode(',',TripStatusEnum::values()),
            'payment_method'=>'required|integer|in:'.implode(',',PaymentMethodsEnum::values()),
            'name'=>'required|string|max:255',
            'title'=>'required|string|max:255',
            'phone'=>'required|numeric',
            'address'=>'required|string|max:65000',
            'email'=> $this->isMethod('POST') ? 'required|email:rfc,filter|unique:users,email' : ['required','email:rfc,filter',Rule::unique('users','email')->ignore($this->getUserId())],
            'country_id'=>'nullable|integer|exists:countries,id',
            'yacht_id'=>'required|integer|exists:yachts,id',
            'number_of_people'=>'required|integer|min:1',
            'rate_per_hour'=>'required|integer|min:1',
            'other_changes'=>'numeric|min:0',
            'discount'=>'numeric|min:0',
            'minimum_Advance_Payment'=>'numeric|min:0',
            'coupon_code'=>'nullable|string|max:50',
            'client_notes'=>'nullable|string|max:65000',
            'admin_notes'=>'nullable|string|max:65000'
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

    public function getUserId()
    {
        $trip_repo = resolve(TripRepository::class);

        $trip = $trip_repo->get($this->route('trip'),[],'id',['client']);

        return $trip->client ? $trip->client->user_id : null;
    }
}
