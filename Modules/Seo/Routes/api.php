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

        Route::apiResource('seo', 'SeoController');
    });
});


Route::namespace('Frontend')->group(function () {

    Route::get('seo/{id}', 'SeoController@show');
    
});

