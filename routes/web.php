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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', 'indexController@index');
Route::get('/{carId}', 'indexController@index');

Route::get('history/{carId}', 'historyController@index');

Route::get('add/{carId}', 'addController@index');
Route::post('add/', 'addController@add');
