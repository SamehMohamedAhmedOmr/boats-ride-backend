<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeSlotResource extends JsonResource
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
            'time'=>$this->time,
            'label'=>$this->label,
            'status'=>$this->when($this->status,function(){
                return $this->status;
            })
        ];
    }
}
