<?php

namespace Modules\WaterSports\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\WaterSports\Entities\WaterSport;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterSportRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function waterSport()
    {
        return $this->belongsTo(WaterSport::class,'water_sport_id');
    }
}
