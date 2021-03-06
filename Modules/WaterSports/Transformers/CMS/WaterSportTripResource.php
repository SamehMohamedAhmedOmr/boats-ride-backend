<?php

namespace Modules\WaterSports\Transformers\CMS;

use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Yacht\Enums\PaymentMethodsEnum;
use Modules\Base\Transformers\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\TripClientResource;
use Modules\WaterSports\Transformers\CMS\WaterSportResource;

class WaterSportTripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'start_hour'=>$this->start_hour,
            'start_date'=>$this->start_date,
            'end_hour'=>$this->end_hour,
            'end_date'=>$this->end_date,
            'status'=>$this->status,
            'status_name'=> TripStatusEnum::getKey($this->status),
            'payment_method'=>$this->payment_method,
            'payment_method_name'=>PaymentMethodsEnum::getKey($this->payment_method),
            // 'client'=> $this->whenLoaded('client',function(){
            //     return new TripClientResource($this->client);
            // }),
            'number_of_people'=>$this->number_of_people,
            'rate_per_hour'=>$this->rate_per_hour,
            'other_changes'=>(double) $this->other_changes,
            'discount'=>(double)$this->discount,
            'minimum_Advance_Payment'=>(double) $this->minimum_Advance_Payment,
            'coupon_code'=>$this->coupon_code,
            'client_notes'=>$this->client_notes,
            'admin_notes'=>$this->admin_notes,
            'trip_duration'=>$this->trip_duration,
            'booking_number' => $this->booking_number,
            'total_price' => (double) $this->total_price,
            'name'=>$this->name,
            'email'=>$this->email,
            'title'=>$this->title,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'country_code'=>$this->country_code,
            'paid_amount' => (double) $this->paid_amount,
            'country'=> $this->whenLoaded('country',function(){
                return CountryResource::make($this->country);
             }),
            'water_sport'=> $this->whenLoaded('waterSport',function(){
                return new WaterSportResource($this->waterSport);
            }),
        ];
    }
}
