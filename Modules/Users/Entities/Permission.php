<?php

namespace Modules\Users\Entities;

use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];
    public $translatable = ['name'];
    protected $casts = ['name' => 'json'];       

}
