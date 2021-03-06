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

Route::get('/', 'WelcomeController@displayTable');

Route::get('/statistics/{assumePrice?}', 'WelcomeController@statistics');

Route::get('home', 'HomeController@index');

Route::get('display_movies/{sortBy?}/{ascend?}', 'WelcomeController@displayTable');

Route::get('testasdf', function()
{
	//return 'ewfaewf';
	//return (DB::select('select * from movies;'));
	//return var_dump(App\Movie::findOrFail(1)->title);
	return dd(App\Movie::all()->toArray());
	//return $this->dispatch(new updateRottenRating());
});

Route::get('testasdf2', 'WelcomeController@testFunction');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
