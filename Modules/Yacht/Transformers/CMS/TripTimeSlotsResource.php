<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\TimeSlotResource;

class TripTimeSlotsResource extends JsonResource
{
    public function __construct(
        $avaliable_slots,
        $unavaliable_slots
    ) {
        parent::__construct($avaliable_slots);
        $this->avaliable_slots = $avaliable_slots;
        $this->unavaliable_slots = $unavaliable_slots;
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
            'available_slots'=>TimeSlotResource::collection($this->avaliable_slots),
            'unavailable_slots'=>TimeSlotResource::collection($this->unavaliable_slots),
        ];
    }
}
