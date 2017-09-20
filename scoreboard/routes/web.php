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

Route::get('/', [
    'uses'=>'PublicController@home',
    'as'=>'Scoreboard'
]);
Route::post('/', [
    'uses'=>'PublicController@homesearch',
    'as'=>'Scoreboard'
]);


Auth::routes();
Route::resource('score','ScoresController');


Route::get('/userhome', [
    'uses'=>'HomeController@userhome',
    'as'=>'home',
    'middleware'=>'roles',
    'roles'=>['user','administrator']
]);

Route::get('/admin', [
    'uses'=>'HomeController@adminhome',
    'as'=>'admin',
    'middleware'=>'roles',
    'roles'=>['administrator']
]);