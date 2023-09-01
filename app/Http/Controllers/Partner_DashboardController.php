<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Exports\UsersExport;
use App\Models\Ads_content;
use Maatwebsite\Excel\Facades\Excel;
Use Carbon\Carbon;
use PDF;
use App\User;
use App\Models\Partner;
use App\Models\Check_in;
use App\Models\Guest;
use App\Models\Register_car;
use App\Models\Sos_help_center;
use App\Models\Sos_map;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Averages;
use SebastianBergmann\Environment\Console;

class Partner_DashboardController extends Controller
{
    function dashboard_index(Request $request)
    {
        $user_login = Auth::user();

        // เจ้าหน้าที่ในองค์กร
        $data_officer_last5 = User::where('organization', '=', $user_login->organization)
        ->orderBy('created_at','DESC')
        ->limit(5)
        ->get();
        // ผู้ใช้ที่มาจาก API
        $data_user_from_last5 = User::where('user_from','LIKE',"%$user_login->user_from%")
        ->orderBy('created_at','DESC')
        ->limit(5)
        ->get();
        // นับผู้ใช้ทั้งหมด
        $data_officer = User::where('organization', '=', $user_login->organization)->orderBy('created_at','DESC')->get();
        $data_user_from = User::where('user_from','LIKE',"%$user_login->user_from%")->get();
        $all_user = count($data_officer) + count($data_user_from);

        // นับผู้ใช้แต่ละเดือน
        $date_now = Carbon::now();
        $all_user_m = User::whereMonth('created_at', $date_now)
        ->where('organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%$user_login->user_from%")
        ->count();

        // ช่องทางเข้าสู่ระบบ
        $count_type_login = DB::table('users')
        ->where('users.organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%$user_login->user_from%")
        ->select('users.type', DB::raw('COUNT(*) as user_type_count'))
        ->groupBy('users.type')
        ->orderBy('user_type_count','DESC')
        ->get();

        // จังหวัดของผู้ใช้สูงสุด 5 อันดับ
        $count_user_location = DB::table('users')
        ->where('users.organization', '=', $user_login->organization)
        ->orWhere('user_from','LIKE',"%$user_login->user_from%")
        ->select('users.location_P', DB::raw('COUNT(*) as user_location_count'))
        ->groupBy('users.location_P')
        ->orderBy('user_location_count','DESC')
        ->limit(5)
        ->get();



        //==================================================================================================================//
                                                        //  vii sos
        //==================================================================================================================//
        $sos_all_data = Sos_map::where('area',$user_login->organization)
        ->where('content','help_area')
        ->get();

        //หาจำนวนการขอความช่วยเหลือ
        $count_sos_all_data = count($sos_all_data);

        //หาระยะเวลาเฉลี่ยการขอความช่วยเหลือ
        $average_sos_all_data = Sos_map::where('area',$user_login->organization)
        ->where('content','help_area')
        ->where('help_complete','=','Yes')
        ->get();

        $totalDifference = 0;
        $count = 0;

        foreach ($average_sos_all_data as $data) {
            $timeSosSuccess = strtotime($data->help_complete_time);
            $timeCommand = strtotime($data->time_go_to_help);

            if ($timeSosSuccess !== false && $timeCommand !== false) {
                $difference = $timeSosSuccess - $timeCommand;
                $totalDifference += $difference;
                $count++;
            }
        }

        if ($count > 0) {
            $averageDifference = $totalDifference / $count;

        } else {
            $averageDifference = "0";
        }

        //หาเวลาที่เช็คอินมากสุด และน้อยสุด
        $sos_timeInCounts = array();

        foreach ($average_sos_all_data as $index => $sos) {
            $timeIn = $sos->created_at;
            $hour = date('H', strtotime($timeIn));

            if (!isset($sos_timeInCounts[$hour])) {
                $sos_timeInCounts[$hour] = 0;
            }
            $sos_timeInCounts[$hour]++;

        }

        $sos_nonZeroTimeInCounts = array_filter($sos_timeInCounts, function($value) {
            return $value !== 0;
        });

        if (!empty($sos_nonZeroTimeInCounts)) {
            $sos_maxValue = max($sos_nonZeroTimeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
            $sos_maxTimeCounts = array_keys($sos_nonZeroTimeInCounts, $sos_maxValue);
            $sos_maxTimeCounts = array_slice($sos_maxTimeCounts, 0, 2);

            $sos_minValue = min($sos_nonZeroTimeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
            $sos_minTimeCounts = array_keys($sos_nonZeroTimeInCounts, $sos_minValue);
            $sos_minTimeCounts = array_slice($sos_minTimeCounts, 0, 2);
        }else{
            $sos_maxTimeCounts = [];
            $sos_minTimeCounts = [];
        }


        // ข้อมูลการขอความช่วยเหลือ 10 ลำดับล่าสุด
        $all_data_sos = Sos_map::where('area',$user_login->organization)
            ->where('content','help_area')
            ->limit(10)
            ->orderBy('id','desc')
            ->get();

        // เวลาในการช่วยเหลือ เร็ว ที่สุด 5 อันดับ
        $data_sos_fastest_5 = Sos_map::where('area',$user_login->organization)
            ->where('content','help_area')
            ->where('help_complete','=','Yes')
            ->limit(5)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, help_complete_time, time_go_to_help) desc')
            ->get();

        // เวลาในการช่วยเหลือ ช้า ที่สุด 5 อันดับ
        $data_sos_slowest_5 = Sos_map::where('area',$user_login->organization)
            ->where('content','help_area')
            ->where('help_complete','=','Yes')
            ->limit(5)
            ->orderByRaw('TIMESTAMPDIFF(SECOND, help_complete_time, time_go_to_help) asc')
            ->get();

        // คะแนนการช่วยเหลือต่อเคส มากที่สุด 5 อันดับ
        $data_sos_score_best_5 = Sos_map::where('area',$user_login->organization)
            ->where('content','help_area')
            ->where('score_total','!=',null)
            ->limit(5)
            ->orderBy('score_total','desc')
            ->get();

        // MAP
        $sos_map_data = Sos_map::where('area',$user_login->organization)
            ->where('lat','!=',null)
            ->where('lng','!=',null)
            ->get();

        // การขอความช่วยเหลือในจังหวัด
        $area_sos = Sos_map::where('area',$user_login->organization)
            ->where('name_area', '!=', null)
            ->get('name_area');

        $decoded_area = [];

        foreach ($area_sos as $item) {
            $decoded = json_decode('"' . $item->name_area . '"'); // แปลง Unicode เป็นภาษาไทย

            if (isset($decoded)) {
                $decoded_area[] = $decoded;
            }
        }

        $districtCounts = collect($decoded_area)->countBy();

        // หา district ที่มากที่สุด
        $mostCommonDistrict = $districtCounts->sortDesc()->keys()->first();
        $countMostCommonDistrict = $districtCounts->sortDesc()->first();

        // ลบ district ที่มากที่สุดออกจาก districtCounts
        $districtCountsWithoutMostCommon = $districtCounts->except([$mostCommonDistrict]);

        $orderedDistricts = $districtCountsWithoutMostCommon->sortByDesc(function ($count, $district) {
            return $count;
        });


        //==================================================================================================================//
                                                        //  viinews
        //==================================================================================================================//

        //Check in
        $check_in_data = Partner::where('name' ,'=', $user_login->organization)
        ->get();

        $check_in_data_arr = array();

        for ($i=0; $i < count($check_in_data); $i++) {
            $check_ins_finder = Check_in::where('partner_id',$check_in_data[$i]['id'])->get();

            //หาเวลาที่เช็คอินมากสุด และน้อยสุด
            $timeInCounts = array();

            foreach ($check_ins_finder as $index => $check_in) {
                $timeIn = $check_in->time_in;
                $hour = date('H', strtotime($timeIn));

                if (!isset($timeInCounts[$hour])) {
                    $timeInCounts[$hour] = 0;
                }
                $timeInCounts[$hour]++;

            }

            $nonZeroTimeInCounts = array_filter($timeInCounts, function($value) {
                return $value !== 0;
            });

            if (!empty($nonZeroTimeInCounts)) {
                $maxValue = max($nonZeroTimeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
                $maxTimeCounts = array_keys($nonZeroTimeInCounts, $maxValue);
                $maxTimeCounts = array_slice($maxTimeCounts, 0, 2);

                $minValue = min($nonZeroTimeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
                $minTimeCounts = array_keys($nonZeroTimeInCounts, $minValue);
                $minTimeCounts = array_slice($minTimeCounts, 0, 2);
            }else{
                $maxTimeCounts = [];
                $minTimeCounts = [];
            }

            // หาวันที่เช็คอินมากสุด และน้อยสุด
            $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $thaiDays = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];

            $dayCount = array_fill_keys($daysOfWeek, 0); // เริ่มต้นนับทุกวันให้เป็น 0

            foreach ($check_ins_finder as $check_in) {
                $time_in = $check_in->time_in;
                $dayOfWeek = date('l', strtotime($time_in));

                $dayCount[$dayOfWeek]++; // เพิ่มจำนวนครั้งที่ปรากฏในวันนั้นๆ
            }

            $maxDayCount = max($dayCount);
            $maxDays = array_keys($dayCount, $maxDayCount);

            $minDayCount = min($dayCount);
            $minDays = array_keys($dayCount, $minDayCount);

            $maxThaiDay = [];
            foreach ($maxDays as $maxDay) {
                $maxThaiDay[] = $thaiDays[array_search($maxDay, $daysOfWeek)];
            }
            $maxThaiDay = array_slice($maxThaiDay, 0, 2);

            $minThaiDay = [];
            foreach ($minDays as $minDay) {
                $minThaiDay[] = $thaiDays[array_search($minDay, $daysOfWeek)];
            }
            $minThaiDay = array_slice($minThaiDay, 0, 2);

            // นับคนที่เกิดเดือนนี้
            $currentMonth = date('m');
            $count_hbd = 0;
            $encounteredIds = array();

            // ddd($check_ins_finder);

            for ($i=0; $i < count($check_ins_finder); $i++) {

                $userId = $check_ins_finder[$i]['user_id'];
                if (in_array($userId, $encounteredIds)) {
                    continue; // ถ้าเจอ id ที่ถูกนับแล้ว ข้ามไปเช็คคนถัดไป
                }
                $finder_hbd = User::where('id',$check_ins_finder[$i]['user_id'])->first('brith');
                $birthDate = $finder_hbd;
                $birthMonth = date('m', strtotime($birthDate));

                if($birthMonth == $currentMonth){
                    $count_hbd++;
                    $encounteredIds[] = $userId; // เพิ่ม id เข้าไปในอาร์เรย์เพื่อไม่นับซ้ำ
                }
            }


            // // จำนวนการเข้าพื้นที่
            $count_check_in_at_area = count($check_ins_finder);

        }

        //========================== end =============================//

        $all_data_partner = Partner::where('name' ,'=', $user_login->organization)
        ->get();

        $check_in_chart_arr = $this->check_in_all_area_chart($all_data_partner);
        //ใช้ 2 ตัวนี้ สำหรับกราฟ แสดง เวลาเช็คอินของแต่ละพื้นที่
        $resultArray = [];
        $timeArray = [];

        for ($i=0; $i < count($all_data_partner); $i++) {
            $check_ins_data = Check_in::where('partner_id',$all_data_partner[$i]['id'])->get();

            $dataCounts = [];
            $timeCount = [];
            foreach ($check_ins_data as $index => $check_in) {
                $timeIn = $check_in->time_in;
                $hour = date('H:i', strtotime($timeIn));

                if (!isset($dataCounts[$hour])) {
                    $dataCounts[$hour] = 0;
                }
                $dataCounts[$hour]++;

                $formattime = date('H:i:s', strtotime($timeIn));
                if (!isset($timeCount[$formattime])) {
                    $timeCount[$formattime] = 0;
                }else{

                }


            }

            // foreach ($check_ins_data as $time_check_in) {
            //     $timeCount[] = $time_check_in['time_in'];
            // }

            if(!empty($all_data_partner[$i]['name_area'])){
                $resultArray[] = [
                    'name' => $all_data_partner[$i]['name_area'],
                    'data' => $dataCounts,
                    'time' => $timeCount
                ];
            }else{
                $resultArray[] = [
                    'name' => "รวม",
                    'data' => $dataCounts,
                    'time' => $timeCount
                ];
            }

        }


        //========================== end chart =============================//

        $data_checkin = Partner::where('name' ,'=', $user_login->organization)->first();

        //ไม่ได้เข้าพื้นที่นานที่สุด
        $last_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->get();

        $sorted_last_checkIn_data = [];

        for ($i=0; $i < count($last_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$last_checkIn_data[$i]['user_id'])->first();
            $last_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $last_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $last_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_out','desc')
            ->get();

            $last_checkIn_data[$i]['time_out'] = $data_checkin_from_checkin[0]['time_out'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_last_checkIn_data[] = $last_checkIn_data[$i];
        }

        usort($sorted_last_checkIn_data, function ($a, $b) {
            return strtotime($a['time_out']) - strtotime($b['time_out']);
        });


        //เข้าพื้นที่บ่อยที่สุด
        $most_often_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->select('*',DB::raw('COUNT(user_id) as count_user_checkin'))
        ->groupBy('user_id')
        ->orderBy('count_user_checkin','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($most_often_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$most_often_checkIn_data[$i]['user_id'])->first();
            $most_often_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $most_often_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $most_often_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
        }

        //เข้าพื้นที่ล่าสุด
        $lastest_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->limit(5)
        ->get();

        $sorted_lastest_checkIn_data = [];

        for ($i=0; $i < count($lastest_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$lastest_checkIn_data[$i]['user_id'])->first();
            $lastest_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $lastest_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $lastest_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_in','desc')
            ->get();

            $lastest_checkIn_data[$i]['time_in'] = $data_checkin_from_checkin[0]['time_in'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_lastest_checkIn_data[] = $lastest_checkIn_data[$i];
        }

        usort($sorted_lastest_checkIn_data, function ($a, $b) {
            return strtotime($b['time_in']) - strtotime($a['time_in']);
        });

        //==================================================================================================================//
                                                        //  viimove
        //==================================================================================================================//

        $all_car_organization = Register_car::where('juristicNameTH',$user_login->organization)->get();

        $car_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','car')->count();
        $motorcycle_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','motorcycle')->count();
        $other_type_data = Register_car::where('juristicNameTH',$user_login->organization)->where('car_type','other')->count();


        // รถที่ลงทะเบียน 10 ลำดับล่าสุด
        $last_reg_car_top10 = Register_car::where('juristicNameTH',$user_login->organization)
        ->orderBy('id','desc')
        ->limit(10)
        ->get();

        for ($i=0; $i < count($last_reg_car_top10); $i++) {
            $data_user_from_last_reg_car_top10 = User::where('id','=',$last_reg_car_top10[$i]['user_id'])->first();
            $last_reg_car_top10[$i]['name_from_users'] = $data_user_from_last_reg_car_top10->name;
            $last_reg_car_top10[$i]['avatar'] = $data_user_from_last_reg_car_top10->avatar;
            $last_reg_car_top10[$i]['photo'] = $data_user_from_last_reg_car_top10->photo;
        }


        // รถที่ถูกรายงานมากที่สุด 5 อันดับ
        $report_car_top5 = Guest::where('organization',$user_login->organization)
        ->select('*',DB::raw('COUNT(user_id) as amount_report'))
        ->groupBy('user_id')
        ->get();

        for ($i=0; $i < count($report_car_top5); $i++) {
            $data_user_from_report_car_top5 = User::where('id','=',$report_car_top5[$i]['user_id'])->first();
            $report_car_top5[$i]['name_from_users'] = $data_user_from_report_car_top5->name;
            $report_car_top5[$i]['avatar'] = $data_user_from_report_car_top5->avatar;
            $report_car_top5[$i]['photo'] = $data_user_from_report_car_top5->photo;
        }

        // ประเภทรถมากที่สุด 5 อันดับ
        $type_car_registration_top5 = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(type_car_registration) as amount_type_car'))
        ->groupBy('type_car_registration')
        ->orderBy('amount_type_car','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($type_car_registration_top5); $i++) {
            $data_user_from_report_car_top5 = User::where('id','=',$type_car_registration_top5[$i]['user_id'])->first();
            $type_car_registration_top5[$i]['name_from_users'] = $data_user_from_report_car_top5->name;
            $type_car_registration_top5[$i]['avatar'] = $data_user_from_report_car_top5->avatar;
            $type_car_registration_top5[$i]['photo'] = $data_user_from_report_car_top5->photo;
        }

        //ยี่ห้อรถมากที่สุด
        $brand_car_top5 = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(brand) as amount_brand_car'))
        ->groupBy('brand')
        ->orderBy('amount_brand_car','desc')
        ->limit(5)
        ->get();


        //==================================================================================================================//
                                                        //  Dashboard BoardCast
        //==================================================================================================================//

        $all_ads_content = Ads_content::where('name_partner',$user_login->organization)->get();

        $count_all_content = Ads_content::where('name_partner',$user_login->organization)
        ->count();

        $count_all_by_checkin = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->count();

        $count_all_by_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->count();

        $count_all_by_car = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->count();

        // ======================== by_check_in =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_checkin_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->get();

        for ($i=0; $i < count($all_by_checkin_show_user); $i++) {
            if(!empty($all_by_checkin_show_user[$i]['show_user'])){
                $all_by_checkin_Explode = json_decode($all_by_checkin_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_checkin_Explode);

                $all_by_checkin_counts = 0;
                foreach ($counts as $key) {
                    $all_by_checkin_counts++;
                }

                $all_by_checkin_show_user[$i]['count_show_user'] = $all_by_checkin_counts;
            }else{
                $all_by_checkin_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_checkin_show_user = $all_by_checkin_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_checkin_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_checkin_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->get();

        for ($i=0; $i < count($all_by_checkin_user_click); $i++) {

            if(!empty($all_by_checkin_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_checkin_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key) {
                    $checkin_user_click++;
                }

                $all_by_checkin_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_checkin_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_checkin_user_click = $all_by_checkin_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);

        // ======================== by_car =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_car_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->get();

        for ($i=0; $i < count($all_by_car_show_user); $i++) {
            if(!empty($all_by_car_show_user[$i]['show_user'])){
                $all_by_car_Explode = json_decode($all_by_car_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_car_Explode);

                $all_by_car_counts = 0;
                foreach ($counts as $key) {
                    $all_by_car_counts++;
                }

                $all_by_car_show_user[$i]['count_show_user'] = $all_by_car_counts;
            }else{
                $all_by_car_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_car_show_user = $all_by_car_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_car_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_car_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->get();

        for ($i=0; $i < count($all_by_car_user_click); $i++) {

            if(!empty($all_by_car_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_car_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key) {
                    $checkin_user_click++;
                }

                $all_by_car_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_car_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_car_user_click = $all_by_car_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);

        // ======================== by_user =============================

        // เนื้อหาที่ส่งถึงผู้ใช้เยอะที่สุด
        $all_by_user_show_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->get();

        for ($i=0; $i < count($all_by_user_show_user); $i++) {
            if(!empty($all_by_user_show_user[$i]['show_user'])){
                $all_by_user_Explode = json_decode($all_by_user_show_user[$i]['show_user']);

                $counts = array_count_values($all_by_user_Explode);

                $all_by_user_counts = 0;
                foreach ($counts as $key) {
                    $all_by_user_counts++;
                }

                $all_by_user_show_user[$i]['count_show_user'] = $all_by_user_counts;
            }else{
                $all_by_user_show_user[$i]['count_show_user'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_user_show_user = $all_by_user_show_user->sortByDesc(function ($item) {
            return $item->count_show_user;
        })->take(5);

        // เนื้อหาที่ส่งบ่อยที่สุด
        $all_by_user_send_round = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->orderBy('send_round','desc')
        ->limit(5)
        ->get();

        // เนื้อหาที่มีคนดูมากที่สุด
        $all_by_user_user_click = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->get();

        for ($i=0; $i < count($all_by_user_user_click); $i++) {

            if(!empty($all_by_user_user_click[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_user_user_click[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key) {
                    $checkin_user_click++;
                }

                $all_by_user_user_click[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_user_user_click[$i]['count_user_click'] = 0;
            }

        }
        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_user_user_click = $all_by_user_user_click->sortByDesc(function ($item) {
            return $item->count_user_click;
        })->take(5);


        return view('dashboard.dashboard_index',  compact(
            'data_officer',
            'data_user_from',
            'data_officer_last5',
            'data_user_from_last5',
            'all_user',
            'all_user_m',
            'count_type_login',
            'count_user_location',
            'all_data_partner',
            'sorted_last_checkIn_data',
            'most_often_checkIn_data',
            'sorted_lastest_checkIn_data',
            'all_car_organization',
            'last_reg_car_top10',
            'car_type_data',
            'motorcycle_type_data',
            'other_type_data',
            'report_car_top5',
            'type_car_registration_top5',
            'brand_car_top5',
            'count_all_content',
            'count_all_by_checkin',
            'count_all_by_user',
            'count_all_by_car',
            'sorted_all_by_checkin_show_user',
            'all_by_checkin_send_round',
            'sorted_all_by_checkin_user_click',
            'sorted_all_by_car_show_user',
            'all_by_car_send_round',
            'sorted_all_by_car_user_click',
            'sorted_all_by_user_show_user',
            'all_by_user_send_round',
            'sorted_all_by_user_user_click',
            'count_hbd',
            'count_check_in_at_area',
            'maxThaiDay',
            'minThaiDay',
            'maxDayCount',
            'minDayCount',
            'maxTimeCounts',
            'minTimeCounts',
            'maxValue',
            'minValue',
            'resultArray',
            'timeArray',
            'check_in_chart_arr',
            'data_sos_fastest_5',
            'data_sos_slowest_5',
            'data_sos_score_best_5',
            'all_data_sos',
            'mostCommonDistrict',
            'orderedDistricts',
            'countMostCommonDistrict',
            'sos_map_data',
            'count_sos_all_data',
            'averageDifference',
            'sos_maxTimeCounts',
            'sos_minTimeCounts'
        ));

    }

    //========================================== dashboard_user show ================================================

    function dashboard_user_index(Request $request)
    {
        $user_login = Auth::user();

        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $user_data = User::where('organization', '=', $user_login->organization)
                ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('name_staff', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('location_P', 'LIKE', "%$keyword%")
                ->orWhere('location_A', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $user_data = User::where('organization', '=', $user_login->organization)->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")->latest()->paginate($perPage);
        }

        // GroupBy ที่อยู่ไปใช้ใน dropdown filter
        $filter_location_P = DB::table('users')
            ->where('users.location_P', '!=', null)
            ->where('users.organization', '=', $user_login->organization)
            ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
            ->select('users.location_P')
            ->groupBy('users.location_P')
            ->orderBy('users.location_P','DESC')
            ->get();

        return view('dashboard.dashboard_user.user_index' , compact('user_data','filter_location_P'));
    }

    //========================================== dashboard_viisos show ================================================

    function dashboard_viisos(Request $request){
        $user_login = Auth::user();
        // นับ sos ทั้งหมด
        $data_sos = Sos_map::where('area',$user_login->organization)
        ->where('content','help_area')
        ->get();

        return view('dashboard.dashboard_viisos.viisos_show.all_sos_show', compact('data_sos') );
    }

    function viisos_3_topic(Request $request){
        $user_login = Auth::user();

        // เวลาในการช่วยเหลือ เร็ว ที่สุด 5 อันดับ
        $data_sos_score_time = Sos_map::where('area',$user_login->organization)
            ->where('help_complete','=','Yes')
            ->orderByRaw('TIMESTAMPDIFF(SECOND, help_complete_time, time_go_to_help) desc')
            ->get();

        return view('dashboard.dashboard_viisos.viisos_show.viisos_3_topic', compact('data_sos_score_time') );
    }

    //========================================== viimove show ================================================

    function viimove_register_car(Request $request){

        $user_login = Auth::user();

        $last_reg_car = Register_car::where('juristicNameTH',$user_login->organization)
        ->orderBy('id','desc')
        ->get();

        for ($i=0; $i < count($last_reg_car); $i++) {
            $data_user_from_last_reg_car = User::where('id','=',$last_reg_car[$i]['user_id'])->first();
            $last_reg_car[$i]['name_from_users'] = $data_user_from_last_reg_car->name;
            $last_reg_car[$i]['avatar'] = $data_user_from_last_reg_car->avatar;
            $last_reg_car[$i]['photo'] = $data_user_from_last_reg_car->photo;
        }

        return view('dashboard.dashboard_viimove.viimove_show.register_car', compact('last_reg_car') );
    }

    function viimove_car_3_topic(Request $request){
        $user_login = Auth::user();
        $type_page = $request->get('type_page');

        // รถที่ถูกรายงานมากที่สุด
        $report_car = Guest::where('organization',$user_login->organization)
        ->select('*',DB::raw('COUNT(user_id) as amount_report'))
        ->groupBy('user_id')
        ->get();

        for ($i=0; $i < count($report_car); $i++) {
            $data_user_from_report_car = User::where('id','=',$report_car[$i]['user_id'])->first();
            $report_car[$i]['name_from_users'] = $data_user_from_report_car->name;
            $report_car[$i]['avatar'] = $data_user_from_report_car->avatar;
            $report_car[$i]['photo'] = $data_user_from_report_car->photo;
        }

        // ประเภทรถมากที่สุด
        $type_car_registration = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(type_car_registration) as amount_type_car'))
        ->groupBy('type_car_registration')
        ->orderBy('amount_type_car','desc')
        ->get();

        for ($i=0; $i < count($type_car_registration); $i++) {
            $data_user_from_report_car = User::where('id','=',$type_car_registration[$i]['user_id'])->first();
            $type_car_registration[$i]['name_from_users'] = $data_user_from_report_car->name;
            $type_car_registration[$i]['avatar'] = $data_user_from_report_car->avatar;
            $type_car_registration[$i]['photo'] = $data_user_from_report_car->photo;
        }

        //ยี่ห้อรถมากที่สุด
        $brand_car = Register_car::where('juristicNameTH',$user_login->organization)
        ->select('*',DB::raw('COUNT(brand) as amount_brand_car'))
        ->groupBy('brand')
        ->orderBy('amount_brand_car','desc')
        ->get();

        return view('dashboard.dashboard_viimove.viimove_show.car_3_topic', compact('report_car','type_car_registration','brand_car','type_page') );
    }
    //========================================== viinews show ================================================

    function viinews_3_topic(Request $request){
        $user_login = Auth::user();
        $type_page = $request->get('type_page');

        $data_checkin = Partner::where('name' ,'=', $user_login->organization)->first();

        //ไม่ได้เข้าพื้นที่นานที่สุด
        $last_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->get();

        $sorted_last_checkIn_data = [];

        for ($i=0; $i < count($last_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$last_checkIn_data[$i]['user_id'])->first();
            $last_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $last_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $last_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_out','desc')
            ->get();

            $last_checkIn_data[$i]['time_out'] = $data_checkin_from_checkin[0]['time_out'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_last_checkIn_data[] = $last_checkIn_data[$i];
        }

        usort($sorted_last_checkIn_data, function ($a, $b) {
            return strtotime($a['time_out']) - strtotime($b['time_out']);
        });


        //เข้าพื้นที่บ่อยที่สุด
        $most_often_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->select('*',DB::raw('COUNT(user_id) as count_user_checkin'))
        ->groupBy('user_id')
        ->orderBy('count_user_checkin','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($most_often_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$most_often_checkIn_data[$i]['user_id'])->first();
            $most_often_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $most_often_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $most_often_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
        }

        //เข้าพื้นที่ล่าสุด
        $lastest_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->limit(5)
        ->get();

        $sorted_lastest_checkIn_data = [];

        for ($i=0; $i < count($lastest_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$lastest_checkIn_data[$i]['user_id'])->first();
            $lastest_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $lastest_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $lastest_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_in','desc')
            ->get();

            $lastest_checkIn_data[$i]['time_in'] = $data_checkin_from_checkin[0]['time_in'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_lastest_checkIn_data[] = $lastest_checkIn_data[$i];
        }

        usort($sorted_lastest_checkIn_data, function ($a, $b) {
            return strtotime($b['time_in']) - strtotime($a['time_in']);
        });


        return view('dashboard.dashboard_viinews.viinews_show.viinews_3_topic', compact('sorted_last_checkIn_data','most_often_checkIn_data','sorted_lastest_checkIn_data','type_page') );
    }

    //========================================== boardcast show ================================================

    function boardcast_3_topic(Request $request){
        $user_login = Auth::user();
        $type_page = $request->get('type_page');

        //========================== by check_in =============================

        $all_by_checkin = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_check_in')
        ->get();

        for ($i=0; $i < count($all_by_checkin); $i++) {
            // if(!empty($all_by_checkin[$i]['show_user'])){
            //     $all_by_checkin_Explode = json_decode($all_by_checkin[$i]['show_user']);

            //     $counts = array_count_values($all_by_checkin_Explode);

            //     $all_by_checkin_counts = 0;
            //     foreach ($counts as $key => $value) {
            //         $all_by_checkin_counts++;
            //     }

            //     $all_by_checkin[$i]['count_show_user'] = $all_by_checkin_counts;
            // }else{
            //     $all_by_checkin[$i]['count_show_user'] = 0;
            // }

            // if(!empty($all_by_checkin[$i]['user_click'])){
            //     $user_click_Explode = json_decode($all_by_checkin[$i]['user_click']);

            //     $count_user_click = array_count_values($user_click_Explode);

            //     $checkin_user_click = 0;
            //     foreach ($count_user_click as $key => $value) {
            //         $checkin_user_click++;
            //     }

            //     $all_by_checkin[$i]['count_user_click'] = $checkin_user_click;
            // }else{
            //     $all_by_checkin[$i]['count_user_click'] = 0;
            // }

        }

        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_checkin = $all_by_checkin->sortByDesc(function ($item) {
            return $item->send_round;
        });

        //========================== by car =============================

        $all_by_car = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_car')
        ->get();

        for ($i=0; $i < count($all_by_car); $i++) {
            if(!empty($all_by_car[$i]['show_user'])){
                $all_by_car_Explode = json_decode($all_by_car[$i]['show_user']);

                $counts = array_count_values($all_by_car_Explode);

                $all_by_car_counts = 0;
                foreach ($counts as $key => $value) {
                    $all_by_car_counts++;
                }

                $all_by_car[$i]['count_show_user'] = $all_by_car_counts;
            }else{
                $all_by_car[$i]['count_show_user'] = 0;
            }

            if(!empty($all_by_car[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_car[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key => $value) {
                    $checkin_user_click++;
                }

                $all_by_car[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_car[$i]['count_user_click'] = 0;
            }

        }

        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_car = $all_by_car->sortByDesc(function ($item) {
            return $item->send_round;
        });

        //========================== by user =============================

        $all_by_user = Ads_content::where('name_partner',$user_login->organization)
        ->where('type_content','BC_by_user')
        ->get();

        for ($i=0; $i < count($all_by_user); $i++) {
            if(!empty($all_by_user[$i]['show_user'])){
                $all_by_user_Explode = json_decode($all_by_user[$i]['show_user']);

                $counts = array_count_values($all_by_user_Explode);

                $all_by_user_counts = 0;
                foreach ($counts as $key => $value) {
                    $all_by_user_counts++;
                }

                $all_by_user[$i]['count_show_user'] = $all_by_user_counts;
            }else{
                $all_by_user[$i]['count_show_user'] = 0;
            }

            if(!empty($all_by_user[$i]['user_click'])){
                $user_click_Explode = json_decode($all_by_user[$i]['user_click']);

                $count_user_click = array_count_values($user_click_Explode);

                $checkin_user_click = 0;
                foreach ($count_user_click as $key => $value) {
                    $checkin_user_click++;
                }

                $all_by_user[$i]['count_user_click'] = $checkin_user_click;
            }else{
                $all_by_user[$i]['count_user_click'] = 0;
            }

        }

        // เรียงลำดับ มากไปน้อยสุด และจำกัดเอาแค่ 5 ลำดับ
        $sorted_all_by_user = $all_by_user->sortByDesc(function ($item) {
            return $item->send_round;
        });

        return view('dashboard.dashboard_boardcast.boardcast_show.boardcast_3_topic', compact('sorted_all_by_checkin','sorted_all_by_car','sorted_all_by_user','type_page') );
    }


    //=========================================== from api =====================================

    function filter_user(Request $request){
        $user_login = Auth::user();

        $keyword = $request->all();
        $perPage = 10;

        if(!empty($keyword)){

        } else {
            // GroupBy ช่องทาง login
            $filter_location_P = DB::table('users')
            ->where('users.location_P', '!=', null)
            ->where('users.organization', '=', $user_login->organization)
            ->orWhere('user_from','LIKE',"%มีเงิน_จำกัด%")
            ->select('users.location_P')
            ->groupBy('users.location_P')
            ->orderBy('users.location_P','DESC')
            ->get();
        }

        return $filter_location_P;
    }

    function get_area_checkin(Request $request , $area_id , $user_login){

        $check_in_data = Partner::where('id' , $area_id)->get();

        for ($i=0; $i < count($check_in_data); $i++) {
            $check_ins_finder = Check_in::where('partner_id',$check_in_data[$i]['id'])->get();

            //หาเวลาที่เช็คอินมากสุด และน้อยสุด
            $timeInCounts = array();

            foreach ($check_ins_finder as $index => $check_in) {
                $timeIn = $check_in->time_in;
                $hour = date('H', strtotime($timeIn));

                if (!isset($timeInCounts[$hour])) {
                    $timeInCounts[$hour] = 0;
                }
                $timeInCounts[$hour]++;

            }
            $maxValue = max($timeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
            $maxTimeCounts = array_keys($timeInCounts, $maxValue);

            $minValue = min($timeInCounts); // หาค่าที่มากที่สุดในอาร์เรย์
            $minTimeCounts = array_keys($timeInCounts, $minValue);

            //หาวันที่เช็คอินมากสุด และน้อยสุด
           // หาวันที่เช็คอินมากสุด และน้อยสุด
            $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $thaiDays = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];

            $dayCount = array_fill_keys($daysOfWeek, 0); // เริ่มต้นนับทุกวันให้เป็น 0

            foreach ($check_ins_finder as $check_in) {
                $time_in = $check_in->time_in;
                $dayOfWeek = date('l', strtotime($time_in));

                $dayCount[$dayOfWeek]++; // เพิ่มจำนวนครั้งที่ปรากฏในวันนั้นๆ
            }

            $maxDayCount = max($dayCount);
            $maxDays = array_keys($dayCount, $maxDayCount);

            $minDayCount = min($dayCount);
            $minDays = array_keys($dayCount, $minDayCount);

            $maxThaiDay = [];
            foreach ($maxDays as $maxDay) {
                $maxThaiDay[] = $thaiDays[array_search($maxDay, $daysOfWeek)];
            }

            $minThaiDay = [];
            foreach ($minDays as $minDay) {
                $minThaiDay[] = $thaiDays[array_search($minDay, $daysOfWeek)];
            }

            // นับคนที่เกิดเดือนนี้
            $currentMonth = date('m');
            $count_hbd = 0;
            $encounteredIds = array();

            for ($i=0; $i < count($check_ins_finder); $i++) {
                $finder_hbd = User::where('id',$check_ins_finder[$i]['user_id'])->first();

                $userId = $finder_hbd->id;
                if (in_array($userId, $encounteredIds)) {
                    continue; // ถ้าเจอ id ที่ถูกนับแล้ว ข้ามไปเช็คคนถัดไป
                }

                $birthDate = $finder_hbd->brith;
                $birthMonth = date('m', strtotime($birthDate));

                if($birthMonth == $currentMonth){
                    $count_hbd++;
                    $encounteredIds[] = $userId; // เพิ่ม id เข้าไปในอาร์เรย์เพื่อไม่นับซ้ำ
                }
            }

            // จำนวนการเข้าพื้นที่
            $count_check_in_at_area = count($check_ins_finder);

        }

        // เปลี่ยนค่าว่างของพื้นที่รวม ให้เป็นรวม
        if(empty($check_in_data->name_area)){
            $name_area_show = "รวม";
        }

        // นำตัวแปรมาเรียงเป็น Associative Array
        $responseData = [
            'count_hbd' => $count_hbd,
            'count_check_in_at_area' => $count_check_in_at_area,
            'maxThaiDay' => $maxThaiDay,
            'minThaiDay' => $minThaiDay,
            'maxDayCount' => $maxDayCount,
            'minDayCount' => $minDayCount,
            'maxTimeCounts' => $maxTimeCounts,
            'minTimeCounts' => $minTimeCounts,
            'maxValue' => $maxValue,
            'minValue' => $minValue,
            'name_area' => $name_area_show,
        ];

        // ส่งข้อมูลกลับไปยัง client ในรูปแบบ JSON
        return response()->json($responseData);
    }


    function get_area_checkin_3_topic(Request $request , $area_id , $user_login){

        $data_checkin = Partner::where('id',$area_id)->first();
        // Check in
        if(!empty($data_checkin->name_area)){
            $name_area = $data_checkin->name_area;
        }else{
            $name_area = "รวม";
        }

        //ไม่ได้เข้าพื้นที่นานที่สุด
        $last_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->get();

        $sorted_last_checkIn_data = [];

        for ($i=0; $i < count($last_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$last_checkIn_data[$i]['user_id'])->first();
            $last_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $last_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $last_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_out','desc')
            ->get();

            $last_checkIn_data[$i]['time_out'] = $data_checkin_from_checkin[0]['time_out'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_last_checkIn_data[] = $last_checkIn_data[$i];
        }

        usort($sorted_last_checkIn_data, function ($a, $b) {
            return strtotime($a['time_out']) - strtotime($b['time_out']);
        });


        //เข้าพื้นที่บ่อยที่สุด
        $most_often_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->select('*',DB::raw('COUNT(user_id) as count_user_checkin'))
        ->groupBy('user_id')
        ->orderBy('count_user_checkin','desc')
        ->limit(5)
        ->get();

        for ($i=0; $i < count($most_often_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$most_often_checkIn_data[$i]['user_id'])->first();
            $most_often_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $most_often_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $most_often_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;
        }

        //เข้าพื้นที่ล่าสุด
        $lastest_checkIn_data = Check_in::where('partner_id',$data_checkin->id)
        ->groupBy('user_id')
        ->select('user_id')
        ->limit(5)
        ->get();

        $sorted_lastest_checkIn_data = [];

        for ($i=0; $i < count($lastest_checkIn_data); $i++) {
            $data_user_from_checkin = User::where('id','=',$lastest_checkIn_data[$i]['user_id'])->first();
            $lastest_checkIn_data[$i]['name'] = $data_user_from_checkin->name;
            $lastest_checkIn_data[$i]['avatar'] = $data_user_from_checkin->avatar;
            $lastest_checkIn_data[$i]['photo'] = $data_user_from_checkin->photo;

            $data_checkin_from_checkin = Check_in::where('user_id',$last_checkIn_data[$i]['user_id'])
            ->orderBy('time_in','desc')
            ->get();

            $lastest_checkIn_data[$i]['time_in'] = $data_checkin_from_checkin[0]['time_in'];

            // เก็บข้อมูลที่ปรับแต่งเพื่อใช้ในการเรียงลำดับลงในอาร์เรย์
            $sorted_lastest_checkIn_data[] = $lastest_checkIn_data[$i];
        }

        usort($sorted_lastest_checkIn_data, function ($a, $b) {
            return strtotime($b['time_in']) - strtotime($a['time_in']);
        });

         // นำตัวแปรมาเรียงเป็น Associative Array
        $responseData = [
            'sorted_last_checkIn_data' => $sorted_last_checkIn_data,
            'most_often_checkIn_data' => $most_often_checkIn_data,
            'sorted_lastest_checkIn_data' => $sorted_lastest_checkIn_data,
            'name_area' => $name_area,
        ];

        // ส่งข้อมูลกลับไปยัง client ในรูปแบบ JSON
        return response()->json($responseData);
    }

    function map_sos_organization(Request $request,$user_login_organization){

        // $user_login = $request->user_login_organization;

        $sos_map_data = Sos_map::where('area',$user_login_organization)->get();

        return $sos_map_data;
    }

    function check_in_all_area_chart($all_data_partner){

        $hours = [];
        $currentHour = Carbon::now()->startOfDay();
        $chartData = array();

        for ($i = 0; $i < 24; $i++) {
            $hours[] = $currentHour->format('H:00');
            $currentHour->addHour();
        }

        $iii = 0;

        $chartData = [
            'categories' => $hours,
            'series' => [],
        ];

        foreach ($all_data_partner as $key) {

            $data[$iii] = DB::table('check_ins')
                ->where('partner_id',$key->id)
                ->select(
                    DB::raw('TIME_FORMAT(time_in, "%H:00") as hour'),
                    DB::raw('COUNT(*) as count')
                )
                ->groupBy('hour')
                ->get();

            if(empty($key->name_area)){
                $key->name_area = "รวม";
            }

            $data_array_loop =
                [
                    'name' => $key->name_area,
                    'data' => $this->mergeData($hours, $data[$iii]),
                ];

            array_push($chartData['series'],$data_array_loop);

            $iii++;

        }


        return $chartData;
    }

    private function mergeData($hours, $data)
    {
        $mergedData = [];

        foreach ($hours as $hour) {
            $match = $data->firstWhere('hour', $hour);

            if ($match) {
                $mergedData[] = $match->count;
            } else {
                $mergedData[] = 0;
            }
        }

        return $mergedData;
    }


}
