<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Request;
use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Modules\Base\Transformers\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'start_hour' => $this->start_hour,
            'start_date' => $this->start_date,
            'end_hour' => $this->end_hour,
            'end_date' => $this->end_date,
            'status' => $this->status,
            'phone' => $this->phone,
            'country_code'=>$this->country_code,
            'status_name' => TripStatusEnum::getKey($this->status),
            'payment_method' => $this->payment_method,
            'payment_method_name' => PaymentMethodsEnum::getKey($this->payment_method),
            // 'client'=> $this->whenLoaded('client',function(){
            //     return new TripClientResource($this->client);
            // }),
            'number_of_people' => $this->number_of_people,
            'rate_per_hour' => $this->rate_per_hour,
            'other_changes' => (double)$this->other_changes,
            'discount' => (double)$this->discount,
            'minimum_Advance_Payment' => (double)$this->minimum_Advance_Payment,
            'coupon_code' => $this->coupon_code,
            'client_notes' => $this->client_notes,
            'admin_notes' => $this->admin_notes,
            'trip_duration' => $this->trip_duration,
            'name' => $this->name,
            'email' => $this->email,
            'title' => $this->title,
            'address' => $this->address,
            'booking_number' => $this->booking_number,
            'total_price' => (double) $this->total_price,
            'paid_amount' => (double) $this->paid_amount,
            'country' => $this->whenLoaded('country', function () {
                return CountryResource::make($this->country);
            }),
            'yacht' => $this->whenLoaded('yacht', function () {
                return new YachtResource($this->yacht);
            }),
        ];
    }
}
