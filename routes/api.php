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

Route::get('/films', 'Api\ApiController@films');
Route::get('/film/{id}', 'Api\ApiController@filmId');
Route::get('/genres', 'Api\ApiController@genres');
Route::get('/genre/{id}', 'Api\ApiController@genreId');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
