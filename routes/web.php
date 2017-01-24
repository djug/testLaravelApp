<?php

/* general purpose routes*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');


/* twitter relate routes*/
Route::get('twitter', ['as' => 'twitter', 'uses' => 'TwitterController@index']);
Route::get('twitter/login', ['as' => 'twitter.login', 'uses' => 'TwitterController@getLogin']);
Route::get('twitter/callback', ['as' => 'twitter.callback', 'uses' => 'TwitterController@getCallback']);


/* profile relate routes*/
Route::get('profile', ['as' => 'profile.show', 'uses' => 'UserProfileController@show']);
Route::get('profile/create', ['as' => 'profile.create', 'uses' => 'UserProfileController@create']);
Route::post('profile/store', ['as' => 'profile.store', 'uses' => 'UserProfileController@store']);
