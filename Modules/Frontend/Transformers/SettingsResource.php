<?php

namespace Modules\Frontend\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
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
            'enable_coming_soon'=>(bool) $this->enable_coming_soon
        ];
    }
}
