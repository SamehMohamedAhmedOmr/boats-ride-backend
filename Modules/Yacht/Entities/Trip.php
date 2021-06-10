<?php

namespace Modules\Yacht\Entities;

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
}
