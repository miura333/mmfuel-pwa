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

// Route::get('/', 'indexController@index')->middleware('auth');
// Route::get('/{carId}', 'indexController@index')->middleware('auth');
//
// Route::get('history/{carId}', 'historyController@index')->middleware('auth');
//
// Route::get('add/fuel/{carId}', 'addController@index')->middleware('auth');
Route::post('/add/fuel', 'addController@add')->middleware('auth');
//
// Route::get('list/car/', 'carlistController@index')->middleware('auth');
// Route::get('list/car/{carId}', 'carlistController@index')->middleware('auth');
//
// Route::get('add/car/', function () {
//     return view('addcar');
// })->middleware('auth');
Route::post('/add/car', 'addController@addCar')->middleware('auth');

Route::get('/', function () {
    return view('indexvue');
})->middleware('auth');

Route::get('/api/getCarInfo', 'indexController@getCarInfo')->middleware('auth');
Route::get('/api/getCarInfo/{carId}', 'indexController@getCarInfo')->middleware('auth');
