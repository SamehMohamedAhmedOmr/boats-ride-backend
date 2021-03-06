<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Base\Http\Controllers\CMS\CountryController;

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


Route::prefix('admins')->group(function () {

    Route::middleware('auth:api')->as('admins.')->group(function () {
        Route::apiResource('countries', CountryController::class)->only(['index']);
    });

});
