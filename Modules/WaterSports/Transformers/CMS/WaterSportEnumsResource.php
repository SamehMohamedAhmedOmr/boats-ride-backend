<?php

namespace Modules\WaterSports\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;

class WaterSportEnumsResource extends JsonResource
{
    public function __construct(
        $water_sport_status
    ) {
        parent::__construct($water_sport_status);
        $this->water_sport_status = $water_sport_status;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return ['water_sport_status'=>$this->water_sport_status];
    }
}
