<?php


namespace Modules\Seo\Facades;

use Illuminate\Support\Facades\Facade;

class SeoHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SeoHelper';
    }
}
