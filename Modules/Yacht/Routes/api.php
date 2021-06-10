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

        Route::delete('yachts/delete/image/{id}', 'YachtController@deleteImage');
        Route::get('yachts/list-enums', 'YachtController@listEnums');
        Route::apiResource('yachts', 'YachtController');
        Route::get('trips/list-enums', 'tripController@listEnums');
        Route::apiResource('trips', 'tripController');

    });
});





Route::namespace('Frontend')->group(function () {
    Route::apiResource('yachts',YachtController::class)->only(['index','show']);
});
