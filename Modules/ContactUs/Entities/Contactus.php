<?php

namespace Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table = "contact_us";
    protected $fillable = ["name","email","phone","message"];
}
