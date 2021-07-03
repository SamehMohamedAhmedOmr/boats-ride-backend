<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\CMS\AdminAuthenticationController;
use Modules\Users\Http\Controllers\CMS\AdminController;
use Modules\Users\Http\Controllers\Frontend\SocialAuthenticationController;
use Modules\Users\Http\Controllers\Frontend\UserAuthenticationController;
use Modules\Users\Http\Controllers\Frontend\UserController;


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

Route::namespace('Frontend')->prefix('v1')->group(function () {

    Route::prefix('users')->group(function () {

        Route::post('login', [UserAuthenticationController::class,'login']);

        Route::post('login/facebook', [SocialAuthenticationController::class,'facebookLogin']);

        Route::post('register', [UserAuthenticationController::class, 'register']);

        Route::prefix('passwords')->group(function () {
            Route::post('forget', [UserAuthenticationController::class,'forgetPassword']);
            Route::post('change', [UserAuthenticationController::class,'forgetChangePassword']);
        });

        Route::group(['middleware' => ['auth:api']], function () {
            Route::post('logout', [UserAuthenticationController::class,'logout']);
            Route::post('reset/password', [UserAuthenticationController::class,'resetPassword']);

            Route::prefix('profile')->group(function () {
                Route::get('/', [UserController::class,'show']);
                Route::match(['PUT', 'PATCH'], '/', [UserController::class,'updateProfile']);
            });
        });

    });


    Route::prefix('doctors')->group(function () {
        Route::post('login', [UserAuthenticationController::class,'loginAsDoctor']);

        Route::post('register', [UserAuthenticationController::class, 'registerAsDoctor']);

        Route::prefix('passwords')->group(function () {
            Route::post('forget', [UserAuthenticationController::class,'forgetPassword']);
            Route::post('change', [UserAuthenticationController::class,'forgetChangePassword']);
        });

        Route::group(['middleware' => ['auth:api']], function () {

            Route::post('logout', [UserAuthenticationController::class,'logout']);
            Route::post('reset/password', [UserAuthenticationController::class,'resetPassword']);

        });

    });

});


Route::namespace('CMS')->prefix('admins')->group(function () {
    Route::post('login', [AdminAuthenticationController::class, 'login'])
        ->name('cms.admin.login');

    Route::prefix('passwords')->group(function () {
        Route::post('forget', [AdminAuthenticationController::class, 'forgetPassword'])
            ->name('cms.admin.forget.password');
        Route::post('change', [AdminAuthenticationController::class, 'forgetChangePassword'])
            ->name('cms.admin.password.change');
    });

    Route::middleware('auth:api')->as('admins.')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/', [AdminController::class, 'get'])
                ->name('show');
            Route::put('/', [AdminController::class, 'updateProfile'])
                ->name('update');
        });

        Route::get('admins/get_permissions', 'AdminController@getMyPermissions');
        Route::apiResource('admins', 'AdminController');
        Route::apiResource('permissions', 'PermissionController')->only(['index']);

        Route::prefix('admins')->as('admins.')->group(function () {
            Route::get('/sheet/export', [AdminController::class, 'export'])
                ->name('export');
        });

        Route::apiResource('clients', 'ClientsController');


        Route::post('logout', [AdminAuthenticationController::class, 'logout'])
            ->name('logout');

        Route::post('reset/password', [AdminAuthenticationController::class, 'resetPassword'])
            ->name('admin.reset.password');

    });
});
