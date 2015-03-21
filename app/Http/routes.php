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


Route::get('login', array('as' => 'login', 'uses' => 'LoginController@index'));
Route::post('login/post', array('as' => 'login.post', 'uses' => 'LoginController@post'));

Route::get('/', array('as' => 'index', 'uses' => 'CustomerController@index'));

//Flights
Route::get('flights', array('as' => 'flight.search', 'uses' => 'CustomerController@flightsearch'));
Route::post('flights/search', array('as' => 'flight.search.post', 'uses' => 'CustomerController@flightsearchresults'));
Route::get('flights/book', array('as' => 'flight.book', 'uses' => 'CustomerController@flightbook'));

//Hotels
Route::get('hotels', array('as' => 'hotel.search', 'uses' => 'CustomerController@hotelsearch'));
Route::post('hotels/search', array('as' => 'hotel.search.post', 'uses' => 'CustomerController@hotelsearchresults'));
Route::get('hotels/book', array('as' => 'hotel.book', 'uses' => 'CustomerController@hotelbook'));

//Travel Packages
Route::get('packages', array('as' => 'package.browse', 'uses' => 'CustomerController@packages'));
Route::get('packages/book', array('as' => 'package.book', 'uses' => 'CustomerController@packagebook'));

//Order History
Route::get('orders', array('as' => 'order.history', 'uses' => 'CustomerController@orderhistory'));

//Reviews
Route::get('hotel/review', array('as' => 'hotel.review', 'uses' => 'CustomerController@reviewhotel'));
Route::post('hotel/review/post', array('as' => 'hotel.review.post', 'uses' => 'CustomerController@reviewhotelpost'));

Route::get('flight/review', array('as' => 'flight.review', 'uses' => 'CustomerController@reviewflight'));
Route::post('flight/review/post', array('as' => 'flight.review.post', 'uses' => 'CustomerController@reviewflightpost'));



#####################Providers#################################
Route::get('/provider', array('as' => 'provider.index', 'uses' => 'ProviderController@index'));

//Flights
Route::get('/provider/flight/add', array('as' => 'provider.flight.add', 'uses' => 'ProviderController@flightadd'));
Route::post('/provider/flight/add/post', array('as' => 'provider.flight.add.post', 'uses' => 'ProviderController@flightaddpost'));
Route::get('/provider/flight/list', array('as' => 'provider.flight.list', 'uses' => 'ProviderController@flightlist'));
Route::get('/provider/flight/update', array('as' => 'provider.flight.update', 'uses' => 'ProviderController@flightupdate'));
Route::post('/provider/flight/update/post', array('as' => 'provider.flight.update.post', 'uses' => 'ProviderController@flightupdatepost'));

//Hotels
Route::get('/provider/hotel/add', array('as' => 'provider.hotel.add', 'uses' => 'ProviderController@hoteladd'));
Route::post('/provider/hotel/add/post', array('as' => 'provider.hotel.add.post', 'uses' => 'ProviderController@hoteladdpost'));
Route::get('/provider/hotel/list', array('as' => 'provider.hotel.list', 'uses' => 'ProviderController@hotellist'));
Route::get('/provider/hotel/update', array('as' => 'provider.hotel.update', 'uses' => 'ProviderController@hotelupdate'));
Route::post('/provider/hotel/update/post', array('as' => 'provider.hotel.update.post', 'uses' => 'ProviderController@hotelupdatepost'));

#####################System Admin#################################
Route::get('/manager', array('as' => 'manager.index', 'uses' => 'ManagerController@index'));

Route::get('/manager/package/add', array('as' => 'manager.package.add', 'uses' => 'ManagerController@packageadd'));
Route::post('/manager/package/add/post', array('as' => 'manager.package.add.post', 'uses' => 'ManagerController@packageaddpost'));



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
