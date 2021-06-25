<?php

namespace Modules\Yacht\Entities;

use Modules\Yacht\Entities\Yacht;
use Modules\Base\Entities\Country;
use Modules\Users\Entities\Clients;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

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
}
