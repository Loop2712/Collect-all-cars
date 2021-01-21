<?php

use Illuminate\Support\Facades\Route;

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
// Google login
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// Facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Line login
Route::get('login/line', 'Auth\LoginController@redirectToLine')->name('login.line');
Route::get('login/line/callback', 'Auth\LoginController@handleLineCallback');


Route::get('/cars', function () {
    return view('car/create');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::resource('register_car', 'Register_carController')->except(['index']);
	Route::get('/welcome', 'Register_carController@welcome_line')->name('welcome');
	Route::get('/register_car/create', 'Register_carController@create')->name('register_car_create');
	Route::resource('deliver', 'DeliverController')->except(['index']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CarController@main');
Route::get('/car', 'CarController@index');
Route::get('/image/{id}','CarController@image');
Route::get('/car/{id}','CarController@show');
Route::get('/car/create', 'CarController@create');
Route::post('/car', 'CarController@store');
Route::get('/car/{id}/edit', 'CarController@edit');
Route::put('/car/{id}', 'CarController@update');

//Route::resource('car','CarController');

Route::resource('detail', 'DetailController');
Route::resource('guest', 'GuestController')->except(['index']);
Route::resource('mylog', 'MylogController');

Route::post('/lineapi', 'API\LineApiController@store');