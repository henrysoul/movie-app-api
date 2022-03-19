<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\RegisterController@register');
Route::post('login', 'Api\LoginController@login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::group(['prefix' => 'movie'], function () {
        Route::get('list', 'Api\MovieController@index');
        Route::post('create', 'Api\MovieController@store');
        Route::post('update', 'Api\MovieController@update');
        Route::get('delete/{movie_id}', 'Api\MovieController@delete');
    });

});
