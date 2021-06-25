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
        Route::post('timeslots/yacht-trips', 'TimeSlotController@getTimeSlotsForYacht');
        Route::post('timeslots/water_sport_trips', 'TimeSlotController@getTimeSlotsForWaterSport');
        Route::apiResource('timeslots', 'TimeSlotController')->only(['index']);
        Route::apiResource('offers', 'OfferController');

    });
});





Route::namespace('Frontend')->group(function () {
    Route::apiResource('yachts',YachtController::class)->only(['index','show']);
});


Route::namespace('Frontend')->group(function () {
    Route::apiResource('offers',OfferController::class)->only(['index','show']);
});
