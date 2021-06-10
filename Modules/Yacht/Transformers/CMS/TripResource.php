<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\TripClientResource;

class TripResource extends JsonResource
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
            'payment_method'=>$this->payment_method,
            'client'=> $this->whenLoaded('client',function(){
                return new TripClientResource($this->client);
            }),
            'number_of_people'=>$this->number_of_people,
            'rate_per_hour'=>$this->rate_per_hour,
            'other_changes'=>(double) $this->other_changes,
            'discount'=>(double)$this->discount,
            'minimum_Advance_Payment'=>(double) $this->minimum_Advance_Payment,
            'coupon_code'=>$this->coupon_code,
            'client_notes'=>$this->client_notes,
            'admin_notes'=>$this->admin_notes
        ];
    }
}
