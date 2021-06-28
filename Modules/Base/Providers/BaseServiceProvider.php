<?php

namespace Modules\Base\Providers;

use Modules\Base\Helpers\Errors;
use Modules\Base\Helpers\DbHelper;
use Modules\Base\Helpers\Pagination;
use Illuminate\Support\ServiceProvider;
use Modules\Base\Helpers\LanguageHelper;
use Modules\Base\Helpers\UtilitiesHelper;
use Modules\Base\Helpers\ExcelExportHelper;
use Modules\Base\Helpers\GenerateRandomStringHelper;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
    }

    private function registerFacades(){
        $this->app->bind('language', function()
        {
            return $this->app->make(LanguageHelper::class);
        });

        $this->app->bind('Pagination', function()
        {
            return $this->app->make(Pagination::class);
        });

        $this->app->bind('UtilitiesHelper', function()
        {
            return $this->app->make(UtilitiesHelper::class);
        });

        $this->app->bind('DbHelper', function()
        {
            return $this->app->make(DbHelper::class);
        });

        $this->app->bind('ExcelExportHelper', function()
        {
            return $this->app->make(ExcelExportHelper::class);
        });

        $this->app->bind('Errors', function()
        {
            return $this->app->make(Errors::class);
        });

        
        $this->app->bind('GenerateRandomStringHelper', function()
        {
            return $this->app->make(GenerateRandomStringHelper::class);
        });

        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path('Base', 'Database/Migrations'));
        $this->registerConfig();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Base', 'Config/config.php') => config_path('base.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Base', 'Config/config.php'),
            'base'
        );
    }
}
