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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/observations', 'ObservationController@index')->name('observation');
Route::get('/observation/add', 'ObservationController@create');
Route::get('/observation/{observation}/edit', 'ObservationController@edit');
Route::post('/observation', 'ObservationController@store');
Route::put('/observation/{observation}', 'ObservationController@update');
Route::delete('/observation/{observation}', 'ObservationController@destroy');
