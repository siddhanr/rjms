<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//default route...
Route::get('/', function(){
	return Redirect::to('home');
});

//login routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//home routes... 
Route::get('home', 'HomeController@index');

//customer apis...
Route::get('api/customer', 'CustomerApiController@getAll');
Route::get('api/address', 'CustomerApiController@getAddresses');
Route::get('api/job', 'CustomerApiController@getJobs');
