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

    //==================================================================================================================//
                                                    //  ข้อมูลเจ้าหน้าที่ศูนย์สั่งการ
    //==================================================================================================================//
    function API_dashboard_index_1669(Request $request)
    {
        $user_id= $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $data_status_officer = Data_1669_officer_command::where('area', '=' ,$user_login->sub_organization)->get();
      
        $data_status_officer = DB::table('data_1669_officer_commands')
        ->where('data_1669_officer_commands.area', '=' ,$user_login->sub_organization)
        ->leftjoin('users as user_data', 'data_1669_officer_commands.user_id', '=', 'user_data.id')
        ->leftjoin('users as creator_data', 'data_1669_officer_commands.creator', '=', 'creator_data.id')
        ->select('data_1669_officer_commands.*', 'user_data.name as user_name' ,'user_data.sex as user_gender' ,'user_data.avatar as user_avatar' ,'user_data.photo as user_photo' ,'creator_data.name as name_creator')
        ->get();

        return response()->json($data_status_officer);
    }


     //==================================================================================================================//
                                                        //  ข้อมูลหน่วยปฏิบัติการ
    //==================================================================================================================//
    function API_dashboard_operating_officer(Request $request)
    {
        $user_id= $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
         // คะแนนเฉลี่ยของหน่วย 5 อันดับ
         $avg_score_unit_data = DB::table('sos_help_centers')
        ->where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('operating_unit_id' , "!=" , null)
        ->leftjoin('data_1669_operating_units', 'sos_help_centers.operating_unit_id', '=', 'data_1669_operating_units.id')
        ->leftjoin('users', 'sos_help_centers.helper_id', '=', 'users.id')
        ->select('operating_unit_id', DB::raw('AVG(score_total) as avg_score_total') , 'data_1669_operating_units.name as name_data_1669_operating_units' ,'users.photo as user_photo','users.avatar as user_avatar')
        ->groupBy('operating_unit_id')
        ->orderBy('avg_score_total', 'desc') // เรียงจากมากไปน้อย
        ->limit(5)
        ->get();
      
        return response()->json($avg_score_unit_data);
    }
    
    function API_dashboard_operating_unit(Request $request)
    {
        $user_id= $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $operating_unit_data = Sos_help_center::join('data_1669_operating_units','sos_help_centers.operating_unit_id' ,'=' , 'data_1669_operating_units.id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->select('sos_help_centers.*', 'data_1669_operating_units.name as op_name','data_1669_operating_units.created_at as op_lastest',
            DB::raw('AVG(sos_help_centers.score_total) as avg_score_by_unit') ,
            DB::raw('COUNT(sos_help_centers.operating_unit_id) as count_operating'))
        ->groupBy('sos_help_centers.operating_unit_id')
        ->limit(10)
        ->orderBy('op_lastest','desc')
        ->get();
        
        $operating_unit_data->each(function ($unit) {
            $count_amount_operator = Data_1669_operating_officer::where('operating_unit_id', $unit->operating_unit_id)->count();
            $unit->count_amount_operator = $count_amount_operator;
        });
    
      
        return response()->json($operating_unit_data);
    }
    
    function API_dashboard_avg_score_by_case(Request $request)
    {
        $user_id= $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
         // คะแนนเฉลี่ยของหน่วย 5 อันดับ
       // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ
    //    $avg_score_by_case = DB::table('sos_help_centers')
    //     ->where('notify','LIKE',"%$user_login->sub_organization%")
    //     ->where('helper_id' , "!=" , null)
    //     ->leftjoin('users', 'sos_help_centers.helper_id', '=', 'users.id')
    //     ->leftjoin('data_1669_operating_officers', 'sos_help_centers.helper_id', '=', 'data_1669_operating_officers.id')
    //     ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_case' ,'users.avatar as user_avatar' ,'users.photo as user_photo' ,'data_1669_operating_officers.name_officer as name_officer' ))
    //     ->groupBy('helper_id')
    //     ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
    //     ->limit(5)
    //     ->get();
      
  
        // คะแนนเฉลี่ยต่อเคสเจ้าหน้าที่ทั้งหมด 5 อันดับ
        $avg_score_by_case = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
            ->where('helper_id' , "!=" , null)
            ->select('sos_help_centers.*', DB::raw('AVG(score_total) as avg_score_by_case'))
            ->groupBy('helper_id')
            ->orderBy('avg_score_by_case', 'desc') // เรียงจากมากไปน้อย
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
    function API_dashboard_vehicle_operating(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        $user_operating_officers = Data_1669_operating_officer::where('user_id' , $user_login->id)->first();


        $data_vehicle_operating = DB::table('data_1669_operating_officers')
        ->where('operating_unit_id', $user_operating_officers->operating_unit_id)
        ->select(
            'data_1669_operating_officers.vehicle_type as vehicle_type',
            DB::raw('COUNT(data_1669_operating_officers.vehicle_type) as count_vehicle_type')
        )
        ->groupBy('vehicle_type')
        ->get();
    
        // รวม count_vehicle_type เพื่อให้ได้จำนวนทั้งหมด
        $total_count = $data_vehicle_operating->sum('count_vehicle_type');
        
        // เพิ่ม field ใน array ที่จะส่งกลับ
        $data_vehicle_operating = $data_vehicle_operating->map(function ($item) use ($total_count) {
            return array_merge((array) $item, ['total_count' => $total_count]);
        });
        
        return response()->json($data_vehicle_operating);
    }
    function API_dashboard_level_operating(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        $user_operating_officers = Data_1669_operating_officer::where('user_id' , $user_login->id)->first();


        $data_level_operating = DB::table('data_1669_operating_officers')
            ->where('operating_unit_id', $user_operating_officers->operating_unit_id)
            ->select('data_1669_operating_officers.level as level', DB::raw('COUNT(data_1669_operating_officers.level) as count_level'))
            ->groupBy('level')
            ->get();

        foreach ($data_level_operating as $item) {
            if ($item->level === 'ALS') {
                $item->color = '#dc3545';
            } elseif ($item->level === 'ILS') {
                $item->color = '#f48024';
            } elseif ($item->level === 'BLS') {
                $item->color = '#ffc107';
            } elseif ($item->level === 'FR') {
                $item->color = '#28a745';
            } else {
                $item->color = '#121416';
            }
        }

        
        return response()->json($data_level_operating);
    }


       //==================================================================================================================//
                                                    //  ข้อมูลการขอความช่วยเหลือ
        //==================================================================================================================//
    // นับ sos
    function API_dashboard_count_data_sos(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        $data_sos = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")->select('status')->get();
            
        return response()->json($data_sos);
    }


    // ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด
    function API_dashboard_data_ask_to_help(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
            $all_data_sos = DB::table('sos_help_centers')
            ->where('notify','LIKE',"%$user_login->sub_organization%")
            ->leftjoin('data_1669_officer_commands', 'sos_help_centers.command_by', '=', 'data_1669_officer_commands.id')
            ->leftjoin('data_1669_operating_officers', 'sos_help_centers.helper_id', '=', 'data_1669_operating_officers.user_id')
            ->leftjoin('data_1669_operating_units', 'sos_help_centers.operating_unit_id', '=', 'data_1669_operating_units.id')
            ->select('sos_help_centers.time_sos_success','sos_help_centers.time_command','sos_help_centers.status','sos_help_centers.operating_code','sos_help_centers.name_user', 'data_1669_officer_commands.name_officer_command' ,'data_1669_operating_officers.name_officer','data_1669_operating_units.name as operating_unit_name')
            ->limit(10)
            ->orderBy('sos_help_centers.id','DESC')
            ->get();
            
            
            
        return response()->json($all_data_sos);
    }
    // เวลาในการช่วยเหลือ ไว ที่สุด 5 อันดับ
    function API_dashboard_data_sos_fastest(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $data_sos_fastest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('status','=','เสร็จสิ้น')
        ->limit(5)
        ->orderByRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) DESC')
        ->select(
        'operating_code',
        'address',
        'name_helper',
        'organization_helper',
        'time_sos_success',
        'time_command',
        )
        ->get();
        return response()->json($data_sos_fastest_5);
    }


    // เวลาในการช่วยเหลือ ช้า ที่สุด 5 อันดับ
    function API_dashboard_data_sos_slowest(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $data_sos_fastest_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('status','=','เสร็จสิ้น')
        ->limit(5)
        ->orderByRaw('TIMESTAMPDIFF(SECOND, time_sos_success, time_command) ASC')
        ->select(
        'operating_code',
        'address',
        'name_helper',
        'organization_helper',
        'time_sos_success',
        'time_command',
        )
        ->get();
        return response()->json($data_sos_fastest_5);
    }

    // การปฏิบัติการ
    function API_dashboard_count_treatment(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $treatment_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->where('sos_1669_form_yellows.treatment', '!=', null)
        ->select('sos_1669_form_yellows.treatment', DB::raw('COUNT(sos_1669_form_yellows.treatment) as count_treatment'))
        ->groupBy('sos_1669_form_yellows.treatment')
        ->orderBy('count_treatment','DESC')
        ->get();
        return response()->json($treatment_data);
    }

  // พื้นที่การขอความช่วยเหลือมากที่สุด
    function API_dashboard_count_area_sos(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $sos_area_top5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('address' , "!=" , null)
        ->groupBy('address')
        ->select('address', DB::raw('COUNT(sos_help_centers.address) as count_address'))
        ->orderBy('count_address','DESC')
        ->get();


        $result = [];
        foreach ($sos_area_top5 as $item) {
            // ใช้ explode เพื่อแยกข้อมูลที่อยู่ออกเป็นส่วนๆ
            $addressParts = explode('/', $item->address);
        
            // เลือกเอาแค่อำเภอ (index 1)
            $amphur = trim($addressParts[1]);
        
            // เก็บข้อมูลที่ต้องการลงใน $result
            $result[] = [
                'address' => $amphur,
                'count_address' => $item->count_address,
            ];
        }
        // ทำการ groupBy ตาม amphur หลังจาก explode
        $result = collect($result)->groupBy('address')->map(function ($group) {
            return [
                'address' => $group->first()['address'],
                'count_address' => $group->sum('count_address'),
            ];
        })->values()->toArray();

        $result = collect($result)->sortByDesc('count_address')->values()->take(5)->all();

        return response()->json($result);
    }
    // คะแนนการช่วยเหลือต่อเคส มาก ที่สุด 5 อันดับ
    function API_dashboard_sos_score_best_5(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
     $data_sos_score_best_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
     ->where('score_total','!=',null)
     ->limit(5)
     ->orderBy('score_total','asc')
     ->get();
        return response()->json($data_sos_score_best_5);
    }
    // คะแนนการช่วยเหลือต่อเคส น้อย ที่สุด 5 อันดับ
    function API_dashboard_sos_score_worst_5(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $data_sos_score_worst_5 = Sos_help_center::where('notify','LIKE',"%$user_login->sub_organization%")
        ->where('score_total','!=',null)
        ->limit(5)
        ->orderBy('score_total','desc')
        ->get();

        return response()->json($data_sos_score_worst_5);
    }

      // รับแจ้งเตือนทาง
     function API_dashboard_data_notify(Request $request)
     {
         $user_id = $request->get('user_id');
         $user_login = User::where('id' , $user_id)->first();
         
        $notify_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->where('sos_1669_form_yellows.be_notified', '!=', null)
        ->select('sos_1669_form_yellows.be_notified', DB::raw('COUNT(sos_1669_form_yellows.be_notified) as count_be_notified'))
        ->groupBy('sos_1669_form_yellows.be_notified')
        ->orderBy('count_be_notified','DESC')
        ->get();
 
         return response()->json($notify_data);
     }

    function API_dashboard_districts_sos(Request $request){
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();

        $amphoe_sos = Sos_help_center::whereNotNull('address')
        ->where('sos_help_centers.notify', 'LIKE', "%$user_login->sub_organization%")
        ->groupBy('sos_help_centers.address')
        ->select('sos_help_centers.address', DB::raw('COUNT(sos_help_centers.address) as count_address'))
        ->get('sos_help_centers.address');
    
        foreach ($amphoe_sos as $item) {
            // ใช้ explode เพื่อแยกข้อมูลที่อยู่ออกเป็นส่วนๆ
            $addressParts = explode('/', $item->address);
        
            // เลือกเอาแค่อำเภอ (index 1)
            $amphur = trim($addressParts[1]);
        
            // เก็บข้อมูลที่ต้องการลงใน $result
            $result[] = [
                'address' => $amphur,
                'count_address' => $item->count_address,
            ];
        }
        // ทำการ groupBy ตาม amphur หลังจาก explode
        $result = collect($result)->groupBy('address')->map(function ($group) {
            return [
                'address' => $group->first()['address'],
                'count_address' => $group->sum('count_address'),
            ];
        })->values()->toArray();
        
        $result = collect($result)->sortByDesc('count_address')->values()->all();

        return response()->json($result);
    }
    function API_dashboard_most_symptom_data(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $most_symptom_data = Sos_1669_form_yellow::leftjoin('sos_help_centers', 'sos_1669_form_yellows.sos_help_center_id', '=', 'sos_help_centers.id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->whereNotNull('sos_1669_form_yellows.symptom')
        ->pluck('symptom')->flatMap(function ($symptom) {
            return explode(',', $symptom);
        })->groupBy(function ($symptom) {
            return $symptom;
        })->map(function ($group) {
            return [
                'symptom' => $group->first(),
                'count' => $group->count(),
            ];
        })->sortByDesc('count')->values()->take(5); // เรียงลำดับและใช้ take(5) เพื่อจำกัดจำนวนข้อมูล
        

        return response()->json($most_symptom_data);
    }

    function API_dashboard_form_yellows_idc(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $idc_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.idc', '!=', null)
            ->select('sos_1669_form_yellows.idc', DB::raw('COUNT(sos_1669_form_yellows.idc) as count_idc'))
            ->groupBy('sos_1669_form_yellows.idc')
            ->orderBy('count_idc','DESC')
            ->get();

            foreach ($idc_data as $item) {
                // ใช้ explode เพื่อแยกข้อความในวงเล็บ
                $textInsideParentheses = explode('(', $item->idc)[1] ?? null;
            
                // ตัดตัวหนังสือในวงเล็บ
                $cleanedText = rtrim($textInsideParentheses, ')');
            
                // เซ็ตค่าใน $item->idc เป็นข้อความที่ตัดแล้ว
                $item->idc = $cleanedText;
            
                // กำหนดสีตามข้อความที่ตัด
                switch ($cleanedText) {
                    case 'วิกฤติ':
                        $item->color = '#dc3545';
                        break;
                    case 'เร่งด่วน':
                        $item->color = '#ffc107';
                        break;
                    case 'ไม่รุนแรง':
                        $item->color = '#28a745';
                        break;
                    case 'ทั่วไป':
                        $item->color = '#cbd3da';
                        break;
                    case 'รับบริการสาธารณสุขอื่น':
                        $item->color = '#121416';
                        break;
                    default:
                        $item->color = '#121416';
                        break;
                }
            }
        return response()->json($idc_data);
    }

    function API_dashboard_form_yellows_rc(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        
        $rc_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
            ->where('sos_1669_form_yellows.rc', '!=', null)
            ->select('sos_1669_form_yellows.rc', DB::raw('COUNT(sos_1669_form_yellows.rc) as count_rc'))
            ->groupBy('sos_1669_form_yellows.rc')
            ->orderBy('count_rc','DESC')
            ->get();

            foreach ($rc_data as $item) {
                // ใช้ explode เพื่อแยกข้อความในวงเล็บ
                $textInsideParentheses = explode('(', $item->rc)[1] ?? null;
            
                // ตัดตัวหนังสือในวงเล็บ
                $cleanedText = rtrim($textInsideParentheses, ')');
            
                // เซ็ตค่าใน $item->rc เป็นข้อความที่ตัดแล้ว
                $item->rc = $cleanedText;
            
                // กำหนดสีตามข้อความที่ตัด
                switch ($cleanedText) {
                    case 'วิกฤติ':
                        $item->color = '#dc3545';
                        break;
                    case 'เร่งด่วน':
                        $item->color = '#ffc107';
                        break;
                    case 'ไม่รุนแรง':
                        $item->color = '#28a745';
                        break;
                    case 'ทั่วไป':
                        $item->color = '#cbd3da';
                        break;
                    case 'รับบริการสาธารณสุขอื่น':
                        $item->color = '#121416';
                        break;
                    default:
                        $item->color = '#121416';
                        break;
                }
            }
        return response()->json($rc_data);
    }

    function API_dashboard_treatment_have_cure(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();
        $treatment_have_cure_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->where('sos_1669_form_yellows.treatment', '=', "มีการรักษา")
        ->where('sos_1669_form_yellows.sub_treatment', '!=', null)
        ->select('sos_1669_form_yellows.sub_treatment', DB::raw('COUNT(sos_1669_form_yellows.sub_treatment) as count_sub_treatment'))
        ->groupBy('sos_1669_form_yellows.sub_treatment')
        ->orderBy('count_sub_treatment','DESC')
        ->get();

        return response()->json($treatment_have_cure_data);
    }

    function API_dashboard_treatment_no_have_cure(Request $request)
    {
        $user_id = $request->get('user_id');
        $user_login = User::where('id' , $user_id)->first();

        $treatment_have_no_cure_data = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.notify','LIKE',"%$user_login->sub_organization%")
        ->where('sos_1669_form_yellows.treatment', '=', "ไม่มีการรักษา")
        ->where('sos_1669_form_yellows.sub_treatment', '!=', null)
        ->select('sos_1669_form_yellows.sub_treatment', DB::raw('COUNT(sos_1669_form_yellows.sub_treatment) as count_sub_treatment'))
        ->groupBy('sos_1669_form_yellows.sub_treatment')
        ->orderBy('count_sub_treatment','DESC')
        ->get();

        return response()->json($treatment_have_no_cure_data);
    }
    function dashboard_index_1669(Request $request)
    {
        
        // ddd($countMostCommonDistrict , $mostCommonDistrict);
    return view('dashboard_1669.dashboard_1669_index');
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
            // ->limit(100)
            ->get();

        return view('dashboard_1669.dashboard_1669_sos.dashboard_1669_sos_show.all_case_sos_show' ,
            compact('data_sos')
        );
    }

    function map_sos(Request $request,$user_login_organization){

        // $user_login = $request->user_login_organization;

        $sos_map_data = Sos_help_center::where('sos_help_centers.notify','LIKE',"%$user_login_organization%")
        ->whereNotNull('sos_help_centers.lat')
        ->leftjoin('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->select('sos_help_centers.lat','sos_help_centers.lng','sos_1669_form_yellows.rc',)
        ->get();

        // return $sos_map_data;
        return response()->json($sos_map_data);
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
