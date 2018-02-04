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




Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'Home\HomeController@index')->name('Home');
    //Route::get('/Home', 'HomeController@index')->name('Home');
	// TODO start with programing go! now
	//Route::get('/Home', 'HomeController@index')->name('Home');
});


//Route::get('logout', 'Auth\LoginController@logout');

