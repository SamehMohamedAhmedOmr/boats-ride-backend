<?php

namespace Modules\Yacht\Transformers\CMS;

use Modules\Base\Transformers\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TripClientResource extends JsonResource
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
            'id' => $this->id,
            'name' =>  $this->whenLoaded('user',function(){
                    return $this->user->name;
            }),
            'email' => $this->whenLoaded('user',function(){
                return $this->user->email;
             }),
            'phone' => $this->phone,
            'address'=>$this->address,
            'title'=>$this->title,
            'country'=> $this->whenLoaded('country',function(){
                  return CountryResource::make($this->country);
            })
        ];
    }
}
