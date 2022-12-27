<?php

namespace Modules\Yacht\Transformers\CMS;

use Modules\Base\Transformers\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\EnumResource;
use Modules\Yacht\Transformers\CMS\TimeSlotResource;

class TripEnumsResource extends JsonResource
{
    
    public function __construct(
        $trip_status,
        $payment_methods,
        $time_slots,
        $countries
    ) {
        parent::__construct($trip_status);
        $this->trip_status = $trip_status;
        $this->payment_methods = $payment_methods;
        $this->time_slots = $time_slots;
        $this->countries = $countries;
       
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'trip_status'=> EnumResource::collection($this->trip_status),
            'payment_methods'=>EnumResource::collection($this->payment_methods),
            'time_slots'=>TimeSlotResource::collection($this->time_slots->sortBy('time')),
            'countries'=>CountryResource::collection($this->countries),
        ];
    }
}
