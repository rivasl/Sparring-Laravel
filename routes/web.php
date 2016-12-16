<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Route::get('/noticias',les 'NoticiasController@index');
Route::resource('/noticias', 'NoticiasController');

Route::resource('/users', 'UserController');

Route::resource('/vehicles', 'VehicleController');

Route::resource('/vehicles/show/{id}', 'VehicleController@show');
