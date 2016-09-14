<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/events', 'EventsController@index');
Route::get('/events/create', 'EventsController@create');
Route::post('/events/create', 'EventsController@store');

Route::get('/events/{name?}/edit', 'EventsController@edit');
Route::post('/events/{name?}/edit', 'EventsController@update');
Route::post('/events/{name?}/delete', 'EventsController@destroy');