<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::namespace('CMS')->prefix('admins')->group(function () {

    Route::middleware('auth:api')->as('admins.')->group(function () {

        Route::get('services/list-enums', 'ServicesController@listEnums');
        Route::apiResource('services', 'ServicesController');
        Route::apiResource('blogs', 'BlogController');
    });
});


Route::namespace('Frontend')->group(function () {
    Route::apiResource('services',ServiceController::class)->only(['index','show']);
    Route::apiResource('blogs',BlogController::class)->only(['index','show']);

});
