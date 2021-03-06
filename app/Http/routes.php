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
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

//home routes... 
Route::get('home', 'HomeController@index');
Route::get('customer-page', 'HomeController@customer');

//customer apis...
Route::get('api/customers', 'CustomerController@getCustomers');
Route::get('api/customer', 'CustomerController@getCustomer');
Route::put('api/customer', 'CustomerController@updateCustomer');
Route::get('api/address', 'AddressController@getAddresses');
Route::get('api/address_from_suburb', 'AddressController@getAddressFromSuburb');
Route::get('api/suburbs', 'AddressController@getSuburbs');
Route::get('api/unarchived_jobs', 'JobController@getUnarchivedJobs');
Route::get('api/archived_jobs', 'JobController@getArchivedJobs');
Route::get('api/get_job', 'JobController@getJob');

Route::post('api/create_job', 'JobController@createJob');
Route::put('api/job', 'JobController@updateJob');
Route::post('api/create_customer', 'CustomerController@createCustomer');

Route::delete('api/job', 'JobController@deleteJob');

Route::delete('api/customer', 'CustomerController@deleteCustomer');

