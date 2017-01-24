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
Route::get('twitter', ['as' => 'twitter', 'uses' => 'TwitterController@index']);
Route::get('twitter/login', ['as' => 'twitter.login', 'uses' => 'TwitterController@getLogin']);
Route::get('twitter/callback', ['as' => 'twitter.callback', 'uses' => 'TwitterController@getCallback']);

Auth::routes();

Route::get('/home', 'HomeController@index');
