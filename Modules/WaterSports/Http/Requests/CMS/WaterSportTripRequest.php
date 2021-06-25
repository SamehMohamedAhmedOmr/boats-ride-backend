<?php

namespace Modules\WaterSports\Http\Requests\CMS;

use Illuminate\Validation\Rule;
use Modules\Yacht\Enums\TripStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Modules\WaterSports\Repositories\WaterSportTripRepository;

class WaterSportTripRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start_hour'=>'required|date_format:H:i:s|exists:time_slots,time',
            'start_date'=>'required|date_format:Y-m-d',
            'end_hour'=>'required|date_format:H:i:s|exists:time_slots,time|after:start_hour',
            'end_date'=>'required|date_format:Y-m-d',
            'status'=>'required|integer|in:'.implode(',',TripStatusEnum::values()),
            'payment_method'=>'required|integer|in:'.implode(',',PaymentMethodsEnum::values()),
            'name'=>'required|string|max:255',
            'title'=>'required|string|max:255',
            'phone'=>'required|numeric',
            'address'=>'required|string|max:65000',
//            'email'=> $this->isMethod('POST') ? 'required|email:rfc,filter|unique:users,email' : ['required','email:rfc,filter',Rule::unique('users','email')->ignore($this->getUserId())],
            'country_id'=>'nullable|integer|exists:countries,id',
            'email'=> 'required|email:rfc,filter|string|max:255',
            'water_sport_id'=>['required','integer','exists:water_sports,id', 
            Rule::unique('water_sport_trips','water_sport_id')->where(function($q){    
                return $q->where('start_date',$this->start_date)
                        ->where('start_hour',$this->start_hour)
                        ->where('end_date',$this->end_date)
                        ->where('end_hour',$this->end_hour);
            })->ignore($this->route('water_sport_trip'))],
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
        $trip_repo = resolve(WaterSportTripRepository::class);

        $trip = $trip_repo->get($this->route('water_sport_trip'),[],'id',['client']);

        return $trip->client ? $trip->client->user_id : null;
    }

    public function messages()
    {
        return [
            'water_sport_id.unique'=>"this WaterSport is already reserved in this duration"
        ];
    }
}
