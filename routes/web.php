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

Route::get('/teams/', 'TeamController@index');

Route::get('/playlist/','PlaylistController@index');

Route::get('crud/', function(){
	return view('includes.crud');
});

Route::post('add-team/','TeamController@addTeam');
Route::post('add-game/', 'PlaylistController@addGame');
