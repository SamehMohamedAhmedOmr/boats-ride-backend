<?php

namespace Modules\Base\Entities;

use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory,Translatable;
    
    protected $guarded = [];
    public $translatable = ['name','description'];
    protected $casts = ['name' => 'json','description' => 'json', 'slug' => 'json'];   

}
