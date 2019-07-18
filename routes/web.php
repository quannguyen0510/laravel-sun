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
Route::group(['prefix'=>'players', 'middleware'=>'auth'], function () {
    Route::get('add', 'PlayerController@create');
    Route::post('add', 'PlayerController@store');

    Route::get('edit/{id}', 'PlayerController@edit')->name('edit');
    Route::post('edit/{id}', 'PlayerController@update')->name('edit');

    Route::get('delete/{id}', 'PlayerController@destroy');
});
