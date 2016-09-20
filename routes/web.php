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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/foo', function () {
    return 'Hello World';
});

//Rutas para la tabla de colores
Route::group(['middleware' => 'auth','prefix' => 'colores'], function () {
   	Route::get('/', 'ColoresController@index')
   		->name('colores.index');
   	Route::get('create', 'ColoresController@create')
   		->name('colores.create');
   	Route::get('{id}/update', 'ColoresController@update')
   		->name('colores.update')
   		->where('id','[0-9]+');
   	Route::get('{id}/delete', 'ColoresController@delete')
   		->name('colores.delete')
   		->where('id','[0-9]+');
});
