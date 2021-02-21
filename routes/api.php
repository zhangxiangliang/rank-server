<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Api\Controllers', 'prefix' => 'v1'], function () {
    Route::group(['prefix' => 'user', ], function () {
        Route::post('/login', 'UserController@login');
    });

    Route::group(['prefix' => 'star', ], function () {
        Route::get('/', 'StarController@index');
    });
});
