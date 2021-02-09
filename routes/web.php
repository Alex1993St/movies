<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index');

// FilmController
Route::get('/film', 'FilmController@show');
Route::get('/film/{id}', 'FilmController@index');
Route::get('/film', 'FilmController@show')->name('film');
Route::get('/create_film', 'FilmController@create');
Route::post('/create_film', 'FilmController@insert');
Route::post('/film_film', 'FilmController@update')->name('film_update');
Route::get('/edit_film/{id}', 'FilmController@edit');
Route::get('/delete_film/{id}', 'FilmController@delete');

// ActionController
Route::get('/status', 'ActionController@status')->name('status');
Route::get('/update_status/{id}', 'ActionController@formUpdateStatus');
Route::post('/update_status', 'ActionController@updateStatus')->name('update_status');


// GenreController
Route::get('/genre', 'GenreController@show')->name('genre');
Route::get('/create_genre', 'GenreController@create');
Route::post('/create_genre', 'GenreController@insert');
Route::post('/edit_genre', 'GenreController@update')->name('genre_update');
Route::get('/edit_genre/{id}', 'GenreController@edit');
Route::get('/delete_genre/{id}', 'GenreController@delete');



