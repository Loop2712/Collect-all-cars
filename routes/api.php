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

Route::post('/juristic', 'API\JuristicController@juristic');

Route::post('/lineapi', 'API\LineApiController@store');

Route::get('/car_brand','API\CarbrandController@getBrand');
Route::get('/car_brand/{car_brand}/car_model','API\CarbrandController@getModel');

Route::get('/motor_brand','API\CarbrandController@getMotorBrand');
Route::get('/motor_brand/{motor_brand}/motor_model','API\CarbrandController@getMotorModel');

Route::get('/check_register_car/{registration_number}/{province}/check_register_car','API\CarbrandController@check_register_car');

Route::get('/add_reg_id/{registration}/{province}','API\CarbrandController@add_reg_id');

Route::get('/check_registration/{registration}','API\CarbrandController@check_registration');
Route::get('/check_registration/{registration}/province','API\CarbrandController@check_province');
Route::get('/check_time/{registration}/{county}/{user_id}','API\CarbrandController@check_time');

Route::get('/carbrand','API\SellcarController@CarBrand');
Route::get('/carbrand/{brand}/carmodel','API\SellcarController@CarModel');

Route::get('/location/{lat}/{lng}/province','API\LocationController@search_location');
Route::get('/location/{lat}/{lng}/check_news','API\LocationController@check_news');

Route::get('/location/show_location_P','API\LocationController@show_location_P');
Route::get('/location/{location_P}/show_location_A','API\LocationController@show_location_A');


Route::get('/check_user/{id_user}','API\PartnersController@check_user');
Route::get('/put_email/{put_email}/{id_user}/{put_username}','API\PartnersController@put_email');
Route::get('/check_username/{put_username}/{id_user}','API\PartnersController@check_username');
Route::get('/check_email/{put_email}','API\PartnersController@check_email');

Route::get('/explode_name/{name_user}', 'ProfileController@explode_name');

// ยี่ห้อจากราคากลาง
Route::get('/brand_middle_price','API\Brand_middle_price_carsController@getBrand');
Route::get('/brand_middle_price/{car_brand}/model','API\Brand_middle_price_carsController@getModel');

Route::get('/motor_middle_price','API\Brand_middle_price_carsController@getMotorBrand');
Route::get('/motor_middle_price/{motor_brand}/model','API\Brand_middle_price_carsController@getMotorModel');

// OCR
Route::get('/ocr_capture/{img}','API\OcrController@ocr_capture');





