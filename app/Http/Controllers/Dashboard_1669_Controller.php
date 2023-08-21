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
use App\Models\Sos_1669_form_yellow;

class Dashboard_1669_Controller extends Controller
{
    function dashboard_index_1669(Request $request)
    {
        $user_login = Auth::user();
        // $data_command_user = Data_1669_officer_command::where('user_id' , $user_login->id)->first();

        //==================================================================================================================//
                                                        //  ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ
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
            ->where('users.organization', '=', 'สพฉ')
            ->where('users.sub_organization', '=', $user_login->sub_organization)
            ->select('users.*', 'data_1669_officer_commands.*')
            ->orderBy('number','ASC')
            ->limit(5)
            ->get();

        // การสั่งการมากที่สุด 5 อันดับ
        $command_1669_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('operating_unit_id' , "!=" , null)
        ->select('sos_help_centers.*', DB::raw('COUNT(*) as count_command_by'))
        ->groupBy('command_by')
        ->orderBy('count_command_by','DESC')
        ->limit(5)
        ->get();

        //==================================================================================================================//
                                                        //  ข้อมูลหน่วยปฏิบัติการ
        //==================================================================================================================//


        // คะแนนเฉลี่ยของหน่วย 5 อันดับ
        $avg_score_unit_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('operating_unit_id' , "!=" , null)
        ->select('operating_unit_id', DB::raw('AVG(score_total) as avg_score_total'))
        ->groupBy('operating_unit_id')
        ->orderBy('avg_score_total', 'desc') // เรียงจากมากไปน้อย
        ->limit(5)
        ->get();

        //จำนวนยานพาหนะทั้งหมด
        $merge_vehicle_data = User::join('data_1669_operating_units', 'users.sub_organization', '=', 'data_1669_operating_units.area')
        ->where('data_1669_operating_units.area','=',$user_login->sub_organization)
        ->select('data_1669_operating_units.id')
        ->groupBy('data_1669_operating_units.id')
        ->get();

        $vehicle_arr = array();
        // เก็บจำนวนยานพาหนะทั้งหมด
        $count_vehicle_all = 0;

        foreach ($merge_vehicle_data as $key) {
            $vehicle_unit_data = Data_1669_operating_officer::where('operating_unit_id', $key->id)->get();

            // Count occurrences of vehicle_type
            $vehicle_type_counts = $vehicle_unit_data->countBy('vehicle_type');
            // Merge the counts into $vehicle_arr
            foreach ($vehicle_type_counts as $vehicle_type => $count) {
                if (isset($vehicle_arr[$vehicle_type])) {
                    $vehicle_arr[$vehicle_type]['count_vehicle_type'] += $count;
                } else {
                    $vehicle_arr[$vehicle_type] = [
                        'vehicle_type' => $vehicle_type,
                        'count_vehicle_type' => $count,
                    ];
                }
            }
            // นับจำนวน ยานพาหนะ เพื่อหา จำนวนทั้งหมด
            $count_vehicle_all += $vehicle_unit_data->count();
        }

        // เรียง array index ที่มีค่ามากกว่าก่อน
        usort($vehicle_arr, function ($a, $b) {
            return $b['count_vehicle_type'] - $a['count_vehicle_type'];
        });

        //========================= สิ้นสุด  จำนวนยานพาหนะทั้งหมด  ===========================

        //ระดับหน่วยปฏิบัติการทั้งหมด
        $merge_level_data = User::join('data_1669_operating_units', 'users.sub_organization', '=', 'data_1669_operating_units.area')
        ->where('data_1669_operating_units.area','=',$user_login->sub_organization)
        ->select('data_1669_operating_units.id')
        ->groupBy('data_1669_operating_units.id')
        ->get();

        $level_op_arr = array();

        foreach ($merge_level_data as $key) {
            $level_op_data = Data_1669_operating_officer::where('operating_unit_id', $key->id)->get();

            // Count occurrences of vehicle_type
            $level_op_type_counts = $level_op_data->countBy('level');

            // Merge the counts into $vehicle_arr
            foreach ($level_op_type_counts as $level_op => $count) {
                if (isset($level_op_arr[$level_op])) {
                    $level_op_arr[$level_op]['count_level_op'] += $count;
                } else {
                    $level_op_arr[$level_op] = [
                        'level' => $level_op,
                        'count_level_op' => $count,
                    ];
                }
            }
        }

        // เรียง array index ที่มีค่ามากกว่าก่อน
        usort($level_op_arr, function ($a, $b) {
            return $b['count_level_op'] - $a['count_level_op'];
        });

        /////////////////////////////////////

        // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ
        $avg_score_by_case = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('helper_id' , "!=" , null)
        ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_case'))
        ->groupBy('helper_id')
        ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
        ->limit(5)
        ->get();

        //รายชื่อหน่วยปฏิบัติการ
        $operating_unit_data = Sos_help_center::join('data_1669_operating_units','sos_help_centers.operating_unit_id' ,'=' , 'data_1669_operating_units.id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->select('sos_help_centers.*', 'data_1669_operating_units.name as op_name','data_1669_operating_units.created_at as op_lastest',
                DB::raw('AVG(sos_help_centers.score_total) as avg_score_by_unit') ,
                DB::raw('COUNT(sos_help_centers.operating_unit_id) as count_operating'))
            ->groupBy('sos_help_centers.operating_unit_id')
            ->limit(10)
            ->orderBy('op_lastest','desc')
            ->get();

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

        // ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด
        $all_data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->limit(10)
        ->orderBy('id','desc')
        ->get();

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
        // เวลาในการช่วยเหลือ ไว ที่สุด 5 อันดับ
        $data_sos_fastest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('status','=','เสร็จสิ้น')
            ->limit(5)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) desc')
            ->get();
        // เวลาในการช่วยเหลือ ช้า ที่สุด 5 อันดับ
        $data_sos_slowest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('status','=','เสร็จสิ้น')
            ->limit(5)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) asc')
            ->get();

        // MAP
        $sos_map_data = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('lat','!=',null)
        ->where('lng','!=',null)
        ->get();

        // พื้นที่การขอความช่วยเหลือมากที่สุด 5 อันดับ  --> limit 5 อันดับที่หน้า view แทน
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

        /////////////////////////////////////////////////////////////////

        // หัวข้อการขอความช่วยเหลือมากที่สุด
        $most_symptom_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.symptom', '!=', null)
            // ->select('sos_1669_form_yellows.symptom', DB::raw('COUNT(sos_1669_form_yellows.symptom) as count_sympton'))
            // ->groupBy('sos_1669_form_yellows.symptom')
            // ->orderBy('sos_1669_form_yellows.symptom','DESC')
            ->get();

        $arr_most_symptom_data = array();
        $text_all_symptom = '' ;

        foreach ($most_symptom_data as $iten_all) {
            if (!empty($text_all_symptom)) {
                $text_all_symptom = $text_all_symptom . "," . $iten_all->symptom ;
            }else{
                $text_all_symptom = $iten_all->symptom ;
            }
        }

        $text_all_symptom_ex = explode("," , $text_all_symptom);

        for ($symptom_i = 0; $symptom_i < count($text_all_symptom_ex) ; $symptom_i++) {
            if (array_key_exists($text_all_symptom_ex[$symptom_i],$arr_most_symptom_data)){
                $arr_most_symptom_data[$text_all_symptom_ex[$symptom_i]] += 1 ;
            }else{
                $key_symptom = $text_all_symptom_ex[$symptom_i] ;
                $arr_most_symptom_data[$key_symptom] = '1' ;
            }
        }
        arsort($arr_most_symptom_data);

        $arr_most_symptom_data_limit_5 = array();

        $counter_symptom_5 = 0;
        foreach ($arr_most_symptom_data as $key_symptom_5 => $value_symptom_5) {
            if ($counter_symptom_5 < 5) {
                $arr_most_symptom_data_limit_5[$key_symptom_5] = $value_symptom_5;
            }
            $counter_symptom_5 += 1;
        }
        // exit();

        // รับแจ้งเตือนทาง
        $notify_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.be_notified', '!=', null)
            ->select('sos_1669_form_yellows.be_notified', DB::raw('COUNT(sos_1669_form_yellows.be_notified) as count_be_notified'))
            ->groupBy('sos_1669_form_yellows.be_notified')
            ->orderBy('count_be_notified','DESC')
            ->get();

        // ระดับสถานการณ์ประเมินโดย ศูนย์สั่งการ
        $idc_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.idc', '!=', null)
            ->select('sos_1669_form_yellows.idc', DB::raw('COUNT(sos_1669_form_yellows.idc) as count_idc'))
            ->groupBy('sos_1669_form_yellows.idc')
            ->orderBy('count_idc','DESC')
            ->get();

        // ระดับสถานการณ์ประเมินโดย หน่วยปฏิบัติการ
        $rc_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.rc', '!=', null)
            ->select('sos_1669_form_yellows.rc', DB::raw('COUNT(sos_1669_form_yellows.rc) as count_rc'))
            ->groupBy('sos_1669_form_yellows.rc')
            ->orderBy('count_rc','DESC')
            ->get();

        // การปฏิบัติการ
        $treatment_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.treatment', '!=', null)
            ->select('sos_1669_form_yellows.treatment', DB::raw('COUNT(sos_1669_form_yellows.treatment) as count_treatment'))
            ->groupBy('sos_1669_form_yellows.treatment')
            ->orderBy('count_treatment','DESC')
            ->get();

        // การปฏิบัติการที่มีการรักษา
        $treatment_have_cure_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.treatment', '=', "มีการรักษา")
            ->where('sos_1669_form_yellows.sub_treatment', '!=', null)
            ->select('sos_1669_form_yellows.sub_treatment', DB::raw('COUNT(sos_1669_form_yellows.sub_treatment) as count_sub_treatment'))
            ->groupBy('sos_1669_form_yellows.sub_treatment')
            ->orderBy('count_sub_treatment','DESC')
            ->get();

        // การปฏิบัติการที่ไม่มีการรักษา
        $treatment_have_no_cure_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->where('sos_1669_form_yellows.treatment', '=', "ไม่มีการรักษา")
        ->where('sos_1669_form_yellows.sub_treatment', '!=', null)
        ->select('sos_1669_form_yellows.sub_treatment', DB::raw('COUNT(sos_1669_form_yellows.sub_treatment) as count_sub_treatment'))
        ->groupBy('sos_1669_form_yellows.sub_treatment')
        ->orderBy('count_sub_treatment','DESC')
        ->get();

        $amphoe_sos = Sos_help_center::where('sos_help_centers.address', '!=', null)
            ->where('sos_help_centers.notify', 'LIKE', "%$user_login->sub_organization%")
            ->get('sos_help_centers.address');
        
        $decoded_districts = [];
        
        foreach ($amphoe_sos as $item) {
            $decoded = json_decode('"' . $item->address . '"'); // แปลง Unicode เป็นภาษาไทย
            $parts = explode('/', $decoded);
            if (isset($parts[1])) {
                $decoded_districts[] = $parts[1];
            }
        }
        
        $districtCounts = collect($decoded_districts)->countBy();
        
        // หา district ที่มากที่สุด
        $mostCommonDistrict = $districtCounts->sortDesc()->keys()->first();
        $countMostCommonDistrict = $districtCounts->sortDesc()->first();
        
        // ลบ district ที่มากที่สุดออกจาก districtCounts
        $districtCountsWithoutMostCommon = $districtCounts->except([$mostCommonDistrict]);
        
        $orderedDistricts = $districtCountsWithoutMostCommon->sortByDesc(function ($count, $district) {
            return $count;
        });

        // ddd($countMostCommonDistrict , $mostCommonDistrict);
    return view('dashboard_1669.dashboard_1669_index',

    compact('data_command',
        'noti_1669_data',
        'count_Standby',
        'count_Helping',
        'count_notReady',
        'command_1669_data',
        'avg_score_unit_data',
        'vehicle_arr',
        'count_vehicle_all',
        'level_op_arr',
        'avg_score_by_case',
        'operating_unit_data',
        'data_sos',
        'all_data_sos',
        'count_sos_success',
        'count_sos_helping',
        'count_sos_notReady',
        'data_sos_score_best_5',
        'data_sos_score_worst_5',
        'data_sos_fastest_5',
        'data_sos_slowest_5',
        'sos_map_data',
        'sos_area_top5',
        // 'count_command_1669_data',
        'name_area',
        'count_area',
        // 'most_symptom_data',
        'arr_most_symptom_data_limit_5',
        'notify_data',
        'idc_data',
        'rc_data',
        'treatment_data',
        'treatment_have_cure_data',
        'treatment_have_no_cure_data',
        'mostCommonDistrict',
        'orderedDistricts',
        'countMostCommonDistrict',
    ));

    }

    //==========================================================================================================
    //                                       หน้าข้อมูลเพิ่มเติมของ เจ้าหน้าที่ศูนย์สั่งการ
    //==========================================================================================================

    function all_user_1669(Request $request){

        $user_login = Auth::user();
        $perPage = 10;

        $name_filter = $request->get('name_filter');
        $gender_filter = $request->get('gender_filter');
        $status_filter = $request->get('status_filter');

        //  USER สพฉ ในพื้นที่เดียวกับ ผู้เข้าสู่ระบบ
        if(!empty($name_filter) || !empty($gender_filter) || !empty($status_filter)){
            $data_command_user = Data_1669_officer_command::leftJoin('users' , 'data_1669_officer_commands.user_id','=','users.id')
            ->where('data_1669_officer_commands.area', '=' ,$user_login->sub_organization)
            ->when($name_filter, function ($query, $name_filter) {
                return $query->where('data_1669_officer_commands.name_officer_command', 'LIKE' , "%$name_filter%");
            })
            ->when($gender_filter, function ($query, $gender_filter) {
                return $query->where('users.sex', $gender_filter);
            })
            ->when($status_filter, function ($query, $status_filter) {
                return $query->where('data_1669_officer_commands.status', $status_filter);
            })
            ->select('data_1669_officer_commands.*','users.name','users.avatar','users.photo','users.sex')
            ->orderBy('id','DESC')
            ->get();
        }else{
            $data_command_user = Data_1669_officer_command::leftJoin('users' , 'data_1669_officer_commands.user_id','=','users.id')
            ->where('data_1669_officer_commands.area', '=' ,$user_login->sub_organization)
            ->select('data_1669_officer_commands.*','users.name','users.avatar','users.photo','users.sex')
            ->orderBy('id','DESC')
            ->get();
        }

        for ($i=0; $i < count($data_command_user); $i++) {

            $data_user = User::where('id',$data_command_user[$i]['creator'])->first();
            if(!empty($data_command_user[$i]['creator'])){
                $data_command_user[$i]['name_creator'] = $data_user->name;
            }else{
                $data_command_user[$i]['name_creator'] = "ViiCHECK";
            }


        }

        return view('dashboard_1669.dashboard_1669_officer.dashboard_1669_officer_show.command_center_info_show' , compact('data_command_user'));
    }

    function dashboard_1669_all_command(Request $request){
        $user_login = Auth::user();
        $perPage = 10;

        $name_filter = $request->get('name_filter');

        // การสั่งการมากที่สุด 5 อันดับ
        if(!empty($name_filter)){
            $command_1669_data = Sos_help_center::leftJoin('data_1669_officer_commands' , 'sos_help_centers.command_by','=','data_1669_officer_commands.id')
                ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
                ->where('sos_help_centers.operating_unit_id' , "!=" , null)
                ->when($name_filter, function ($query, $name_filter) {
                    return $query->where('data_1669_officer_commands.name_officer_command', 'LIKE' , "%$name_filter%");
                })
                ->select('sos_help_centers.id', 'sos_help_centers.command_by', 'data_1669_officer_commands.name_officer_command' , 'data_1669_officer_commands.user_id' ,DB::raw('COUNT(*) as count_command_by'))
                ->groupBy('sos_help_centers.command_by')
                ->orderBy('count_command_by','DESC')
                ->get();
        }else{
            $command_1669_data = Sos_help_center::leftJoin('data_1669_officer_commands' , 'sos_help_centers.command_by','=','data_1669_officer_commands.id')
                ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
                ->where('sos_help_centers.operating_unit_id' , "!=" , null)
                ->select('sos_help_centers.id', 'sos_help_centers.command_by', 'data_1669_officer_commands.name_officer_command' , 'data_1669_officer_commands.user_id' ,DB::raw('COUNT(*) as count_command_by'))
                ->groupBy('sos_help_centers.command_by')
                ->orderBy('count_command_by','DESC')
                ->get();
        }


        return view('dashboard_1669.dashboard_1669_officer.dashboard_1669_officer_show.all_command_show' , compact('command_1669_data'));
    }

    //==========================================================================================================
    //                                       หน้าข้อมูลเพิ่มเติมของ หน่วยปฏิบัติการ
    //==========================================================================================================

    function dashboard_1669_all_score_unit(Request $request){
        $user_login = Auth::user();
        $perPage = 10;

        $name_filter = $request->get('name_filter');
        $score_filter = $request->get('score_filter');


        if(!empty($name_filter) || !empty($score_filter)){
        // คะแนนเฉลี่ยของหน่วย
        $avg_score_unit_data = Sos_help_center::leftJoin('data_1669_operating_units' , 'sos_help_centers.operating_unit_id','=','data_1669_operating_units.id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_help_centers.operating_unit_id' , "!=" , null)
            ->when($name_filter, function ($query, $name_filter) {
                return $query->where('data_1669_operating_units.name', 'LIKE' , "%$name_filter%");
            })
            ->when($score_filter, function ($query, $score_filter) {
                // return $query->where('sos_help_centers.score_total', $score_filter);
                return $query->whereBetween('sos_help_centers.score_total', [$score_filter, $score_filter + 0.99]);
            })
            ->select('sos_help_centers.operating_unit_id', 'data_1669_operating_units.name' , DB::raw('AVG(score_total) as avg_score_total'))
            ->groupBy('sos_help_centers.operating_unit_id')
            ->orderBy('avg_score_total', 'desc') // เรียงจากมากไปน้อย
            ->paginate($perPage);
        }else{
        $avg_score_unit_data = Sos_help_center::leftJoin('data_1669_operating_units' , 'sos_help_centers.operating_unit_id','=','data_1669_operating_units.id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_help_centers.operating_unit_id' , "!=" , null)
            ->select('sos_help_centers.operating_unit_id', 'data_1669_operating_units.name' , DB::raw('AVG(score_total) as avg_score_total'))
            ->groupBy('sos_help_centers.operating_unit_id')
            ->orderBy('avg_score_total', 'desc') // เรียงจากมากไปน้อย
            ->paginate($perPage);
        }


        return view('dashboard_1669.dashboard_1669_officer.dashboard_1669_officer_show.all_score_unit_show' , compact('avg_score_unit_data'));
    }

    function dashboard_1669_all_average_score_by_case(Request $request){
        $user_login = Auth::user();
        $perPage = 10;

        $name_filter = $request->get('name_filter');
        $score_filter = $request->get('score_filter');

        if(!empty($name_filter) || !empty($score_filter)){
            // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด
            $avg_score_by_case = Sos_help_center::leftJoin('data_1669_operating_units' , 'sos_help_centers.operating_unit_id','=','data_1669_operating_units.id')
                ->leftJoin('data_1669_operating_officers' , 'sos_help_centers.helper_id','=','data_1669_operating_officers.user_id')
                ->where('notify','LIKE',"%$user_login->sub_organization%")
                ->where('helper_id' , "!=" , null)
                ->when($name_filter, function ($query, $name_filter) {
                    return $query->where('data_1669_operating_units.name', 'LIKE' , "%$name_filter%")
                            ->orWhere('data_1669_operating_officers.name_officer', 'LIKE' , "%$name_filter%");
                })
                ->when($score_filter, function ($query, $score_filter) {
                    // return $query->where('sos_help_centers.score_total', $score_filter);
                    return $query->whereBetween('sos_help_centers.score_total', [$score_filter, $score_filter + 0.99]);
                })
                ->select('data_1669_operating_units.name', 'data_1669_operating_officers.name_officer', 'sos_help_centers.helper_id', DB::raw('AVG(score_total) as avg_score_by_case'))
                ->groupBy('helper_id')
                ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
                ->paginate($perPage);
        }else{
            // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด
            $avg_score_by_case = Sos_help_center::leftJoin('data_1669_operating_units' , 'sos_help_centers.operating_unit_id','=','data_1669_operating_units.id')
                ->leftJoin('data_1669_operating_officers' , 'sos_help_centers.helper_id','=','data_1669_operating_officers.user_id')
                ->where('notify','LIKE',"%$user_login->sub_organization%")
                ->where('helper_id' , "!=" , null)
                ->select('data_1669_operating_units.name', 'data_1669_operating_officers.name_officer', 'sos_help_centers.helper_id', DB::raw('AVG(score_total) as avg_score_by_case'))
                ->groupBy('helper_id')
                ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
                ->paginate($perPage);
        }

        return view('dashboard_1669.dashboard_1669_officer.dashboard_1669_officer_show.all_average_score_by_case_show' , compact('avg_score_by_case'));
    }

    //==========================================================================================================
    //                                       หน้าข้อมูลเพิ่มเติมของ SOS
    //==========================================================================================================

    function dashboard_1669_all_sos_show(Request $request){
        $user_login = Auth::user();
        $perPage = 10;

        $name_filter = $request->get('name_filter');
        $score_filter = $request->get('score_filter');
        $time_filter = $request->get('time_filter');

        // คะแนนและระยะเวลาการช่วยเหลือ
        if(!empty($name_filter) || !empty($score_filter)){
            $data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->when($name_filter, function ($query, $name_filter) {
                return $query->where('name_helper', 'LIKE', "%$name_filter%")
                        ->orWhere('organization_helper', 'LIKE' , "%$name_filter%");
            })
            ->when($score_filter, function ($query, $score_filter) {
                // return $query->where('sos_help_centers.score_total', $score_filter);
                return $query->whereBetween('score_total', [$score_filter, $score_filter + 0.99]);
            })
            ->when($time_filter, function ($query, $time_filter) {
                if ($time_filter == 'less_8') {
                    return $query->whereRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) < 480');
                } elseif ($time_filter == 'over_8_less_12') {
                    return $query->whereRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) >= 480')
                                 ->whereRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) <= 720');
                } elseif ($time_filter == 'over_12') {
                    return $query->whereRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) > 720');
                }
            })
            ->where('status','=','เสร็จสิ้น')
            ->orderBy('time_sos_success','asc')
            ->get();

            dd($data_sos);
        }else{
            $data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('status','=','เสร็จสิ้น')
            ->orderBy('time_sos_success','asc')
            ->get();
        }


        return view('dashboard_1669.dashboard_1669_sos.dashboard_1669_sos_show.all_sos_show' , compact('data_sos'));
    }

    function dashboard_1669_all_case_sos_show(Request $request){
        $user_login = Auth::user();
        $perPage = 10;

        $data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->orderBy('score_total','desc')
            ->get();

        return view('dashboard_1669.dashboard_1669_sos.dashboard_1669_sos_show.all_case_sos_show' ,
            compact('data_sos')
        );
    }

    function map_sos(Request $request,$user_login_organization){

        // $user_login = $request->user_login_organization;

        $sos_map_data = Sos_help_center::where('notify','LIKE',"%$user_login_organization%")->get();

        return $sos_map_data;
    }

    function top5_score_unit(Request $request,$filter_data,$user_login){

        // คะแนนเฉลี่ยของหน่วย 5 อันดับ
        $order = $filter_data == "most_data" ? 'desc' : 'asc';

        $top5_score_unit = Sos_help_center::where('notify', 'LIKE', "%$user_login%")
            ->where('operating_unit_id', "!=", null)
            ->select('operating_unit_id', DB::raw('AVG(score_total) as avg_score_total'))
            ->groupBy('operating_unit_id')
            ->orderBy('avg_score_total', $order)
            ->limit(5)
            ->get();

        for ($i=0; $i < count($top5_score_unit); $i++) {
            $data_operating_unit = Data_1669_operating_unit::where('id',$top5_score_unit[$i]['operating_unit_id'])->first();
            $top5_score_unit[$i]['name_unit'] = $data_operating_unit->name;
        }

        return $top5_score_unit;
    }

    function avg_score_by_case(Request $request,$filter_data,$user_login){

        // คะแนนเฉลี่ยของหน่วย 5 อันดับ
        $order = $filter_data == "most_data" ? 'desc' : 'asc';

        // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ
        $avg_score_by_case = Sos_help_center::where('notify','LIKE',"%$user_login%")
            ->where('helper_id' , "!=" , null)
            ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_case'))
            ->groupBy('helper_id')
            ->orderBy('avg_score_by_case', $order) // เรียงจากมากไปน้อย
            ->limit(5)
            ->get();

        for ($i=0; $i < count($avg_score_by_case); $i++) {

            $data_user = User::where('id',$avg_score_by_case[$i]['helper_id'])->first();
            $avg_score_by_case[$i]['avatar'] = $data_user->avatar;
            $avg_score_by_case[$i]['photo'] = $data_user->photo;

            $data_officer = Data_1669_operating_officer::where('user_id',$avg_score_by_case[$i]['helper_id'])->first();
            $avg_score_by_case[$i]['name_officer'] = $data_officer->name_officer;

            $data_operating_unit = Data_1669_operating_unit::where('id',$avg_score_by_case[$i]['operating_unit_id'])->first();
            $avg_score_by_case[$i]['name_unit'] = $data_operating_unit->name;

        }

        return $avg_score_by_case;
    }

    function filter_all_user_1669(Request $request){

        $user_login = Auth::user();
        $perPage = 10;

        //  USER สพฉ ในพื้นที่เดียวกับ ผู้เข้าสู่ระบบ
        $data_command_user = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)
        ->orderBy('id','DESC')
        ->paginate($perPage);


        return $data_command_user;
    }

    function filter_data_command_unit(Request $request){
        // นับ USER ในสพฉ
        $user_login = $request->get('user_login');
        $name_filter = $request->get('name');
        $gender_filter = $request->get('gender');
        $status_filter = $request->get('status');

        if(!empty($name_filter) || !empty($gender_filter) || !empty($status_filter)){
            $data_command = Data_1669_officer_command::leftJoin('users' , 'data_1669_officer_commands.user_id','=','users.id')
            ->where('data_1669_officer_commands.area', '=' ,$user_login)
            ->when($name_filter, function ($query, $name_filter) {
                return $query->where('users.name', $name_filter);
            })
            ->when($gender_filter, function ($query, $gender_filter) {
                return $query->where('users.sex', $gender_filter);
            })
            ->when($status_filter, function ($query, $status_filter) {
                return $query->where('data_1669_officer_commands.status', $status_filter);
            })
            ->select('data_1669_officer_commands.*','users.name','users.avatar','users.photo','users.sex')
            ->orderBy('id','DESC')
            ->get();
        }else{
            $data_command = Data_1669_officer_command::leftJoin('users' , 'data_1669_officer_commands.user_id','=','users.id')
            ->where('data_1669_officer_commands.area', '=' ,$user_login)
            ->select('data_1669_officer_commands.*','users.name','users.avatar','users.photo','users.sex')
            ->orderBy('id','DESC')
            ->get();
        }


        for ($i=0; $i < count($data_command); $i++) {

            $data_user = User::where('id',$data_command[$i]['creator'])->first();
            $data_command[$i]['name_creator'] = $data_user->name;

        }

         return $data_command;
    }
}
