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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'indexController@index')->middleware('auth');
Route::get('/{carId}', 'indexController@index')->middleware('auth');

Route::get('history/{carId}', 'historyController@index')->middleware('auth');

Route::get('add/{carId}', 'addController@index')->middleware('auth');
Route::post('add/', 'addController@add')->middleware('auth');
