<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Models\Check_in;
use App\Models\Partner;
use \Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Partner_premium;
use App\Models\Mylog;
use App\Models\Ads_content;

class API_Broadcast extends Controller
{
    function search_data_broadcast_by_check_in(Request $request){

        $requestData = $request->all();
        
        $date_now = date('Y-m-d');

        $arr_select_user = [] ;

        $partner_id = $requestData['partner_id'];

        $data_partners = Partner::where('id' , $partner_id)->first();
        $name_partner = $data_partners->name ;

        $id_name_area = $requestData['id_name_area'];

        $time_1 = $requestData['time_1'] ; // เช็คข้อมูลจากช่องนี้
        $time_2 = $requestData['time_2'] ;
        if ( !empty($time_1) && empty($time_2) ) {
            $time_2 = '23:59' ;
        }else{
            $time_2 = $time_2 ;
        }

        $select_day = $requestData['select_day'] ; // เช็คข้อมูลจากช่องนี้
        $amount_in_out = $requestData['amount_in_out'] ; // เช็คข้อมูลจากช่องนี้
        $amount_last_entry = $requestData['amount_last_entry'] ; // เช็คข้อมูลจากช่องนี้

        // data user
        $this_month = $requestData['this_month'] ; // เช็คข้อมูลจากช่องนี้
        $check_click_user = $requestData['check_click_user'] ; // เช็คข้อมูลจากช่องนี้
        $select_user_sex = $requestData['select_user_sex'] ;
        $select_user_age = $requestData['select_user_age'] ;
        $select_user_location = $requestData['select_user_location'] ;

        // พื้นที่ทั้งหมด
        if (empty($id_name_area)) {
            
            // ทุกอย่างว่างทั้งหมด
            if ( empty($time_1) && empty($select_day) && empty($amount_in_out) && empty($amount_last_entry) && empty($this_month) && empty($check_click_user) ) {

                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->groupBy('check_ins.user_id')
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // ช่วงเวลา
            if (!empty($time_1)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->whereTime('check_ins.created_at', '>=', $time_1)
                    ->whereTime('check_ins.created_at', '<=', $time_2)
                    ->groupBy('check_ins.user_id')
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // วัน (จันทร์ - อาทิตย์)
            if (!empty($select_day)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->select('users.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $date = Carbon::parse( $data->created_at , 'UTC+7');
                    $name_day = $date->isoFormat('dddd'); 

                    if ($name_day == $select_day) {

                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // จำนวนการเข้าพื้นที่ มากกว่า .. ครั้ง
            if (!empty($amount_in_out)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->selectRaw('users.* , count(check_ins.user_id) as count' )
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->where('check_ins.time_in' , '!=' , null)
                    ->groupBy('check_ins.user_id')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    if ($data->count >= $amount_in_out) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // เข้า-ออก ล่าสุด .. วัน
            if (!empty($amount_last_entry)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->select('users.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $intTotalDay = ((strtotime($date_now) - strtotime($data->created_at))/  ( 60 * 60 * 24 )) + 1 ;
                    $day_ago = number_format($intTotalDay) ;;

                    if ((int)$amount_last_entry >= (int)$day_ago) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // ผู้ใช้ที่เกิดเดือนนี้
            if ($this_month) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->where('users.type' , 'LIKE' , 'line')
                    ->whereMonth('users.brith' , date('m'))
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // ข้อมูลผู้ใช้
            if ($check_click_user) {
                $data_all_check_partner = "" ;

                switch ($select_user_age) {
                    case '<20':
                        $range_1 = "0" ;
                        $range_2 = "20" ;
                        break;
                    case '21-29':
                        $range_1 = "21" ;
                        $range_2 = "29" ;
                        break;
                    case '30-45':
                        $range_1 = "30" ;
                        $range_2 = "45" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '60+':
                        $range_1 = "60" ;
                        $range_2 = "100" ;
                        break;
                    
                    default:
                        $range_1 = "" ;
                        $range_2 = "" ;
                        break;
                }

                $age_range_1 = date("Y" , strtotime("-$range_1 Year") );
                $age_range_2 = date("Y" , strtotime("-$range_2 Year") );

                // ว่างหมด
                if ( empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ) {
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->groupBy('check_ins.user_id')
                        ->select('users.*')
                        ->get();

                    foreach ($data_all_check_partner as $data) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
                // กรอง 1
                else if( !empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                // กรอง 2 
                else if( !empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->select('users.*')
                        ->get();
                }else if( !empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                // กรอง 3
                else if( !empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }
                
        }
        // พื้นที่เฉพาะพื้นที่ย่อย
        else{

            // ทุกอย่างว่างทั้งหมด
            if ( empty($time_1) && empty($select_day) && empty($amount_in_out) && empty($amount_last_entry) && empty($this_month) && empty($check_click_user) ) {

                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->groupBy('check_ins.user_id')
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // ช่วงเวลา
            if (!empty($time_1)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->whereTime('check_ins.created_at', '>=', $time_1)
                    ->whereTime('check_ins.created_at', '<=', $time_2)
                    ->groupBy('check_ins.user_id')
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // วัน (จันทร์ - อาทิตย์)
            if (!empty($select_day)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->select('users.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $date = Carbon::parse( $data->created_at , 'UTC+7');
                    $name_day = $date->isoFormat('dddd'); 

                    if ($name_day == $select_day) {

                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // จำนวนการเข้าพื้นที่ มากกว่า .. ครั้ง
            if (!empty($amount_in_out)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->selectRaw('users.* , count(check_ins.user_id) as count' )
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->where('check_ins.time_in' , '!=' , null)
                    ->groupBy('check_ins.user_id')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    if ($data->count >= $amount_in_out) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // เข้า-ออก ล่าสุด .. วัน
            if (!empty($amount_last_entry)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->select('users.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $intTotalDay = ((strtotime($date_now) - strtotime($data->created_at))/  ( 60 * 60 * 24 )) + 1 ;
                    $day_ago = number_format($intTotalDay) ;;

                    if ((int)$amount_last_entry >= (int)$day_ago) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
            }

            // ผู้ใช้ที่เกิดเดือนนี้
            if ($this_month) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('users.type' , 'LIKE' , 'line')
                    ->whereMonth('users.brith' , date('m'))
                    ->select('users.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

            // ข้อมูลผู้ใช้
            if ($check_click_user) {
                $data_all_check_partner = "" ;

                switch ($select_user_age) {
                    case '<20':
                        $range_1 = "0" ;
                        $range_2 = "20" ;
                        break;
                    case '21-29':
                        $range_1 = "21" ;
                        $range_2 = "29" ;
                        break;
                    case '30-45':
                        $range_1 = "30" ;
                        $range_2 = "45" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '60+':
                        $range_1 = "60" ;
                        $range_2 = "100" ;
                        break;
                    
                    default:
                        $range_1 = "" ;
                        $range_2 = "" ;
                        break;
                }

                $age_range_1 = date("Y" , strtotime("-$range_1 Year") );
                $age_range_2 = date("Y" , strtotime("-$range_2 Year") );

                // ว่างหมด
                if ( empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ) {
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->groupBy('check_ins.user_id')
                        ->select('users.*')
                        ->get();

                    foreach ($data_all_check_partner as $data) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->brith ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
                // กรอง 1
                else if( !empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                // กรอง 2 
                else if( !empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->select('users.*')
                        ->get();
                }else if( !empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                // กรอง 3
                else if( !empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('users', 'check_ins.user_id', '=', 'users.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('users.type' , 'LIKE' , 'line')
                        ->where('users.sex' , $select_user_sex)
                        ->whereYear('users.brith' , "<=" , $age_range_1)
                        ->whereYear('users.brith' , ">=" , $age_range_2)
                        ->where('users.changwat_th' , $select_user_location)
                        ->select('users.*')
                        ->get();
                }
                

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->brith ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }
            }

        }
        
        return $arr_select_user ;

    }

    function send_content_BC_by_check_in(Request $request)
    {
        $requestData = $request->all();

        // echo "<pre>" ;
        // print_r($requestData);
        // echo "<pre>" ;
        // exit();

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        if (!empty($arr_user_id)) {
            // เช็คว่าเป็น Content ใหม่หรือเก่า
            if ($requestData['send_again'] == "Yes") { // Content เก่า

                $data_Ads_content = Ads_content::where('id' , $requestData['id_ads'] )->first();
                $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

                $requestData['photo'] = $data_Ads_content->photo ;

                $BC_by_check_in_sent = $data_partner_premium->BC_by_check_in_sent ;
                $sum_BC_by_check_in_sent = $BC_by_check_in_sent + $requestData['amount'] ;
                $sum_send_round = $data_Ads_content->send_round + 1 ;

                
                DB::table('partner_premia')
                    ->where('id_partner', $requestData['id_partner'])
                    ->update([
                        'BC_by_check_in_sent' => $sum_BC_by_check_in_sent ,
                ]);

                DB::table('ads_contents')
                    ->where('id', $requestData['id_ads'])
                    ->update([
                        'send_round' => $sum_send_round ,
                ]);

                $requestData['link'] = $data_Ads_content->link ;

                // ส่ง content เข้าไลน์
                $this->send_content_BC_to_line($requestData , $data_Ads_content);

            }else{ // Content ใหม่

                if ($request->hasFile('photo')) {
                    $requestData['photo'] = $request->file('photo')->store('uploads', 'public');
                }

                Ads_content::create($requestData);

                $data_Ads_content = Ads_content::latest()->first();
                $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

                $BC_by_check_in_sent = $data_partner_premium->BC_by_check_in_sent ;
                $sum_BC_by_check_in_sent = $BC_by_check_in_sent + $requestData['amount'] ;
                $sum_send_round = $data_Ads_content->send_round + 1 ;

                DB::table('partner_premia')
                    ->where('id_partner', $requestData['id_partner'])
                    ->update([
                        'BC_by_check_in_sent' => $sum_BC_by_check_in_sent ,
                ]);

                DB::table('ads_contents')
                    ->where('id', $data_Ads_content->id)
                    ->update([
                        'link' => "https://www.viicheck.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id,
                        'send_round' => $sum_send_round ,
                ]);

                $requestData['link'] = "https://www.viicheck.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id;

                // ส่ง content เข้าไลน์
                $this->send_content_BC_to_line($requestData , $data_Ads_content);

            }
        }


        return redirect('/broadcast/broadcast_by_check_in')->with('flash_message', 'Partner updated!');

    }

    // -------------- send content LINE -------------------------

    function send_content_BC_to_line($requestData , $data_Ads_content){

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        $show_user = [] ;
        if (!empty($data_Ads_content->show_user)) {
            $show_user = json_decode($data_Ads_content->show_user) ;
        }

        $img = 'https://www.viicheck.com/storage/' . $requestData['photo'];
        $img_content = Image::make( $img );

        $img_content_w = $img_content->width();
        $img_content_h = $img_content->height();

        // ส่ง content
        if (!empty($arr_user_id)) {
            for ($xi=0; $xi < count($arr_user_id); $xi++) { 

                $data_user = User::where('id' , $arr_user_id[$xi])->first();

                $template_path = storage_path('../public/json/flex-broadcast.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ตัวอย่าง",$requestData['name_content'],$string_json);
                $string_json = str_replace("TEXT_W",$img_content_w,$string_json);
                $string_json = str_replace("TEXT_H",$img_content_h,$string_json);
                $string_json = str_replace("PHOTO_BC",$requestData['photo'],$string_json);
                $string_json = str_replace("TEXT_URL",$requestData['link'] . "&user_id=" . $arr_user_id[$xi] ,$string_json);

                $messages = [ json_decode($string_json, true) ];

                $body = [
                    "to" => $data_user->provider_id,
                    "messages" => $messages,
                ];

                // flex ask_for_help
                $opts = [
                    'http' =>[
                        'method'  => 'POST',
                        'header'  => "Content-Type: application/json \r\n".
                                    'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                        'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                        //'timeout' => 60
                    ]
                ];
                                    
                $context  = stream_context_create($opts);
                $url = "https://api.line.me/v2/bot/message/push";
                $result = file_get_contents($url, false, $context);

                // SAVE LOG
                $data = [
                    "title" => "BC_by_check_in" ,
                    "content" => "TO >> user_id = " . $arr_user_id[$xi],
                ];
                MyLog::create($data);

                // update show_user in ads_contents
                array_push($show_user, $arr_user_id[$xi]);

                DB::table('ads_contents')
                    ->where('id', $data_Ads_content->id)
                    ->update([
                        'show_user' => $show_user ,
                ]);

            }
        }
        

        return "send done all" ;

    }

}
