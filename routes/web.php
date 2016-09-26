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

Route::get('/locations', 'LocationsController@index');
Route::get('/locations/create', 'LocationsController@create');
Route::post('/locations/create', 'LocationsController@store');
Route::get('/locations/{id?}/edit', 'LocationsController@edit');
Route::post('/locations/{id?}/edit', 'LocationsController@update');
Route::post('/locations/{id?}/delete', 'LocationsController@destroy');

Route::get('/users', 'UsersController@index');
Route::get('/users/create', 'UsersController@create');
Route::post('/users/create', 'UsersController@store');
Route::get('/users/{id?}/edit', 'UsersController@edit');
Route::post('/users/{id?}/edit', 'UsersController@update');
Route::post('/users/{id?}/delete', 'UsersController@destroy');

Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/create', 'ProjectsController@create');
Route::post('/projects/create', 'ProjectsController@store');
Route::get('/projects/{id?}/edit', 'ProjectsController@edit');
Route::post('/projects/{id?}/edit', 'ProjectsController@update');
Route::post('/projects/{id?}/delete', 'ProjectsController@destroy');