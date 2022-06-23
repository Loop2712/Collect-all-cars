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
Route::post('/lineapi/condo', 'API\Condo_LineApiController@store');


Route::post('/juristic', 'API\JuristicController@juristic');
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

Route::get('/change_country/{user_id}','API\LocationController@change_country');
Route::get('/user_language/{language}/{user_id}','API\LocationController@user_language');

Route::get('/check_sos_country/{user_id}','API\LocationController@check_sos_country');

Route::get('/show_sos_area/{countryCode}','API\LocationController@show_sos_area');

Route::get('/check_user/{id_user}','API\PartnersController@check_user');
Route::get('/put_email/{put_email}/{id_user}/{put_username}','API\PartnersController@put_email');
Route::get('/check_username/{put_username}/{id_user}','API\PartnersController@check_username');
Route::get('/check_email/{put_email}','API\PartnersController@check_email');
Route::get('/check_data_partner/{user_organization}','API\PartnersController@check_data_partner');
Route::get('/all_group_line/{user_organization}','API\PartnersController@all_group_line');
Route::get('/check_data_line_group/{group_line_id}','API\PartnersController@check_data_line_group');

Route::get('/explode_name/{name_user}', 'ProfileController@explode_name');

Route::get('/check_add_line/{id_user}','API\LineApiController@check_add_line');

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

Route::get('/sos_map/all_area','API\SosmapController@all_area');
Route::get('/sos_map/area_condo_id/{condo_id}','API\SosmapController@area_condo_id');
Route::get('/submit_score/{sos_map_id}/{score_1}/{score_2}/{total_score}/{comment_help}', 'API\SosmapController@submit_score');
Route::get('/service_area/area_other/{id_user}/{name_area}','API\PartnersController@area_other');
Route::get('/service_area/area_partner_other/{id_user}/{name_area}','API\PartnersController@area_partner_other');
Route::get('/service_area/check_area_other/{id_partnet}','API\PartnersController@check_area_other');
Route::get('/service_area/your_old_area/{id_user}/{name_area}','API\PartnersController@your_old_area');

Route::get('/all_sos_area','API\PartnersController@all_sos_area');
Route::get('/all_area_partner/{name_partner}','API\PartnersController@all_area_partner');

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











