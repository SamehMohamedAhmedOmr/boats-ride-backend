<?php

namespace Modules\Seo\Entities;

use Modules\Base\traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes, Translatable;
    protected $table="seo";
    public $translatable = ['keywords', 'description','title'];
    protected $casts = [
        'keywords' => 'json',
        'description' => 'json',
        'title' => 'json',
    ];
    protected $fillable = ['keywords','description','title','seoable_id','seoable_type','url'];
}
