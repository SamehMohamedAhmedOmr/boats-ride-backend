<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\Frontend\BannersController;

Route::namespace('CMS')->prefix('admins')->group(function () {

    Route::middleware('auth:api')->as('admins.')->group(function () {

        Route::apiResource('banners', 'BannersController');
        Route::prefix('settings')
        ->as('settings.')->group(function () {
            Route::post('/', 'SettingsController@store')->name('store');
        });
        
    });
});

Route::namespace('Frontend')->group(function () {

    Route::get('banners', [BannersController::class,'index']);

    Route::prefix('settings')
    ->as('settings.')->group(function () {
        Route::get('/', 'SettingsController@show')->name('get');
    });
});


