<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\EnumResource;

class TripEnumsResource extends JsonResource
{
    
    public function __construct(
        $trip_status,
        $payment_methods
    ) {
        parent::__construct($trip_status);
        $this->trip_status = $trip_status;
        $this->payment_methods = $payment_methods;
       
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
           
        ];
    }
}
