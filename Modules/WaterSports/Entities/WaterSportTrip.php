<?php

namespace Modules\WaterSports\Entities;

use Modules\Base\Entities\Country;
use Modules\Users\Entities\Clients;
use Illuminate\Database\Eloquent\Model;
use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Base\Facade\GenerateRandomStringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterSportTrip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $max_id = $model->max('id') != 0 ? $model->max('id') + 1 : 1;
            $model->booking_number = 'WS-' . GenerateRandomStringHelper::generate(13) . '-' . $max_id;
        });
    }
    
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

    public function getStatusName()
    {
        return TripStatusEnum::getKey($this->status);
    }
}
