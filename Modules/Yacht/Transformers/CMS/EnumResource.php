<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;

class EnumResource extends JsonResource
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
            'key'=> $this->key,
            'value'=> $this->value,
        ];
    }
}
