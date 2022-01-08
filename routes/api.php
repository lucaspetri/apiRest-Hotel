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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('hospedes', 'App\Http\Controllers\HospedesController@createHospedes');
Route::get('hospedes', 'App\Http\Controllers\HospedesController@getAllHospedes');
Route::get('hospedes/{id}', 'App\Http\Controllers\HospedesController@getHospedes');
Route::put('hospedes/{id}', 'App\Http\Controllers\HospedesController@updateHospedes');
Route::delete('hospedes/{id}', 'App\Http\Controllers\HospedesController@deleteHospedes');
