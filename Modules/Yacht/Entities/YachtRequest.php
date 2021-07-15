<?php

namespace Modules\Yacht\Entities;

use Modules\Yacht\Entities\Yacht;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class YachtRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function yacht()
    {
        return $this->belongsTo(Yacht::class,'yacht_id');
    }

}
