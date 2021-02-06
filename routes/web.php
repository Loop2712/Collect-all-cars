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

Route::get('/welcome_line', 'Register_carController@welcome_line');


// Route::get('/cars', function () {
//     return view('3menu');
// });

Route::get('/terms_of_service', function () {
    
    return view('terms_of_service');
});

Auth::routes();

// ADMIN VIICHECK
Route::middleware(['auth', 'role:admin'])->group(function () {

	Route::get('/dashboard', function () {
	    return view('admin_viicheck/dashboard');
	});
	Route::resource('profanity', 'ProfanityController');
});
// END ADMIN VIICHECK

Route::middleware(['auth'])->group(function () {
	Route::resource('register_car', 'Register_carController');
	Route::get('/register_car/create', 'Register_carController@create')->name('register_car_create');
	Route::get('/register_car/{id}/edit_act', 'Register_carController@edit_act')->name('register_car_create');
	Route::resource('deliver', 'DeliverController')->except(['index']);
	Route::resource('guest', 'GuestController');
	Route::resource('not_comfor', 'Not_comforController')->except(['index']);
	Route::resource('wishlist', 'WishlistController');
	Route::resource('sell', 'SellController');
	Route::resource('motercycles', 'MotorcyclesellController');
	Route::resource('profile', 'ProfileController');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CarController@main');
Route::get('/car', 'CarController@index');
Route::get('/image/{id}','CarController@image');
Route::get('/car/{id}','CarController@show');

Route::get('/motercycle', 'MotercleyviewController@index');
Route::get('/motercycle/{id}', 'MotercleyviewController@show');


//Route::resource('car','CarController');

Route::resource('detail', 'DetailController');
// Route::resource('guest', 'GuestController')->except(['index']);
Route::resource('mylog', 'MylogController');

// Route::post('/lineapi', 'API\LineApiController@store');

Route::get('/modal', 'GuestController@modal');

Route::get('/menu', function () {
    return view('3menu');
});

Route::get('/before', function () {
    return view('before_register_car');
});

Route::get('/thx_guest', function () {
    return view('guest/thx_guest');
});
