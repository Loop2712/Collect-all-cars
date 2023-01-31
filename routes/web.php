<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeGeneratorController;

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
//วิธีใช้
Route::get('/how_to_use', function () {
    return view('how_to_use/how_to_use');
});

Route::get('/test_pdf_v1', function () {
    return view('test_pdf_v1');
});

Route::get('/test_pdf_blade', function () {
    return view('/report/PDF/test_export_pdf');
});


// Google login
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

// Facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Line login
Route::get('login/line', 'Auth\LoginController@redirectToLine')->name('login.line');
Route::get('login/line/callback', 'Auth\LoginController@handleLineCallback');

// TU
Route::get('login/line/tu_sos', 'Auth\LoginController@redirectToLine_TU_SOS');

// check_in
Route::get('login/line/check_in', 'Auth\LoginController@redirectToLine_check_in'); //?check_in_at=

// facebook_messenger_api
Route::get('/facebook_messenger_api', 'API\facebook_messenger_api@facebook');
// WhatsApp_messenger_api
Route::get('/whatsapp_messenger_api', 'API\facebook_messenger_api@whatsapp');

Route::get('facebook_callback_guest', 'MessengerController@facebook_callback_guest');

// ติดต่อเจ้าของรถ
Route::get('/welcome_line', 'Register_carController@welcome_line');
Route::get('/welcome_line_guest', 'GuestController@welcome_line_guest');

Route::get('/welcome_facebook', 'Register_carController@welcome_facebook');
Route::get('/welcome_facebook_guest', 'GuestController@welcome_facebook_guest');

// CHECK IN
Route::get('/welcome_check_in_line', 'Check_inController@welcome_check_in_line');
Route::get('/check_in_to_cretae', 'Check_inController@check_in_to_cretae');

Route::resource('check_in', 'Check_inController')->except(['index','show','edit','view']);



Route::get('/mail', function () {
    return view('mail/MailToCompany');
});

Route::get('/cars', function () {
    return view('auth/login2');
});

Route::get('/select_get_login', 'Register_carController@select_get');

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

	Route::get('/detail_area/{name_partner}', 'PartnerController@detail_area');

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
	Route::resource('partner_viicheck', 'PartnerController');
	Route::resource('group_line', 'Group_lineController');

	Route::resource('time_zone', 'Time_zoneController');
	Route::get('/create_time_zone', 'Time_zoneController@create_time_zone');
	Route::resource('text_topic', 'Text_topicController');
	Route::resource('name_-university', 'Name_UniversityController');
	Route::resource('disease', 'DiseaseController');
	Route::get('/check_in/admin_gallery', 'Check_inController@admin_gallery');
	Route::resource('nationality', 'NationalityController');

	Route::resource('mylog_condo', 'Mylog_condoController');
	Route::resource('partner_condo', 'Partner_condoController');
	Route::resource('user_condo', 'User_condoController');

});
// END ADMIN VIICHECK

//admin-partner
Route::middleware(['auth', 'role:admin-partner,partner,admin-condo'])->group(function () {

	Route::resource('ads_content', 'Ads_contentController')->except(['show','edit','index']);
	// Route::get('/partner_theme', 'PartnerController@partner_theme');
	Route::get('/partner_index', 'PartnerController@partner_index');
	Route::get('/how_to_use_partner', function () {
		return view('partner/partner_how_to_use');
	});
	Route::get('/register_cars_partner', 'PartnerController@register_cars');
	Route::get('/guest_partner', 'PartnerController@guest_partner');
	Route::get('/partner_guest_latest', 'PartnerController@partner_guest_latest');
	Route::get('/sos_partner', 'PartnerController@view_sos');
	Route::get('/sos_emergency_js100', 'PartnerController@sos_emergency_js100');
	Route::get('/sos_detail_partner', 'Partner_chartController@sos_detail_chart');
	Route::get('/sos_detail_js100', 'Partner_chartController@sos_detail_js100');
	Route::get('/sos_score_helper', 'PartnerController@sos_score_helper');
	Route::get('/score_helper/{user_id}', 'PartnerController@score_helper');

	// BROADCAST 
	Route::get('/broadcast/dashboard', 'PartnerController@dashboard_broadcast');
	Route::get('/broadcast/content', 'PartnerController@content_broadcast');
	Route::get('/broadcast/broadcast_by_car', 'PartnerController@broadcast_by_car');
	Route::get('/broadcast/broadcast_by_check_in', 'PartnerController@broadcast_by_check_in');
	Route::get('/broadcast/broadcast_by_user', 'PartnerController@broadcast_by_user');
	
	// Route::get('/sos_insurance', 'PartnerController@sos_insurance');
		Route::post('/partner_add_area', 'PartnerController@partner_add_area');
		Route::get('/add_area', 'PartnerController@add_area');
		Route::get('/service_area', 'PartnerController@service_area');
		Route::get('/service_pending', 'PartnerController@service_area_pending');
		Route::get('/service_current', 'PartnerController@service_area_current');
		Route::get('/manage_user_partner', 'PartnerController@manage_user');
		Route::get('/create_user_partner', 'PartnerController@create_user_partner');

		Route::get('/check_in/view', 'PartnerController@view_check_in');
		Route::get('/check_in/add_new_check_in', 'PartnerController@add_new_check_in');
		Route::get('/check_in/gallery', 'PartnerController@gallery');
		Route::get('/partner_media', 'PartnerController@partner_media');

	// -------- HELP CENTER ---------
	Route::resource('sos_help_center', 'Sos_help_centerController')->except(['create','index']);
	Route::get('help_center_admin', 'Sos_help_centerController@help_center_admin');
	Route::get('sos_help_center/reply_select/{sos_id}', 'Sos_help_centerController@reply_select');

	// ------- CONDO -------
	Route::resource('parcel', 'ParcelController');
	Route::resource('notify_repair', 'Notify_repairController');
	Route::resource('category_condo', 'Category_condoController');

});
// end admin-partner

//partner
// Route::middleware(['auth', 'role:partner'])->group(function () {

// 	Route::get('/partner_theme', 'PartnerController@partner_theme');

// 	Route::get('/register_cars_partner', 'PartnerController@register_cars');
// 	Route::get('/guest_partner', 'PartnerController@guest_partner');
// 	Route::get('/partner_guest_latest', 'PartnerController@partner_guest_latest');
// 	Route::get('/sos_partner', 'PartnerController@view_sos');
// 	// Route::get('/sos_insurance', 'PartnerController@sos_insurance');
// 	Route::get('/sos_detail_partner', 'PartnerController@sos_detail_chart');
	

// });
// end partner

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
	
	Route::get('/check_in_finish', function () {
	    return view('check_in/check_in_finish');
	});
	
	// -------- CONDO ---------
	Route::get('select_condo', 'Partner_condoController@select_condo');
	Route::get('/data_user_of_condo', 'Partner_condoController@data_user_of_condo');
	Route::resource('notify_repair', 'Notify_repairController')->except(['index','show','edit']);
	Route::get('/sos_map/add_photo/{id_sos_map}', 'Sos_mapController@sos_map_add_photo');

});

Route::get('/edit_act_login/{car_id}', 'Register_carController@edit_act_login');
Route::get('/sos_login', 'Sos_mapController@sos_login');
Route::get('/insurance_login', 'Sos_mapController@insurance_login');
Route::get('/sos_map/rate_help/{id_sos_map}', 'Sos_mapController@rate_help');
Route::get('/log_in_sos_map_add_photo/{id_sos_map}', 'Sos_mapController@log_in_sos_map_add_photo');
Route::get('/sos_thank_submit_score/{user_id}', 'Sos_mapController@sos_thank_submit_score');

// Route::get('/sos_map/helper/{id_sos_map}/{organization}','API\SosmapController@sos_helper');
// Route::get('/sos_map/helper_after_login/{id_sos_map}/{organization}','API\SosmapController@sos_helper_after_login');

Route::get('/insurance_login_facebook', 'Sos_mapController@insurance_login_facebook');
Route::get('/sos_login_facebook', 'Sos_mapController@sos_login_facebook');

Route::get('/market', 'CarController@main');
Route::get('/market/car', 'CarController@index');
Route::get('/image/{id}','CarController@image');
Route::get('/market/car/{id}','CarController@show');

Route::get('/market/motercycle', 'MotercleyviewController@index');
Route::get('/market/motercycle/{id}', 'MotercleyviewController@show');


// AUTO LOHIN FROM FLEX LINE
	Route::get('/edit_profile', 'ProfileController@edit_profile');
	Route::get('/edit_profile2', 'ProfileController@edit_profile2');
	Route::get('/change_language_from_line/{user_id}', 'ProfileController@change_language_from_line');

	Route::get('/line_mycar', 'ProfileController@line_mycar');
	Route::get('/not_comfor_login/{license_plate_id}', 'Not_comforController@not_comfor_login');
// END AUTO LOHIN FROM FLEX LINE

	Route::get('/edit_profile_facebook', 'ProfileController@edit_profile_facebook');
	
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

Route::resource('promotion', 'PromotionController');

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

Route::get('/test_test', function () {
    
    return view('test_test');
});

Route::get('/test_link_line', function () {
    
    return view('test_link_line');
});

Route::resource('cancel_-profile', 'Cancel_ProfileController');

Route::resource('cancel_after_6_month', 'Cancel_after_6_monthController');



// CHECK IP
Route::get('/check_ip', 'Home_pageController@check_ip');


Route::resource('d-p_tu_student', 'DP_tu_studentController');
Route::resource('mylog_fb', 'Mylog_fbController');

Route::get('qr-code-g', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('viicheck.com', public_path('img/new_qr_code/qrcode.png'));
    
  return view('qrCode');
    
});

Route::get('/select_register', function () {
    
    return view('select_register');
});

// ------- CONDO -------
Route::get('/login_line/notify_repair', 'Notify_repairController@login_line');
Route::get('/notify_repair/{id}/NOCF', 'Notify_repairController@notify_repair_NOCF');

//set_new_richMenu
Route::get('set_new_richMenu', 'API\LineApiController@set_new_richMenu');

// test_for_dev
Route::get('test_for_dev/type_car_registration', 'test_for_devController@type_car_registration');
Route::get('main_test', 'test_for_devController@main_test');
Route::get('text_sp', 'test_for_devController@text_sp');
Route::get('test_table', 'test_for_devController@test_table');

Route::get('/modal_loading', function () {
    return view('layouts/modal_loading');
});

Route::resource('partner_premium', 'Partner_premiumController');

Route::resource('sub_organization', 'Sub_organizationController');
Route::resource('sos_1669_form_yellow', 'Sos_1669_form_yellowController');
Route::resource('data_1669_operating_unit', 'Data_1669_operating_unitController');
Route::resource('data_1669_operating_officer', 'Data_1669_operating_officerController');