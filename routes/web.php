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

Route::get('/buscar', 'ProductsController@buscar')->name('buscar');
Route::get('/valoresIndex', 'CarsController@retornaValoresLimite')->name('rtnValores');


Route::group(['prefix' => 'cars','middleware'=>'auth','as' => 'cars.'], function(){
	Route::get('/', 'CarsController@index')->name('index');
	Route::get('/create', 'CarsController@create')->name('create');
	Route::get('/{id}/edit', 'CarsController@edit')->name('edit');
	Route::post('/update/{id}', 'CarsController@update')->name('update');
	Route::post('/store', 'CarsController@store')->name('store');
	Route::post('/destroy', 'CarsController@destroy')->name('destroy');
	Route::get('/buscarIndex/{key}/{busca}','CarsController@find')->name('find');
	});

Route::resource('plans', 'PlansController')->middleware('auth');
Route::group(['prefix' => 'plans','middleware'=>'auth','as' => 'plans.'], function(){
	Route::get('/buscarIndex/{key}/{busca}','PlansController@find')->name('find');
	});
Route::resource('themes', 'ThemesController')->middleware('auth');
Route::group(['prefix' => 'themes','middleware'=>'auth','as' => 'themes.'], function(){
	Route::get('/buscarIndex/{key}/{busca}','ThemesController@find')->name('find');
	Route::post('/update/{id}', 'ThemesController@update')->name('updateMax');
	});
Route::resource('products', 'ProductsController')->middleware('auth');
Route::group(['prefix' => 'products','middleware'=>'auth','as' => 'products.'], function(){
	Route::get('/buscarIndex/{key}/{busca}','ProductsController@find')->name('find');
	Route::post('/update/{id}', 'ProductsController@update')->name('updateMax');
	});
Route::get('/credito', 'ThemesController@credito')->name('buscarcredito');