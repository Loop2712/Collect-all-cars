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
        ->select('sos_help_centers.*', DB::raw('COUNT(*) as count_command_by'))
        ->groupBy('command_by')
        ->get();

        // คะแนนเฉลี่ยของหน่วย 5 อันดับ  /// ยืนยันความถูกต้องจาก SENIOR
        $avg_score_unit_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
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
        ->groupBy('address')
        ->limit(5)
        ->get();

        // สร้างตัวแปรสำหรับเก็บข้อมูลที่ตรงเงื่อนไขทั้งหมด
        $sos_area_top5_filtered_data = [];

        // สร้างตัวแปรสำหรับเก็บจำนวนข้อมูลที่มีค่าในฟิลด์ $data->command_by ที่ซ้ำกัน
        $count_sos_area_top5_filtered_data = [];

        // วนลูปเพื่อตรวจสอบและเก็บข้อมูลที่ตรงเงื่อนไข
        foreach ($command_1669_data as $data) {
            $address_parts = explode('/', $data->address);
            $current_result = $address_parts[1];

            // ข้อมูลตรงเงื่อนไข ให้เก็บใน $sos_area_top5_filtered_data
            $sos_area_top5_filtered_data[] = $current_result;

            // เพิ่มค่าในตัวแปร $count_sos_area_top5_filtered_data ให้กับค่าในฟิลด์ $current_result โดยใช้ค่าเริ่มต้นเป็น 0 หากยังไม่มีค่านี้ใน $count_sos_area_top5_filtered_data
            $count_sos_area_top5_filtered_data[$current_result] = isset($count_sos_area_top5_filtered_data[$current_result]) ? $count_sos_area_top5_filtered_data[$current_result] + 1 : 1;


        }

        // dd($count_sos_area_top5_filtered_data);

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
        'sos_area_top5_filtered_data',
        'count_sos_area_top5_filtered_data'


    ));

    }

    function map_sos(Request $request){

        $user_login = Auth::user();

        $sos_map_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->get();

        return $sos_map_data;
    }
}
