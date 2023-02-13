<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/lineapi', 'API\LineApiController@store');
Route::get('/sos_helper_Charlie/{id_sos}/{id_user}', 'API\LineApiController@sos_helper_Charlie');
Route::get('/Charlie_help_complete/{id_sos}/{id_user}', 'API\LineApiController@Charlie_help_complete');

Route::post('/lineapi/condo', 'API\Condo_LineApiController@store');

Route::post('/juristic', 'API\JuristicController@juristic');
Route::post('/edit_data_organization', 'API\JuristicController@edit_data_organization');
Route::get('/selest_organization/{selest_organization}', 'API\JuristicController@selest_organization');
Route::get('/all_partners', 'API\JuristicController@all_partners');

Route::get('/car_brand','API\CarbrandController@getBrand');
Route::get('/car_brand/{car_brand}/car_model','API\CarbrandController@getModel');

Route::get('/motor_brand','API\CarbrandController@getMotorBrand');
Route::get('/motor_brand/{motor_brand}/motor_model','API\CarbrandController@getMotorModel');

Route::get('/check_register_car/{registration_number}/{province}/check_register_car','API\CarbrandController@check_register_car');

Route::get('/add_reg_id/{registration}/{province}','API\CarbrandController@add_reg_id');

Route::get('/phone_insurance/{name_insurance}/name_insurance','API\CarbrandController@phone_insurance');

Route::get('/check_registration/{registration}','API\CarbrandController@check_registration');
Route::get('/check_registration/{registration}/province','API\CarbrandController@check_province');
Route::get('/check_time/{registration}/{county}/{user_id}','API\CarbrandController@check_time');

Route::get('/carbrand','API\SellcarController@CarBrand');
Route::get('/carbrand/{brand}/carmodel','API\SellcarController@CarModel');

Route::get('/location/{lat}/{lng}/province','API\LocationController@search_location');
Route::get('/location/{lat}/{lng}/check_news','API\LocationController@check_news');

Route::get('/location/show_location_P','API\LocationController@show_location_P');
Route::get('/location/{location_P}/show_location_A','API\LocationController@show_location_A');
Route::get('/location/{location_P}/{location_A}/show_location_T','API\LocationController@show_location_T');
Route::get('/zoom_map/{province}/{amphoe}/{district}','API\LocationController@zoom_map');

Route::get('/change_country/{user_id}','API\LocationController@change_country');
Route::get('/user_language/{language}/{user_id}','API\LocationController@user_language');

Route::get('/check_sos_country/{user_id}','API\LocationController@check_sos_country');

Route::get('/show_sos_area/{countryCode}','API\LocationController@show_sos_area');

Route::get('/check_user/{id_user}','API\PartnersController@check_user');
Route::get('/put_email/{put_email}/{id_user}/{put_username}','API\PartnersController@put_email');
Route::get('/check_username/{put_username}/{id_user}','API\PartnersController@check_username');
Route::get('/check_email/{put_email}','API\PartnersController@check_email');
Route::get('/check_data_partner/{user_organization}','API\PartnersController@check_data_partner');
Route::get('/check_data_partner_premium/{user_organization}','API\PartnersController@check_data_partner_premium');
Route::get('/all_group_line/{user_organization}','API\PartnersController@all_group_line');
Route::get('/check_data_line_group/{group_line_id}','API\PartnersController@check_data_line_group');

Route::get('/explode_name/{name_user}', 'ProfileController@explode_name');


Route::get('/check_add_line/{id_user}','API\LineApiController@check_add_line');
Route::get('/update_add_line/{id_user}','API\LineApiController@update_add_line');

Route::get('/select_car_brand_user','API\CarbrandController@select_car_brand_user');
Route::get('/select_car_brand_user/{car_brand}/model','API\CarbrandController@select_car_model_user');

Route::get('/select_motor_brand_user','API\CarbrandController@select_motor_brand_user');
Route::get('/select_motor_brand_user/{motor_brand}/model','API\CarbrandController@select_motor_model_user');

//////////////////////
//////BROADCAST//////
/////////////////////
Route::get('/check_content','API\CarbrandController@check_content');
// car
Route::post('/search_data_broadcast_by_car','API\CarbrandController@search_data_broadcast_by_car');
Route::get('/search_data_selected_car/{car_id}','API\CarbrandController@search_data_selected_car');
Route::post('/send_content_BC_by_car','API\CarbrandController@send_content_BC_by_car');
// check in
Route::post('/search_data_broadcast_by_check_in','API\API_Broadcast@search_data_broadcast_by_check_in');
Route::post('/send_content_BC_by_check_in','API\API_Broadcast@send_content_BC_by_check_in');

///////////////////////////
////// END BROADCAST//////
//////////////////////////


// ยี่ห้อจากราคากลาง
Route::get('/brand_middle_price','API\Brand_middle_price_carsController@getBrand');
Route::get('/brand_middle_price/{car_brand}/model','API\Brand_middle_price_carsController@getModel');

Route::get('/motor_middle_price','API\Brand_middle_price_carsController@getMotorBrand');
Route::get('/motor_middle_price/{motor_brand}/model','API\Brand_middle_price_carsController@getMotorModel');

// OCR
Route::post('/search_reg_ocr','API\GoogleCloudVision@search_registration_ocr');
Route::post('/search_reg_ocr_motor','API\GoogleCloudVision@search_registration_ocr_motor');

// cancel_Profile
Route::get('/confirm_cancel/{id_user}/{reason}/{reason_other}/{amend}/profile','ProfileController@cancel_Profile');
// welcome_home
Route::get('/welcome_home/{status_id}/profile','ProfileController@welcome_home');


Route::post('/save_sos_insurance', 'API\Save_sos_insuranceController@Save_sos');
Route::get('/select_sos_insurance/{name_insurance}/select_insurance', 'API\Save_sos_insuranceController@select_sos_insurance');

Route::get('/insurance_select_line_group/{name_line_group}/{company}', 'API\API_line_group@save_line_group_insurance');
Route::get('/partner_viicheck_select_line_group/{name_line_group}/{name_partner}', 'API\API_line_group@save_line_group_partner_viicheck');

Route::get('/set_group_line/{group_id}/{language}/{time_zone}/{input_name_group_line}', 'API\API_line_group@set_group_line');

Route::get('/change_language/{language}/{user_id}', 'API\API_language@change_language');
Route::get('/change_language_fromline/{language}/{user_id}', 'API\API_language@change_language_fromline');

Route::get('/add_text_topic/{text_th}', 'API\API_language@add_text_topic');

Route::get('/send_sos_area/{area_arr}/{name_partner}/{name_area}', 'API\PartnersController@sos_area');
Route::get('/area_pending/{name_partner}/{name_area}', 'API\PartnersController@area_pending');
Route::get('/area_current/{name_partner}/{name_area}', 'API\PartnersController@area_current');
Route::get('/send_pass_area/{line_group}/{num_pass_area}', 'API\PartnersController@send_pass_area');
Route::get('/submit_group_line/{line_group}/{id_partner}', 'API\PartnersController@submit_group_line');
Route::get('/search_time_zone', 'API\PartnersController@search_time_zone');

Route::get('/show_amphoe/{province}', 'API\LocationController@amphoe_search');
Route::get('/show_district/{amphoe}', 'API\LocationController@district_search');
Route::get('/zoom_district/{district}', 'API\LocationController@zoom_district');

Route::get('/view_marker/{name_partner}', 'API\LocationController@view_marker');

Route::get('/check_new_sos_area', 'API\PartnersController@check_new_sos_area');

Route::get('/approve_area/{input_new_area}/{id}', 'API\PartnersController@approve_area');
Route::get('/disapproved_area/{id}/{answer_reason}/{reason_other}', 'API\PartnersController@disapproved_area');
Route::get('/input_data_partner/{name_partner}', 'API\PartnersController@input_data_partner');

Route::get('/change_color_navbar/{color_navbar}/{name_partner}', 'API\PartnersController@change_color_navbar');
Route::get('/change_color_menu/{color_navbar}/{name_partner}/{class_color_menu}', 'API\PartnersController@change_color_menu');

Route::get('/input_pls_input_phone/{phone}/{user_id}','API\SosmapController@input_pls_input_phone');
Route::post('/sos_input_input_phone','API\SosmapController@sos_input_input_phone');
Route::get('/sos_map/all_area','API\SosmapController@all_area');
Route::get('/sos_map/area_condo_id/{condo_id}','API\SosmapController@area_condo_id');
Route::get('/submit_score/{sos_map_id}/{score_1}/{score_2}/{total_score}/{comment_help}', 'API\SosmapController@submit_score');
Route::post('/submit_add_photo', 'API\SosmapController@submit_add_photo');

Route::get('/service_area/area_other/{id_user}/{name_area}','API\PartnersController@area_other');
Route::get('/service_area/area_partner_other/{id_user}/{name_area}','API\PartnersController@area_partner_other');
Route::get('/service_area/check_area_other/{id_partnet}','API\PartnersController@check_area_other');
Route::get('/service_area/your_old_area/{id_user}/{name_area}','API\PartnersController@your_old_area');

Route::get('/cancel_membership/{user_id}','Manage_userController@cancel_membership');

Route::get('/all_sos_area','API\PartnersController@all_sos_area');
Route::get('/all_area_partner/{name_partner}','API\PartnersController@all_area_partner');
Route::get('/search_data_sos_js100/{name}/{phone}','API\PartnersController@search_data_sos_js100');
Route::get('/check_new_sos_js100_by_theme','API\PartnersController@check_new_sos_js100_by_theme');
Route::get('/check_new_sos_js100','API\PartnersController@check_new_sos_js100');
Route::get('/check_notified_js100','API\PartnersController@check_notified_js100');
Route::get('/update_new_sos_js100/{is_sos_map}','API\PartnersController@update_new_sos_js100');
Route::get('/admin_click/{all_or_id}','API\PartnersController@admin_click');

Route::get('/check_sos_alarm/{check_name_partner}','API\PartnersController@check_sos_alarm');
Route::get('/check_sos_alarm/notify/{check_name_partner}','API\PartnersController@check_sos_alarm_notify');

Route::get('/search_std/{student_id_covid}/{check_in_at}/{name_area}','API\PartnersController@search_std');
Route::get('/search_name/{student_name_covid}/{check_in_at}/{name_area}','API\PartnersController@search_name');
Route::get('/show_group_risk/{id}/{check_in_at}/{name_area}/{name_disease}','API\PartnersController@show_group_risk');
Route::post('/send_risk_group', 'API\PartnersController@send_risk_group');


Route::post('/save_img_url', 'API\ImageController@save_img_url');
Route::post('/create_img_check_in', 'API\ImageController@create_img_check_in');
Route::post('/admin_create_img_check_in', 'API\ImageController@admin_create_img_check_in');

Route::get('/search_nationalitie', 'API\API_language@search_nationalitie');
Route::get('/update_user_nationalitie/{nationality}/{user_id}', 'API\API_language@update_user_nationalitie');

Route::get('/submit_show_homepage/{partner_id}/{input_show_homepage}', 'API\PartnersController@submit_show_homepage');

Route::get('/clear_area/{name_partner}/{name_area}', 'API\PartnersController@clear_area');
Route::get('/clear_area_new/{name_partner}/{name_area}', 'API\PartnersController@clear_area_new');
Route::get('/delete_area/{id}', 'API\PartnersController@delete_area');

Route::get('/show_logo_partner', 'API\PartnersController@show_logo_partner');


// API TU
Route::post('/api_data_tu_greats', 'API\API_TU_Greats@api_data_tu_greats');

// condo
Route::get('/select_appointment_time/{appointment_date}/{condo_id}', 'Notify_repairController@select_appointment_time');
Route::get('/send_pass_condo/{line_group}/{num_pass_area}', 'API\PartnersController@send_pass_condo');
Route::get('/update_data_groupline/{id_groupline}/{system}', 'API\PartnersController@update_data_groupline');
Route::get('/notify_repair_annotation/{id}/{annotation}', 'Notify_repairController@notify_repair_annotation');

// API User login line
Route::get('/register_api', 'Auth\LoginController@register_api');

// SOS HELP CENTER
Route::get('/data_help_center/','Sos_help_centerController@search_data_help_center');
Route::get('/create_new_sos_help_center/{user_id}', 'Sos_help_centerController@create_new_sos_help_center');
Route::post('/send_save_data/form_yellow', 'Sos_help_centerController@save_form_yellow');
Route::get('/get_location_operating_unit/{lat}/{lng}/{level}', 'Sos_help_centerController@get_location_operating_unit');
Route::get('/send_data_sos_to_operating_unit/{sos_id}/{operating_unit_id}/{user_id}/{distance}', 'Sos_help_centerController@send_data_sos_to_operating_unit');
Route::get('/check_status_wait_operating_unit/{sos_id}', 'Sos_help_centerController@check_status_wait_operating_unit');
Route::get('/get_current_officer_location/{sos_id}', 'Sos_help_centerController@get_current_officer_location');
Route::get('/update_location_officer/{sos_id}/{lat}/{lng}', 'Sos_help_centerController@update_location_officer');
Route::get('/update_status_officer/{status}/{sos_id}/{reason}', 'Sos_help_centerController@update_status_officer');
Route::get('/update_status_officer_Standby/{status}/{officer_id}/{lat}/{lng}', 'Sos_help_centerController@update_status_officer_Standby');
Route::get('/update_event_level_rc/{level}/{sos_id}', 'Sos_help_centerController@update_event_level_rc');
Route::get('/update_officer_to_the_operating_base/{sos_id}', 'Sos_help_centerController@update_officer_to_the_operating_base');
Route::get('/add_photo_sos_by_officers', 'Sos_help_centerController@add_photo_sos_by_officers');


