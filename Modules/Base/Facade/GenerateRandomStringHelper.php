<?php


namespace Modules\Base\Facade;

use Illuminate\Support\Facades\Facade;

class GenerateRandomStringHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'GenerateRandomStringHelper';
    }
}
