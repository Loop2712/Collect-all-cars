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
Route::get('/welcome_line_guest', 'GuestController@welcome_line_guest');


Route::get('/cars', function () {
    return view('ProfileUser/profileuser');
});

Route::get('/terms_of_service', function () {
    
    return view('terms_of_service');
});

Route::get('/privacy_policy', function () {
    
    return view('privacy_policy');
});

Auth::routes();

// ADMIN VIICHECK
Route::middleware(['auth', 'role:admin'])->group(function () {

	Route::get('/dashboard', 'DashboardController@dashboard');
	Route::get('/manage_user', 'Manage_userController@manage_user');
	Route::get('/view_new_user', 'Manage_userController@view_new_user');
	Route::get('/create_user', 'Manage_userController@create_user');
	Route::get('/manage_user/change_ToAdmin', 'Manage_userController@change_ToAdmin');
	Route::get('/manage_user/change_ToGuest', 'Manage_userController@change_ToGuest');

	Route::get('/guest', function () {
	    return view('guest');
	});
	Route::get('/index_detail', 'GuestController@index_detail');
	Route::get('/change_ToSenior', 'GuestController@change_ToSenior');
	Route::get('/change_ToCommon', 'GuestController@change_ToCommon');
	Route::get('/change_ToNormal', 'GuestController@change_ToNormal');
	
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
	Route::get('/news/create', 'NewsController@create');
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

Route::get('/thx_guest', function () {
    return view('guest/thx_guest');
});

Route::get('/thx', function () {
    return view('not_comfor/thx');
});

Route::resource('news', 'NewsController')->except(['create']);
Route::get('/reporter', 'NewsController@reporter');
Route::get('/near_news', 'NewsController@near_news');
Route::get('/my_news/{user_id}', 'NewsController@my_news');
Route::get('/report/{id}', 'NewsController@report');

