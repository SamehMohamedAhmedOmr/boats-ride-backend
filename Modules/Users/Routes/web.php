<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('reset-password/{token}', 'Frontend\UserAuthenticationController@getResetPasswordForm')->name('reset.password');
Route::post('reset-password', 'Frontend\UserAuthenticationController@forgetChangePassword');
