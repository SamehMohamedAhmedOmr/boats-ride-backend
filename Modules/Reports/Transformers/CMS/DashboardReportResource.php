<?php

namespace Modules\Reports\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Frontend\Transformers\SettingsResource;

class DashboardReportResource extends JsonResource
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
            'yacht_count'=> $this['yacht_count'],
            'water_sport_count'=> $this['water_sport_count'],
            'yacht_reserved_trips_count'=>$this['yacht_reserved_trips_count'],
            'yacht_confirmed_trips_count'=>$this['yacht_confirmed_trips_count'],
            'water_sport_reserved_trips'=>$this['water_sport_reserved_trips'],
            'water_sport_confirmed_trips'=>$this['water_sport_confirmed_trips'],
            'settings'=>SettingsResource::make($this['settings'])
        ];
    }
}
