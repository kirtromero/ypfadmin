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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['auth']], function()
{
	Route::resource('imports', 'ImportController');
	Route::resource('scenes', 'ScenesController');
	Route::resource('tags', 'TagController');
	Route::resource('thumbnails', 'ThumbnailController');
	Route::resource('user', 'UserController');
	Route::resource('sites', 'SiteController');
	Route::resource('affiliates', 'AffiliatesController');
	Route::resource('/', 'HomeController');
});
