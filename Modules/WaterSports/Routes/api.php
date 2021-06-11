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

        Route::delete('water_sports/delete/image/{id}', 'WaterSportController@deleteImage');
        Route::get('water_sports/list-enums', 'WaterSportController@listEnums');
        Route::apiResource('water_sports', 'WaterSportController');

    });
});