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
        Route::apiResource('yachts', 'YachtController');
    });
});


Route::namespace('Frontend')->group(function () {
    Route::apiResource('yachts',YachtController::class)->only(['index','show']);
});
