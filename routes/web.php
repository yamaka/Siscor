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
    /*Home Routes*/
	Route::get('/', 'Home\HomeController@index')->name('Home');

    // Direction CRUD routes
    Route::resource('Direction', 'Direction\DirectionController');
    Route::get('Directions','Direction\DirectionController@all')->name('Directions');
    Route::get('directions_get_all', 'Direction\DirectionController@getAllDirections');
    Route::patch('/direction_update/{direction}','Direction\DirectionController@update')->name('direction_update');
    Route::delete('/direction_delete/{direction}', 'Direction\DirectionController@destroy')->name('direction_delete');
    Route::post('/direction_create', 'Direction\DirectionController@store')->name('direction_create');
    
    /*Units Routes*/
    Route::resource('Unit', 'Unit\UnitController');
    Route::get('Units', 'Unit\UnitController@all')->name('Units');
    Route::get('Units/{direction}', 'Unit\UnitController@unitsDirection')->name('Units');
    
    /*Users Routes*/
    Route::resource('User', 'User\UserController');
    
    /*Positions Routes*/
    Route::resource('Position', 'Position\PositionController');
    Route::get('get_position', array('as'=>'get_position', 'uses'=>'User\UserController@getPosition'));
    Route::get('Positions', 'Position\PositionController@all')->name('Positions');
    
    
    /*RoadMaps Routes*/
    Route::resource('RoadMap', 'RoadMap\RoadMapController');
    Route::get('roadmaps_get_all', 'RoadMap\RoadMapController@getAllRoadmaps');
    Route::get('get_roadmap', array('as'=>'get_roadmap', 'uses'=>'RoadMap\RoadMapController@Data'));
    Route::post('derive', array('as'=>'derive', 'uses'=>'RoadMap\RoadMapController@derive'));

});

