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

// VIICHECK.COM
Route::get('/', 'Home_pageController@home_page');
Route::get('/home', 'Home_pageController@home_page');
Route::get('/member', 'ProfileController@member');


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

// facebook_messenger_api
Route::get('facebook_messenger_api', 'MessengerController@index');
Route::post('facebook_messenger_api', 'MessengerController@index');

Route::get('facebook_callback_guest', 'MessengerController@facebook_callback_guest');

Route::get('/mail', function () {
    return view('mail/MailToCompany');
});

Route::get('/cars', function () {
    return view('auth/login2');
});

Route::get('/select_get', function () {
    return view('register_car/select_get');
});

Route::get('/terms_of_service', function () {
    
    return view('terms_of_service');
});

Route::get('/privacy_policy', function () {
    
    return view('privacy_policy');
});
Route::get('/faq', function () {
    
    return view('faq');
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
	Route::get('/manage_user/change_ToJS100', 'Manage_userController@change_ToJS100');
	Route::get('/sos', 'SosController@view_sos');
	Route::get('/sos_detail_chart', 'SosController@sos_detail_chart');

	Route::get('/guest', function () {
	    return view('guest');
	});
	Route::get('/guest_latest', 'DashboardController@guest_latest');
	
	Route::get('/report_register_cars', 'DashboardController@report_register_cars');
	Route::get('/add_news', 'DashboardController@add_news');

	Route::get('/index_detail', 'GuestController@index_detail');
	Route::get('/change_ToGold', 'GuestController@change_ToGold');
	Route::get('/change_ToSilver', 'GuestController@change_ToSilver');
	Route::get('/change_ToBronze', 'GuestController@change_ToBronze');
	
	Route::resource('profanity', 'ProfanityController');

	Route::resource('report_news', 'Report_newsController');

	Route::resource('insurance', 'InsuranceController');

	Route::resource('sos_insurance', 'Sos_insuranceController');

});
// END ADMIN VIICHECK

// ADMIN 2bgreen
Route::middleware(['auth', 'role:2bgreen'])->group(function () {

	Route::get('/report_register_cars_2bgreen', 'Partners\P_2bgreenController@report_register_cars');
	Route::get('/guest_2bgreen', 'Partners\P_2bgreenController@guest_2bgreen');
	// Route::get('/guest_2bgreen/select_month/{month_1}/{month_2}/{year}', 'Partners\P_2bgreenController@select_month');
	Route::get('/guest_latest_2bgreen', 'Partners\P_2bgreenController@guest_latest_2bgreen');
	Route::get('/sos_detail_2bgreen', 'Partners\P_2bgreenController@sos_detail_chart');
	Route::get('/sos_2bgreen', 'Partners\P_2bgreenController@view_sos');
	

});
// END ADMIN 2bgreen

Route::middleware(['auth'])->group(function () {
	Route::resource('register_car', 'Register_carController');
	Route::get('/register_car_organization', 'Register_carController@index_organization');
	Route::get('/register_car/create', 'Register_carController@create')->name('register_car_create');
	Route::get('/register_car/{id}/edit_act', 'Register_carController@edit_act');
	Route::resource('deliver', 'DeliverController')->except(['index']);
	Route::resource('guest', 'GuestController');
	Route::resource('not_comfor', 'Not_comforController')->except(['index']);
	Route::resource('wishlist', 'WishlistController');
	Route::resource('sell', 'SellController');
	Route::resource('motercycles', 'MotorcyclesellController');
	Route::resource('profile', 'ProfileController');
	Route::get('/news/create', 'NewsController@create');
	Route::resource('sos_map', 'Sos_mapController')->except(['index','show','edit']);
	Route::get('sos_insurance_blade', 'Sos_mapController@sos_insurance_blade');
	// Route::get('/sosmap', 'SosController@sosmap');
});

Route::get('/edit_act_login/{car_id}', 'Register_carController@edit_act_login');
Route::get('/sos_login', 'Sos_mapController@sos_login');

Route::get('/market', 'CarController@main');
Route::get('/market/car', 'CarController@index');
Route::get('/image/{id}','CarController@image');
Route::get('/market/car/{id}','CarController@show');

Route::get('/market/motercycle', 'MotercleyviewController@index');
Route::get('/market/motercycle/{id}', 'MotercleyviewController@show');


// AUTO LOHIN FROM FLEX LINE
	Route::get('/edit_profile', 'ProfileController@edit_profile');
	Route::get('/edit_profile2', 'ProfileController@edit_profile2');

	Route::get('/line_mycar', 'ProfileController@line_mycar');
	Route::get('/not_comfor_login/{license_plate}', 'Not_comforController@not_comfor_login');
// END AUTO LOHIN FROM FLEX LINE

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

Route::get('/thx_guest_google', function () {
    return view('guest/thx_guest_google');
});

Route::get('/thx', function () {
    return view('not_comfor/thx');
});

Route::resource('news', 'NewsController')->except(['create']);
Route::get('/reporter', 'NewsController@reporter');
Route::get('/near_news', 'NewsController@near_news');
Route::get('/my_news/{user_id}', 'NewsController@my_news');
Route::get('/report/{id}/{content}', 'NewsController@report');


Route::resource('promotion', 'PromotionController')->except(['create','show','edit']);




Route::get('/middle_price_motorcycle', 'Middle_price_carController@index_motor');
Route::resource('middle_price_car', 'Middle_price_carController')->except(['create','show','edit']);
// SosController
// Route::resource('sos', 'SosController');

//เหตุด่วนเหตุร้าย
Route::get('/disaster2', 'SosController@disaster2');
//ไฟไหม้รถ
Route::get('/car_fire', 'SosController@car_fire');
//หน่วยแพทย์กู้ชีวิต
Route::get('/life_saving', 'SosController@life_saving');
//จส100
Route::get('/js_100', 'SosController@js_100');
//สายด่วนทางหลวง
Route::get('/highway', 'SosController@highway');
//ตำรวจท่องเที่ยว
Route::get('/tourist_police', 'SosController@tourist_police');
//ทนายความ
Route::get('/lawyers', 'SosController@lawyers');
// ป่อเต็กตึ๊ง
Route::get('/pok_tek_tung', 'SosController@pok_tek_tung');


// END SosController

Route::resource('organization', 'OrganizationController')->except(['index','show']);

Route::get('/sos_thank', function () {
    
    return view('sos_map/sos_thank');
});

Route::get('/sos_thank_area', function () {
    
    return view('sos_map/sos_thank_area');
});

Route::get('/test_ocr', function () {
    
    return view('test_ocr');
});

Route::resource('cancel_-profile', 'Cancel_ProfileController');

Route::resource('cancel_after_6_month', 'Cancel_after_6_monthController');