<?php

namespace Modules\WaterSports\Transformers\Frontend;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\WaterSports\Transformers\CMS\WaterSportResource as CmsWaterSportResource;

class WaterSportResource extends CmsWaterSportResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
