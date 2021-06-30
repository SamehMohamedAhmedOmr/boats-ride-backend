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
        $this->prepareAvaliableSlots();
        $this->prepareUnavaliableSlots();
        $time_slots = $this->avaliable_slots->merge($this->unavaliable_slots)->sortBy('time');
        return TimeSlotResource::collection($time_slots);
    }

    public function prepareAvaliableSlots()
    {
        $this->avaliable_slots = $this->avaliable_slots->map(function($item) { $item->status = 'available'; return $item; });
    }

    public function prepareUnavaliableSlots()
    {
        $this->unavaliable_slots = $this->unavaliable_slots->map(function($item) { $item->status = 'unavailable'; return $item;});
    }
}
