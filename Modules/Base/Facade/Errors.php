<?php


namespace Modules\Base\Facade;

use Illuminate\Support\Facades\Facade;

class Errors extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Errors';
    }
}
