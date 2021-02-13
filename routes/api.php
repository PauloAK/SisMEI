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
Route::prefix('v1')->group( function () {
    Route::group(['middleware' => 'api', 'prefix' => 'auth' ], function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('logout', 'AuthController@logout')->name('logout');
        Route::post('refresh', 'AuthController@refresh')->name('refresh');
        Route::get('me', 'AuthController@me')->name('me');
    });

    Route::middleware('jwt.auth')->group( function () {
        Route::apiResource('users', 'UserController');
        Route::apiResource('customers', 'CustomerController');
    });
});