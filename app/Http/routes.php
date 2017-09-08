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

Route::get( '/', 'ReservationsController@index' );
Route::get( '/home', function () {
	return redirect( '/' );
} );

Route::get( '/auth/register', function () {
	return redirect( '/auth/login' );
} );

Route::resource( 'prices', 'PricesController' );

Route::group( [ 'middleware' => 'auth' ], function () {
	Route::resource( 'reservations', 'ReservationsController', [ 'only' => [ 'destroy' ] ] );
	Route::resource( 'holidays', 'HolidaysController', [ 'only' => [ 'index', 'store', 'destroy' ] ] );
	Route::resource( 'posts', 'PostsController' );
} );


Route::group( [ 'prefix' => 'api' ], function () {

	Route::group( [ 'prefix' => 'v1' ], function () {
		Route::resource( 'reservations', 'ReservationsApiController', [ 'only' => [ 'index', 'store' ] ] );
	} );

} );

Route::controllers( [
	'auth'     => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
] );
