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

Route::group(['middleware' => ['auth','admin'],'prefix' => 'admin','as' => 'admin.'],function(){

    Route::get('users','UserController@index')->name('users.index');
    Route::get('users/create','UserController@create')->name('users.create');
    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::post('users','UserController@store')->name('users.store');

    Route::resource('teams','TeamController');

});

Route::group(['middleware' => 'auth','as' => 'team_leader.'],function(){
    Route::resource('projects','ProjectController');

    Route::get('kanban','ProjectController@kanban')->name('kanban');
});
