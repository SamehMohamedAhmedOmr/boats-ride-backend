<?php

namespace Modules\WaterSports\Entities;

use Modules\Base\Entities\Country;
use Modules\Users\Entities\Clients;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterSportTrip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
        
    public function client()
    {
        return $this->hasOne(Clients::class,'id','client_id');
    }

    public function waterSport()
    {
        return $this->belongsTo(WaterSport::class,'water_sport_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
