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
//DEMO
Route::get('/demo_sos_1669_api', 'Sos_help_centerController@demo');

/*
|--------------------------------------------------------------------------
| ViiFix
|--------------------------------------------------------------------------
*/

// Test รับเรื่องแจ้งซ่อม
Route::get('/demo_repair_admin_index', function () {
    return view('test_repair_admin/test_repair_admin_index');
});
Route::get('/demo_repair_admin_view', function () {
    return view('test_repair_admin/test_repair_admin_view');
});
// Test การจัดการพื้นที่ดูแล
Route::get('/demo_management_area', function () {
    return view('test_repair_admin/test_management_area');
});
Route::get('/demo_management_view', function () {
    return view('test_repair_admin/test_management_view');
});

// Test การจัดการหมวดหมู่และกลุ่มไลน์
Route::get('/demo_categorie_repair_index', function () {
    return view('test_repair_admin/test_categorie_repair_index');
});
Route::get('/demo_categorie_repair_create', function () {
    return view('test_repair_admin/test_categorie_repair_create');
});
Route::get('/demo_categorie_repair_view', function () {
    return view('test_repair_admin/test_categorie_repair_view');
});
// Test ดูช่วงเวลาการแจ้งซ่อมบำรุง
Route::get('/demo_repair_timeline', function () {
    return view('test_repair_admin/test_repair_timeline');
});
// Test ตรวจสอบคุณภาพการซ่อม
Route::get('/demo_repair_quality_index', function () {
    return view('test_repair_admin/test_repair_quality_index');
});
Route::get('/demo_repair_quality_view', function () {
    return view('test_repair_admin/test_repair_quality_view');
});
Route::get('/demo_detail_repair_quality', function () {
    return view('test_repair_admin/demo_detail_repair_quality');
});
// Test การจัดการวัสดุ / อุปกรณ์ที่ใช้ในการซ่อม
Route::get('/demo_repair_mat_index', function () {
    return view('test_repair_admin/test_repair_mat_index');
});
Route::get('/demo_repair_mat_view', function () {
    return view('test_repair_admin/test_repair_mat_view');
});
// Test การซ่อมบำรุง
Route::get('/demo_repair_maintenance_index', function () {
    return view('test_repair_admin/test_repair_maintenance_index');
});
Route::get('/demo_repair_maintenance_view', function () {
    return view('test_repair_admin/test_repair_maintenance_view');
});


//VIIFIX เจ้าหน้าที่
Route::get('/demo_officer_maintain', 'Maintain_notisController@Maintain_officer');

/*
|--------------------------------------------------------------------------
| End ViiFix
|--------------------------------------------------------------------------
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

Route::get('/test_get_partners', function () {
    return view('/test_get_partners');
});

Route::get('/check_user_from/{name}', 'PartnerController@check_user_from');


Route::get('/share_1669', function () {
    return view('share_to_facebook/share_1669');
});

// registe re-to line
// https://www.viicheck.com/login/line/to_line_oa
Route::get('login/line/to_line_oa', 'Home_pageController@re_to_line_oa');
Route::get('re_to_line_oa_2', 'Home_pageController@re_to_line_oa_2');


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

// Line login other app
Route::get('login/line/{user_from}', 'Auth\LoginController@redirectToLine_other_app_SOS');
Route::get('/sos_login/{user_from}', 'Sos_mapController@sos_login_other_app');

Route::get('/vote_kan_login/{user_from}', 'Vote_kan_data_stationsController@vote_kan_login');
Route::get('/vote_kan_login/login/line/{user_from}', 'Auth\LoginController@redirectToLine_vote_kan_login');


// check_in
Route::get('login/line/check_in', 'Auth\LoginController@redirectToLine_check_in'); //?check_in_at=

// facebook_messenger_api
// Route::get('/facebook_messenger_api', 'API\facebook_messenger_api@facebook');
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

	Route::get('/Manage_uploaded_photos', 'API\PartnersController@Manage_uploaded_photos');
	Route::get('/Manage_resize_photos', 'API\PartnersController@Manage_resize_photos');
	Route::get('/add_data_car', 'Middle_price_carController@add_data_car');

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

	Route::resource('mylog_condo', 'Mylog_condoController');
	Route::resource('partner_condo', 'Partner_condoController');
	Route::resource('user_condo', 'User_condoController');

	// sos nationalitie
	Route::resource('nationality', 'NationalityController');
	Route::resource('nationalitie_sos', 'Nationalitie_sosController');
	Route::resource('nationalitie_group_lines', 'Nationalitie_group_linesController');
	Route::resource('nationalitie_officers', 'Nationalitie_officersController');
	Route::get('admin/privilege', 'PrivilegeController@privilege_admin');

	// NEW Partner (SOS Partner)
	Route::resource('sos_partners', 'Sos_partnersController');
});
// END ADMIN VIICHECK

//admin-partner
Route::middleware(['auth', 'role:admin-partner,partner,admin-condo'])->group(function () {

	Route::get('/view_map_officer_all', 'API\PartnersController@view_map_officer_all');
	Route::get('/view_map_officer_area', 'API\PartnersController@view_map_officer_area');
	Route::get('/video_how_to_use', 'API\PartnersController@video_how_to_use');

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

	// -- SOS MAP --
	// Officer
	Route::get('sos_map/check_tag_sos/{id_sos_map}/{groupId}', 'Sos_mapController@check_tag_sos');
	Route::get('sos_map/tag_sos/map_officer/{id_sos_map}/{groupId}', 'Sos_mapController@map_officer');
	Route::get('sos_map/command/{id_sos_map}', 'Sos_mapController@sos_map_command');
	Route::get('sos_map/delete_case/{id_sos_map}', 'Sos_mapController@delete_case');
	Route::get('sos_map/delete_case_from_wait_delete/{id_sos_map}', 'Sos_mapController@delete_case_from_wait_delete');

	// -- SOS MAP repair --
	Route::get('sos_map/report_repair/{id_sos_map}', 'Sos_mapController@report_repair');

	// hospital_offices
	Route::get('hospital_offices_index', 'Hospital_officeController@hospital_offices_index');
	Route::get('view_hospital_offices', 'Hospital_officeController@view_hospital_offices');
	Route::get('open_active_hospital/{id}', 'Hospital_officeController@open_active_hospital');
	Route::get('edit_my_hospital/{id}', 'Hospital_officeController@edit_my_hospital');
    Route::get('create_hospital', 'Hospital_officeController@create_hospital');

	// BROADCAST
	Route::get('/broadcast/dashboard', 'PartnerController@dashboard_broadcast');
	Route::get('/broadcast/content', 'PartnerController@content_broadcast');
	Route::get('/broadcast/broadcast_by_car', 'PartnerController@broadcast_by_car');
	Route::get('/broadcast/broadcast_by_check_in', 'PartnerController@broadcast_by_check_in');
	Route::get('/broadcast/broadcast_by_user', 'PartnerController@broadcast_by_user');
    Route::get('/broadcast/broadcast_by_sos', 'PartnerController@broadcast_by_sos');
	// DASHBOARD
    Route::get('/dashboard_index', 'Partner_DashboardController@dashboard_index');
    Route::get('/dashboard_user_index', 'Partner_DashboardController@dashboard_user_index');

	Route::get('/dashboard_viisos', function () {
		return view('dashboard/dashboard_viisos/viisos_show/all_sos_show');
	});
    // Route::get('/dashboard_viisos', 'Partner_DashboardController@dashboard_viisos');
    Route::get('/dashboard_viisos_3_topic', 'Partner_DashboardController@viisos_3_topic');
    Route::get('/dashboard_viisos_used', 'Partner_DashboardController@viisos_used');

    Route::get('/dashboard_viimove_register_car', 'Partner_DashboardController@viimove_register_car');
    Route::get('/dashboard_viimove_car_3_topic', 'Partner_DashboardController@viimove_car_3_topic');

    Route::get('/dashboard_viinews_3_topic', 'Partner_DashboardController@viinews_3_topic');

    Route::get('/dashboard_boardcast_3_topic', 'Partner_DashboardController@boardcast_3_topic');

    // DASHBOARD_1669
    Route::get('/dashboard_1669_index', 'Dashboard_1669_Controller@dashboard_index_1669');
    Route::get('/dashboard_1669_show', 'Dashboard_1669_Controller@all_user_1669');
    Route::get('/dashboard_1669_all_command', 'Dashboard_1669_Controller@dashboard_1669_all_command');
    Route::get('/dashboard_1669_all_score_unit', 'Dashboard_1669_Controller@dashboard_1669_all_score_unit');
    Route::get('/dashboard_1669_all_average_score_by_case', 'Dashboard_1669_Controller@dashboard_1669_all_average_score_by_case');
    Route::get('/dashboard_1669_all_sos_show', 'Dashboard_1669_Controller@dashboard_1669_all_sos_show');
    Route::get('/dashboard_1669_all_case_sos_show', 'Dashboard_1669_Controller@dashboard_1669_all_case_sos_show');

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
	Route::resource('sos_help_center', 'Sos_help_centerController')->except(['create','index','show']);
	Route::get('help_center_admin', 'Sos_help_centerController@help_center_admin');
	Route::get('sos_help_center/reply_select_2/{sos_id}', 'Sos_help_centerController@reply_select_2');
	Route::get('sos_help_center/{sos_id}/show_case', 'Sos_help_centerController@show_case_sos');
	Route::resource('data_1669_operating_unit', 'Data_1669_operating_unitController');
	Route::get('sos_help_center/{sos_id}/rate_case', 'Sos_help_centerController@rate_case');
	Route::get('sos_help_center/{sos_id}/give_rate_case', 'Sos_help_centerController@give_rate_case');

	Route::get('all_name_user_partner', 'Sos_help_centerController@all_name_user_partner');
	Route::resource('data_1669_officer_command', 'Data_1669_officer_commandController');
	Route::get('case_officer', 'Sos_help_centerController@case_officer');
	Route::get('officer_edit_form/{sos_id}', 'Sos_help_centerController@officer_edit_form');

    Route::post('command_video_call', 'Agora_4_Controller@refresh_form');

	// ------- CONDO -------
	Route::resource('parcel', 'ParcelController');
	Route::resource('notify_repair', 'Notify_repairController');
	Route::resource('category_condo', 'Category_condoController');

	// sos map title
	Route::resource('sos_map_title', 'Sos_map_titleController')->except(['create','edit','show']);
	Route::get('create_new_title_sos', 'Sos_map_titleController@create_new_title_sos');
	Route::get('delete_title_sos', 'Sos_map_titleController@delete_title_sos');
	Route::get('change_status_title', 'Sos_map_titleController@change_status_title');
	Route::get('add_title_by_user', 'Sos_map_titleController@add_title_by_user');

	// sos map wait delete
	Route::resource('sos_map_wait_delete', 'Sos_map_wait_deleteController');

	// Hospital_office
	Route::resource('hospital_office', 'Hospital_officeController');
	Route::resource('data_1669_officer_hospital', 'Data_1669_officer_hospitalController');
	Route::resource('sos_1669_to_hospital', 'Sos_1669_to_hospitalController');


	// >>>>>> SOS PARTNER V2. <<<<<< //

		Route::get('manage_organization', 'Sos_partnersController@manage_organization');
		Route::get('manage_group_line_organization', 'Sos_partnersController@manage_group_line_organization');
		Route::get('manage_sos_area', 'Sos_partnersController@manage_sos_area');
		Route::get('connect_line_groups/{groupId}', 'Sos_partnersController@connect_line_groups');
		Route::get('categorie_repair_index', 'Sos_partnersController@categorie_repair_index');
		Route::get('categorie_repair_create', 'Sos_partnersController@categorie_repair_create');
		Route::get('categorie_repair_view', 'Sos_partnersController@categorie_repair_view');
		Route::get('view_data_area', 'Sos_partnersController@view_data_area');
		Route::get('draw_area', 'Sos_partnersController@draw_area');

	// >>>>>> END SOS PARTNER V2. <<<<<< //


});
// end admin-partner

// -------- SOS HELP CENTER NO LOGIN ---------
Route::get('sos_help_center/reply_select/{sos_id}', 'Sos_help_centerController@reply_select');
Route::get('officers/switch_standby_login', 'Sos_help_centerController@switch_standby_login');
// Route::get('officers/switch_standby', 'Sos_help_centerController@switch_standby');
Route::get('add_new_officers/{operating_unit_id}', 'Sos_help_centerController@add_new_officers');
Route::get('register_new_officer', 'Sos_help_centerController@register_new_officer');

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
	Route::resource('sos_map', 'Sos_mapController')->except(['index','show']);
	Route::get('sos_insurance_blade', 'Sos_mapController@sos_insurance_blade');
	// Route::get('/sosmap', 'SosController@sosmap');

	Route::get('/check_in_finish', function () {
	    return view('check_in/check_in_finish');
	});

	// -------- CONDO ---------
	Route::get('select_condo', 'Partner_condoController@select_condo');
	Route::get('/data_user_of_condo', 'Partner_condoController@data_user_of_condo');
	Route::resource('notify_repair', 'Notify_repairController')->except(['index','show','edit']);

	// SOS MAP
	Route::get('/sos_map/add_photo/{id_sos_map}', 'Sos_mapController@sos_map_add_photo');
	// SOS MAP REPAIR
	Route::get('sos_map/report_repair_for_user_success/{id_sos_map}', 'Sos_mapController@report_repair_for_user_success');

	// SOS 1669
	Route::get('sos_help_center/{sos_id}/show_user', 'Sos_help_centerController@show_user_sos');
	Route::get('officers/switch_standby', 'Sos_help_centerController@switch_standby');
	Route::get('officers/sum_km_for_officer/{sos_id}', 'Sos_help_centerController@sum_km_for_officer');

	// sos nationalitie
	Route::get('nationalitie_sos/login_register_officer/{group_line_id}', 'Nationalitie_officersController@login_register_officer');
	Route::get('nationalitie_sos/register_officer/{group_line_id}', 'Nationalitie_officersController@register_officer');

	// VOTE KAN
	Route::resource('vote_kan_stations', 'Vote_kan_stationsController');
	Route::resource('vote_kan_scores', 'Vote_kan_scoresController');
	Route::get('vote_kan_admin/show_score', 'Vote_kan_scoresController@show_score');
	Route::resource('vote_kan_data_stations', 'Vote_kan_data_stationsController');
	Route::get('vote_kan_stations_not_registered', 'Vote_kan_data_stationsController@not_registered'); // index
	Route::get('edit_and_summit_form_sos', 'Sos_help_centerController@edit_and_summit_form_sos');
	Route::get('check_withdraw_form_sos', 'Sos_help_centerController@check_withdraw_form_sos');
	Route::get('check_form_sos_pdf/{sos_id}', 'Sos_help_centerController@check_form_sos_pdf');

	// >>>>>> SOS PARTNER V2. <<<<<< //
		Route::get('page_check_area_repair', 'Sos_partnersController@page_check_area_repair');
	// >>>>>> END SOS PARTNER V2. <<<<<< //

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

	// sos map
	Route::get('sos_map/check_tag_sos_log_in/{id_sos_map}/{groupId}', 'Sos_mapController@check_tag_sos_log_in');
	// sos map User
	Route::get('sos_map/user_view_officer_login/{id_sos_map}', 'Sos_mapController@user_view_officer_login');
	Route::get('sos_map/user_view_officer/{id_sos_map}', 'Sos_mapController@user_view_officer');
	Route::get('sos_map/report_repair_for_user/{id_sos_map}', 'Sos_mapController@report_repair_for_user_check_login');


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
Route::get('test_color_img', 'API\ImageController@test_color_img');
Route::get('test_for_dev/type_car_registration', 'test_for_devController@type_car_registration');
Route::get('main_test', 'test_for_devController@main_test');
Route::get('main_test_blade', 'test_for_devController@main_test_blade');
Route::get('reset_count_sos_1669', 'test_for_devController@reset_count_sos_1669');
Route::get('text_sp', 'test_for_devController@text_sp');
Route::get('test_table', 'test_for_devController@test_table');
Route::get('test_create_group_line_by_laravel', 'test_for_devController@test_create_group_line_by_laravel');
Route::get('test_send_many_bubble', 'test_for_devController@test_send_many_bubble');
Route::get('test_send_many_bubble_2', 'test_for_devController@test_send_many_bubble_2');
Route::get('/Places_Search_Box', function () {
    return view('/test_for_dev/Places_Search_Box');
});

Route::get('/modal_loading', function () {
    return view('layouts/modal_loading');
});

Route::resource('partner_premium', 'Partner_premiumController');

Route::resource('sub_organization', 'Sub_organizationController');
Route::resource('sos_1669_form_yellow', 'Sos_1669_form_yellowController');
Route::resource('data_1669_operating_officer', 'Data_1669_operating_officerController');

Route::get('index_send_mail_proposal', 'test_for_devController@index_send_mail_proposal');
Route::get('send_mail_proposal', 'test_for_devController@send_mail_proposal');

Route::resource('province_th.json', 'Province_th.jsonController');
Route::resource('province_th', 'Province_thController');
Route::resource('sos_1669_province_code', 'Sos_1669_province_codeController');


Route::get('officer_form_yellow/{sos_id}', 'Sos_help_centerController@sos_help_officer_yellow');



// SOS V.2 + ViiFIX
Route::resource('maintain_notified_users', 'Maintain_notified_usersController');
Route::resource('partner_officers', 'Partner_officersController');
Route::resource('maintain_notis', 'Maintain_notisController');
Route::resource('maintain_categorys', 'Maintain_categorysController');
Route::resource('maintain_sub_categorys', 'Maintain_sub_categorysController');
Route::resource('maintain_device_codes', 'Maintain_device_codesController');
Route::resource('maintain_materials', 'Maintain_materialsController');
Route::resource('maintain_use_materials', 'Maintain_use_materialsController');
Route::get('maintain_notis_rating/{maintain_id}', 'Maintain_notisController@maintain_notis_rating');
Route::get('command_maintain', 'Maintain_notisController@command_maintain');
Route::post('/maintain_officer_Store/{id}', 'Maintain_notisController@Maintain_officer_Store'); //by junior dear
Route::get('/mockup_video_call', function () {
    return view('nationalitie_sos/mockup_video_call');
});

Route::get('/dashboard_viifix', 'MaintainDashboardController@dashboard_viifix_index'); //by junior dear
Route::get('/dashboard_all_repair', 'MaintainDashboardController@fix_all'); //by junior dear
Route::get('/dashboard_all_repair_fastest', 'MaintainDashboardController@fix_fastest'); //by junior dear
Route::get('/dashboard_all_used_repair', 'MaintainDashboardController@fix_used'); //by junior dear

Route::get('/viifix_repair_quality/index', 'Maintain_notisController@viifix_repair_quality_index'); //by junior dear
Route::get('/viifix_repair_quality/view/{officer_id}', 'Maintain_notisController@viifix_repair_quality_view'); //by junior dear

Route::get('/demo_detail_repair_quality', function () {
    return view('test_repair_admin/demo_detail_repair_quality');
});

// Route::get('user_video_call/sos_help_center', function () {
//     return view('sos_help_center/user_video_call');
// });

////////////////////////////
//////// Agora Chat ////////
////////////////////////////
Route::group(['middleware' => ['auth']], function () {

    // Video_call_4 //
    Route::get('video_call_4/before_video_call_4', 'Agora_4_Controller@before_video_call_4'); // index
	Route::get('pc_video_call/{type}/{sos_id}', 'Agora_4_Controller@pc_index'); // index
    Route::get('mobile_video_call/{type}/{sos_id}', 'Agora_4_Controller@mobile_index'); // index
    Route::get('after_video_call', 'Agora_4_Controller@after_video_call'); // index
    //type จะมี 1.sos_1669 2.sos_map 3.consult_doctor
	// Route::post('/agora/call-user', 'AgoraController@callUser'); // ไม่ทราบ
	// END Video_call_4 //

	// SOS 1669 //
    Route::get('user_video_call/sos_help_center', 'AgoraController@index'); // index
    Route::get('user_video_call/sos_help_center_2', 'AgoraController@index_2'); // index
    Route::post('/agora/call-user', 'AgoraController@callUser'); // ไม่ทราบ

    Route::get('/command_video_test', 'Agora_4_Controller@command_video_call');
    // END SOS 1669 //

	// SOS COMPANY //
    Route::get('video_call/sos_map', 'AgoraController@index_sos_map');
	// END SOS COMPANY //
Route::resource('problem_report', 'Problem_reportController')->except(['show','edit']);;

Route::resource('privilege', 'PrivilegeController');
Route::get('show_privilege_partner', 'PrivilegeController@seach_partner');
Route::resource('redeem_code', 'Redeem_codeController');
});

Route::resource('agora_chat', 'Agora_chatController');

Route::resource('sos_1669_officer_ask_more', 'Sos_1669_officer_ask_moreController');

Route::get('/layout_video_call', function () {
    return view('layout_video_call_test');
});


// VOTE KAN
Route::get('/show_score_public', 'Vote_kan_scoresController@show_score_public');

Route::resource('phone_niems', 'Phone_niemsController');
Route::resource('polygon_amphoe_th', 'Polygon_amphoe_thController');

Route::resource('sos_by_organization', 'Sos_by_organizationController');

//demo
Route::get('/demo/maintain_index', function () {
    return view('demo/maintain_index');
});
Route::get('/demo/maintain_form', function () {
    return view('demo/maintain_form');
});
Route::get('/demo/maintain_show', function () {
    return view('demo/maintain_show');
});
Route::get('/demo/maintain_rating', function () {
    return view('demo/maintain_rating');
});
Route::get('/demo/set_group_line', function () {
    return view('demo/set_group_line');
});
Route::get('/demo/register_organization', function () {
    return view('demo/register_organization');
});

// Route::resource('sos_partners', 'Sos_partnersController');
Route::resource('sos_partner_areas', 'Sos_partner_areasController');
Route::resource('sos_partner_officers', 'Sos_partner_officersController');
Route::get('sos_partner_officers/create', 'Sos_partner_officersController@add_new_officers_sos'); // สำหรับลงทะเบียนเจ้าหน้าที่ by junior dear
Route::get('register_new_officer_sos', 'Sos_partner_officersController@register_new_officer_sos'); // สำหรับลงทะเบียนเจ้าหน้าที่ by junior dear
Route::get('register_new_officer_qr_code', 'Sos_partner_officersController@register_new_officer_qr_code'); // สำหรับลงทะเบียนเจ้าหน้าที่ by junior dear

