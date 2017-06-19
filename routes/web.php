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

Route::get('home', 'HomeController@index')->name('home');

Route::get('teams', 'TeamController@index');

Route::get('playlist','PlaylistController@index');

Route::get('crud', function(){
	return view('includes.crud');
});

// TEAM CRUD
Route::post('add-team','TeamController@addTeam');
Route::get('teams-edit','TeamController@teamsEditIndex');
Route::get('team/{id}/delete', 'TeamController@teamDelete');
Route::get('team/{id}/edit', 'TeamController@teamEdit');
Route::post('team/{id}/update', 'TeamController@teamUpdate');

// PLAYLIST CRUD
Route::post('add-game', 'PlaylistController@addGame');
Route::get('games/edit/',function(){
	return "&&&&?";
});




