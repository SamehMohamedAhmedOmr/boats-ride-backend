<?php

namespace Modules\Yacht\Entities;

use Modules\Yacht\Entities\Yacht;
use Modules\Base\Entities\Country;
use Modules\Users\Entities\Clients;
use Illuminate\Database\Eloquent\Model;
use Modules\Yacht\Enums\TripStatusEnum;
use Modules\Base\Facade\GenerateRandomStringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $max_id = $model->max('id') != 0 ? $model->max('id') + 1 : 1;
            $model->booking_number = 'YA-' . GenerateRandomStringHelper::generate(13) . '-' . $max_id;
        });
    }
    
    protected $guarded = ['id'];
    
    public function client()
    {
        return $this->hasOne(Clients::class,'id','client_id');
    }

    public function yacht()
    {
        return $this->belongsTo(Yacht::class,'yacht_id');
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
