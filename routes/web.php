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


Route::group(['prefix' => 'cars','middleware'=>'auth','as' => 'cars.'], function(){
	Route::get('/', 'CarsController@index')->name('index');
	Route::get('/create', 'CarsController@create')->name('create');
	Route::get('/{id}/edit', 'CarsController@edit')->name('edit');
	Route::post('/update/{id}', 'CarsController@update')->name('update');
	Route::post('/store', 'CarsController@store')->name('store');
	Route::post('/destroy', 'CarsController@destroy')->name('destroy');
	Route::get('/buscarIndex/{key}/{busca}','CarsController@find')->name('find');
	});

//Route::resource('cars', 'CarsController')->middleware('auth');