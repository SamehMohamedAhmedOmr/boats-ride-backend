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
        Route::post('water_sport_trips/send-voutcher-email/{booking_number}', 'WaterSportTripController@sendVoutcherEmail');
        Route::get('water_sport_trips/list-enums', 'WaterSportTripController@listEnums');
        Route::apiResource('water_sport_trips', 'WaterSportTripController');
    });
});



Route::namespace('Frontend')->group(function () {
    Route::apiResource('water_sports',WaterSportController::class)->only(['index','show']);
    Route::get('water_sport_trips/voutcher-email-link/{booking_number}', 'WaterSportTripController@getVoutcherEmailLink')->name('waterSportTrips.voutcher.email.link');
    Route::get('water_sport_trips/voutcher-email/{booking_number}', 'WaterSportTripController@showVoutcherEmail')->name('waterSportTrips.voutcher.email.show');

});
