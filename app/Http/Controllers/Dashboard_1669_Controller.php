<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
Use Carbon\Carbon;
use PDF;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Data_1669_officer_command;
use App\Models\Data_1669_operating_officer;
use App\Models\Data_1669_operating_unit;
use App\Models\Sos_help_center;

class Dashboard_1669_Controller extends Controller
{
    function dashboard_index_1669(Request $request)
    {
        $user_login = Auth::user();
        $data_command_user = Data_1669_officer_command::where('user_id' , $user_login->id)->first();

        //==================================================================================================================//
                                                        //  ข้อมูลเจ้าหน้าที่
        //==================================================================================================================//

        // นับ USER ในสพฉ
        $data_command = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)
            ->orderBy('id','DESC')
            ->limit(5)
            ->get();

        // นับคนที่ พร้อมช่วยเหลือ
        $count_Standby = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)->where('status', 'Standby')->count();
        // นับคนที่ กำลังช่วยเหลือ
        $count_Helping = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)->where('status', 'Helping')->count();
        // นับคนที่ ไม่พร้อมช่วยเหลือ
        $count_notReady = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)->where('status', null)->count();


        // ลำดับการรับแจ้งเตือน 5 อันดับ
        $noti_1669_data = User::join('data_1669_officer_commands', 'users.id', '=', 'data_1669_officer_commands.user_id')
            ->select('users.*', 'data_1669_officer_commands.*')
            ->where('users.organization', '=', 'สพฉ')
            ->where('users.sub_organization', '=', $user_login->sub_organization)
            ->orderBy('number','ASC')
            ->limit(5)
            ->get();


        // การสั่งการมากที่สุด 5 อันดับ
        $command_1669_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('operating_unit_id' , "!=" , null)
        ->select('sos_help_centers.*', DB::raw('COUNT(*) as count_command_by'))
        ->groupBy('command_by')
        ->get();

        // สำหรับนับจำนวนสั่งการเฉยๆไม่ต้องเอาไปทำอะไรต่อ
        $count_command_1669_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('command_by', $data_command_user->id)
        ->get();

        // echo "<pre>";
        // print_r($command_1669_data);
        // echo "<pre>";
        // exit();

        // คะแนนเฉลี่ยของหน่วย 5 อันดับ  /// ยืนยันความถูกต้องจาก SENIOR
        $avg_score_unit_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('operating_unit_id' , "!=" , null)
        ->select('operating_unit_id', DB::raw('AVG(score_total) as avg_score_total'))
        ->groupBy('operating_unit_id')
        ->orderBy('avg_score_total', 'desc') // เรียงจากมากไปน้อย
        ->get();



        //จำนวนยานพาหนะทั้งหมด    /// ข้ามไว้ ////
        // $vehicle_unit_id = Data_1669_operating_officerDB::select('data_1669_operating_officers.*', DB::raw('COUNT(*) as count_vehicle_type'))
        // ->groupBy('vehicle_type')
        // ->
        $vechicle_area = Data_1669_operating_unit::where('area','=',$user_login->sub_organization)->get();

        //ระดับหน่วยปฏิบัติการทั้งหมด



        // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ
        $avg_score_by_case = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('helper_id' , "!=" , null)
        ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_case'))
        ->groupBy('helper_id')
        ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
        ->limit(5)
        ->get();

        //รายชื่อหน่วยปฏิบัติการ     /// ข้ามไว้ ////
        $operating_unit_data = Data_1669_operating_unit::where('area','=',$user_login->sub_organization)
        ->limit(10)
        ->orderBy('created_at','desc')
        ->get();

        foreach ($operating_unit_data as $key ) {
            //จำนวนคนในหน่วย
            $amount_operator[] = Sos_help_center::where('operating_unit_id',$key->id)
            ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_unit'))
            ->get();
        }

        //==================================================================================================================//
                                                    //  ข้อมูลการขอความช่วยเหลือ
        //==================================================================================================================//

        // นับ sos ทั้งหมด
        $data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->get();
        // นับ sos ที่สถานะ เสร็จสิ้น
        $count_sos_success = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->where('status', 'เสร็จสิ้น')->count();
        // นับ sos ที่สถานะ รับแจ้งเหตุ ออกจากฐาน
        $count_sos_helping = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->where('status', 'ออกจากฐาน')->count();
        // นับ sos ที่สถานะ ปฎิเสธ
        $count_sos_notReady = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->where('status', 'รับแจ้งเหตุ')->count();

        // คะแนนการช่วยเหลือต่อเคส มาก ที่สุด 5 อันดับ
        $data_sos_score_best_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('score_total','!=',null)
            ->limit(5)
            ->orderBy('score_total','desc')
            ->get();
        // คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด 5 อันดับ
        $data_sos_score_worst_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('score_total','!=',null)
            ->limit(5)
            ->orderBy('score_total','asc')
            ->get();
        // คะแนนการช่วยเหลือต่อเคส ไว ที่สุด 5 อันดับ
        $data_sos_fastest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('status','=','เสร็จสิ้น')
            ->limit(5)
            ->orderBy('time_sos_success','asc')
            ->get();
        // คะแนนการช่วยเหลือต่อเคส ช้า ที่สุด 5 อันดับ
        $data_sos_slowest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('status','=','เสร็จสิ้น')
            ->limit(5)
            ->orderBy('time_sos_success','desc')
            ->get();

        // พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ
        $sos_area_top5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('address' , "!=" , null)
        ->select('address')
        ->get();

            $data_arr = array();

            foreach ($sos_area_top5 as $key) {
                $sos_area_explode = explode('/', $key->address)[1];

                // ตรวจสอบว่ามีคีย์ที่เป็น $sos_area_explode อยู่ใน Array หรือไม่
                if (array_key_exists($sos_area_explode, $data_arr)) {
                    // ถ้ามีอยู่แล้วให้บวกค่าเข้าไปอีก 1
                    $data_arr[$sos_area_explode] += 1;
                } else {
                    // ถ้าไม่มีให้สร้างคีย์ใหม่และกำหนดค่าเป็น 1
                    $data_arr[$sos_area_explode] = 1;
                }

            }

            $name_area = array();
            $count_area = array();

            // นำข้อมูลจาก $data_arr เก็บไว้ใน $name_area และ $count_area
            foreach ($data_arr as $key => $value) {
                array_push($name_area, $key);
                array_push($count_area, $value);
            }

            // เรียงลำดับ $name_area และ $count_area ตามค่าใน $count_area จากมากไปน้อย
            array_multisort($count_area, SORT_DESC, $name_area);

            // สร้าง $data ใหม่โดยใช้ค่าใน $name_area และ $count_area
            $data = array();
            for ($i = 0; $i < count($name_area); $i++) {
                $key = $name_area[$i];
                $data[$key] = $count_area[$i];
            }

        // echo"จัดเรียงลำดับใหม่ <br>";
        // echo"<pre>";
        // print_r($data);
        // echo"</pre>";
        // echo"-------------------------";
        // echo"<br>";
        // echo"-------------------------";
        // echo"<br>";


        // echo"<br>";
        // echo">> ชื่อพื้นที่ <<";
        // echo"<br>";
        // echo"<pre>";
        // print_r($name_area);
        // echo"</pre>";
        // echo"-------------------------";

        // echo"<br>";
        // echo"<br>";
        // echo">> จำนวนครั้งของพื้นที่ <<";
        // echo"<br>";
        // echo"<pre>";
        // print_r($count_area);
        // echo"</pre>";
        // echo"-------------------------";

        // exit();


    return view('dashboard_1669.dashboard_1669_index',

    compact('data_command',
        'noti_1669_data',
        'count_Standby',
        'count_Helping',
        'count_notReady',
        'command_1669_data',
        'avg_score_unit_data',
        'vechicle_area',
        'avg_score_by_case',
        'operating_unit_data',
        'amount_operator',
        'data_sos',
        'count_sos_success',
        'count_sos_helping',
        'count_sos_notReady',
        'data_sos_score_best_5',
        'data_sos_score_worst_5',
        'data_sos_fastest_5',
        'data_sos_slowest_5',
        'sos_area_top5',
        'count_command_1669_data',
        'name_area',
        'count_area',


    ));

    }

    function map_sos(Request $request){

        $user_login = Auth::user();

        $sos_map_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->get();

        return $sos_map_data;
    }
}
