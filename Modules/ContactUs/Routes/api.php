<?php

use Illuminate\Http\Request;
use Modules\ContactUs\Http\Controllers\Frontend\ContactUsController;

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

Route::namespace('Frontend')->group(function () {

    Route::post('contact-us', [ContactUsController::class,'store']);
});
