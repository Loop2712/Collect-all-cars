<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Data_1669_officer_command;
use App\Models\Sos_map;
use App\Models\Sos_help_center;
use App\Models\Agora_chat;
use Intervention\Image\ImageManagerStatic as Image;
// use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
use App\Models\Data_1669_operating_officer;
use App\Models\Group_line;
use App\Models\Partner;
use App\Models\Sos_1669_form_yellow;
use Willywes\AgoraSDK\RtcTokenBuilder;

class Agora_4_Controller extends Controller
{
    // // // // -------- // // // //
    // // // // SOS 1669 // // // //
    // // // // -------- // // // //

    // public function get_appId()
    // {
    //     $appID = env('AGORA_APP_ID');
    //     $appCertificate = env('AGORA_APP_CERTIFICATE');

    //     $data = [] ;
    //     $data['appId'] = $appID ;
    //     $data['appCertificate'] = $appCertificate ;

    //     return $data ;
    // }

    public function before_video_call_4(Request $request)
    {
        $user = Auth::user();

        $appId = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        $sos_id = $request->sos_id;
        $type = $request->type;

        $consult_doctor_id = 123; // ยังไม่ใช้
        $request->user_to_call;

        //ตรวจอุปกรณ์
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // ตรวจสอบชนิดของอุปกรณ์
        if (preg_match('/android/i', $userAgent)) {
            $type_device = "mobile_video_call";
            $type_brand = "android";
        }
        else if (preg_match('/iPad|iPhone|iPod/', $userAgent) && !strpos($userAgent, 'MSStream')) {
            $type_device = "mobile_video_call";
            $type_brand = "ios";
        }
        else{
            $type_device = "pc_video_call";
            $type_brand = "pc";
        }

        return view('video_call_4/before_video_call_4', compact('user','appId','appCertificate','sos_id','consult_doctor_id','type','type_device','type_brand'));

    }

    public function pc_index(Request $request ,$type ,$sos_id)
    {
        $user = Auth::user();

        $requestData = $request->all();

        // $appId = $requestData['appId'];
        // $appCertificate =  $requestData['appCertificate'];

        if($type == 'sos_1669'){
            $sos_data  = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.id',$sos_id)
            ->select('sos_help_centers.*','sos_1669_form_yellows.*','sos_help_centers.time_create_sos as created_sos')
            ->first();

            $groupId = '';

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','meet_operating_1669')->first();
        }elseif ($type == 'user_sos_1669') {
            $sos_data  = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->where('sos_help_centers.id',$sos_id)
                ->select('sos_help_centers.*','sos_1669_form_yellows.*','sos_help_centers.time_create_sos as created_sos')
                ->first();

            $groupId = '';

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','user_sos_1669')->first();
        }else{
            $sos_data = Sos_map::where('id' , $sos_id)->first();

            $data_partner = Partner::where('name' , $sos_data->area)
            ->where('name_area' , $sos_data->name_area)
            ->first();

            $data_groupline = Group_line::where('id' , $data_partner->group_line_id)->first();
            $groupId = $data_groupline->groupId ;

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','sos_map')->first();
        }

        if (!empty($useSpeaker)) {
            $useSpeaker = $requestData['useSpeaker'];
        } else {
            $useSpeaker = '';
        }
        if (!empty($useMicrophone)) {
            $useMicrophone = $requestData['useMicrophone'];
        } else {
            $useMicrophone = '';
        }
        if (!empty($useCamera)) {
            $useCamera = $requestData['useCamera'];
        } else {
            $useCamera = '';
        }

        $videoTrack = $requestData['videoTrack'];
        $audioTrack = $requestData['audioTrack'];

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        return view('video_call_4/pc_video_call_4', compact('data_agora','user','appID','appCertificate','videoTrack','audioTrack','sos_id','useSpeaker','useMicrophone','useCamera','type','sos_data','role_permission','groupId'));

    }

    public function mobile_index(Request $request ,$type ,$sos_id)
    {
        $user = Auth::user();

        $requestData = $request->all();

        // $appId = $requestData['appId'];
        // $appCertificate =  $requestData['appCertificate'];
        if($type == 'sos_1669'){
            $sos_data  = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
            ->where('sos_help_centers.id',$sos_id)
            ->select('sos_help_centers.*','sos_1669_form_yellows.*','sos_help_centers.time_create_sos as created_sos')
            ->first();

            $groupId = '';

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','meet_operating_1669')->first();
        }elseif ($type == 'user_sos_1669') {
            $sos_data  = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
                ->where('sos_help_centers.id',$sos_id)
                ->select('sos_help_centers.*','sos_1669_form_yellows.*','sos_help_centers.time_create_sos as created_sos')
                ->first();

            $groupId = '';

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','user_sos_1669')->first();
        }
        else{
            $sos_data = Sos_map::where('id' , $sos_id)->first();

            $data_partner = Partner::where('name' , $sos_data->area)
            ->where('name_area' , $sos_data->name_area)
            ->first();

            $data_groupline = Group_line::where('id' , $data_partner->group_line_id)->first();
            $groupId = $data_groupline->groupId ;

            if($user->id == $sos_data->user_id){
                $role_permission = 'help_seeker';
            }else{
                $role_permission = 'helper';
            }

            $data_agora = Agora_chat::where('sos_id',$sos_id)->where('room_for','sos_map')->first();
        }

        if (!empty($useSpeaker)) {
            $useSpeaker = $requestData['useSpeaker'];
        } else {
            $useSpeaker = '';
        }
        if (!empty($useMicrophone)) {
            $useMicrophone = $requestData['useMicrophone'];
        } else {
            $useMicrophone = '';
        }
        if (!empty($useCamera)) {
            $useCamera = $requestData['useCamera'];
        } else {
            $useCamera = '';
        }

        $videoTrack = $requestData['videoTrack'];
        $audioTrack = $requestData['audioTrack'];

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        //ตรวจอุปกรณ์
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // ตรวจสอบชนิดของอุปกรณ์
        if (preg_match('/android/i', $userAgent)) {
            $type_brand = "android";
        }
        else if (preg_match('/iPad|iPhone|iPod/', $userAgent) && !strpos($userAgent, 'MSStream')) {
            $type_brand = "ios";
        }
        else{
            $type_brand = "pc";
        }


        return view('video_call_4/mobile_video_call_4' , compact('data_agora','user','appID','appCertificate','videoTrack','audioTrack','sos_id','useSpeaker','useMicrophone','useCamera','type','sos_data','role_permission','groupId','type_brand'));
    }

    public function token(Request $request)
    {

        if (!empty($request->appId) && !empty($request->appCertificate)) {
            $appID = $request->appId;
            $appCertificate = $request->appCertificate;
        } else {
            $appID = env('AGORA_APP_ID');
            $appCertificate = env('AGORA_APP_CERTIFICATE');
        }

        $data_user = User::where('id' ,$request->user_id)->first();

        $user = $data_user->id;
        $channelName = $request->type . $request->sos_id;

        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        $agora_data = [
            'token' => $token,
            'privilegeExpiredTs' => $privilegeExpiredTs,
            'channel' => $channelName,
        ];
        return $agora_data;
    }

    public function callUser(Request $request)
    {

        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = Auth::id();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }

    function join_room_4(Request $request)
    {
        $sos_id = $request->sos_id;
        $user_id = $request->user_id;
        $type = $request->type;

        if($type == 'sos_1669'){
            $type_text = "meet_operating_1669";
        }else if($type == 'user_sos_1669'){
            $type_text = "user_sos_1669";
        }else{
            $type_text = "sos_map";
        }

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();

        if (!empty($agora_chat->member_in_room) ){
            // มีข้อมูล ใน member_in_room
            $data_update = $agora_chat->member_in_room;

            $data_array = json_decode($data_update, true);

            // ป้องกัน array มีค่าซ้ำกัน
            if (!in_array($user_id, $data_array)) {
                $data_array[] = $user_id;
            }
            // แปลงกลับเป็น JSON
            $data_update = json_encode($data_array);

            $update_time_start = $agora_chat->time_start ;

            //ถ้าผู้ใช้มากกว่าหรือเท่ากับ 2
            if(count($data_array) >= 2){
                if(empty($agora_chat->than_2_people_time_start)){

                    $update_than_2_time_start = date("Y-m-d H:i:s");
                }else{
                    $update_than_2_time_start = $agora_chat->than_2_people_time_start;
                }
            }else{
                $update_than_2_time_start = null;
            }
        }else{
            // ไม่มีข้อมูล ใน member_in_room
            $data_update = [];

            $data_update[] = $user_id;
            $update_time_start = date("Y-m-d H:i:s");

            $update_than_2_time_start = null;
        }

        DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', $type_text],
                ])
            ->update([
                    'member_in_room' => $data_update,
                    'time_start' => $update_time_start,
                    'than_2_people_time_start' => $update_than_2_time_start,
                ]);

        return $data_update ;


    }

    function left_room_4(Request $request)
    {

        $sos_id = $request->sos_id;
        $user_id = $request->user_id;
        $type = $request->type;
        $leave = $request->leave;

        if($type == 'sos_1669'){
            $type_text = "meet_operating_1669";
        }else if($type == 'user_sos_1669'){
            $type_text = "user_sos_1669";
        }else{
            $type_text = "sos_map";
        }

        if($leave == "leave_fast"){

            $agora_chat_old = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
            $data_old = $agora_chat_old->member_in_room;

            $data_array = json_decode($data_old, true);
            // นับจำนวนข้อมูลใน $data_update

            if(!empty($data_array) ){
                // ใช้ array_filter เพื่อกรองข้อมูลที่ต้องการลบ
                $data_array = array_filter($data_array, function($value) use ($user_id) {
                    return $value != $user_id;
                });

                if (!empty($data_array)) {
                    // ใช้ array_values เพื่อรีเดิมดัชนีของอาร์เรย์ให้ต่อเนื่องโดยไม่มีช่องว่าง
                    $data_array = array_values($data_array);
                    // แปลงกลับเป็น JSON
                    $data_update = json_encode($data_array);
                    // นับจำนวนข้อมูลใน $data_update
                    $number_of_data = count($data_array);
                } else {
                    $data_update = null;
                }
            }else{
                $data_update = null;
            }

            DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', $type_text],
                ])
            ->update([
                    'member_in_room' => $data_update,
            ]);

            $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
            $data_new = $agora_chat->member_in_room;

            $check_time_Start = $agora_chat->time_start;
            $check_time_Start_2_people = $agora_chat->than_2_people_time_start;
            // นับจำนวนข้อมูลใน $data_update

            if(!empty($agora_chat->than_2_people_time_start)){
                if($number_of_data < 2){
                    $update_than_2_people_timemeet = null;
                    $date_now_2 = date("Y-m-d H:i:s");

                    $than_2_people_time_start = $agora_chat->than_2_people_time_start ;

                    $than_2_time_start_seconds = strtotime($than_2_people_time_start);
                    $date_now_seconds_2 = strtotime($date_now_2);
                    $seconds_passed_2 =  (int)$date_now_seconds_2 - (int)$than_2_time_start_seconds ;

                    $current_than_2_people_timemeet = (int)$seconds_passed_2;
                }else{
                    $current_than_2_people_timemeet = null;
                }

                if(!empty($agora_chat->than_2_people_timemeet) ){
                    $update_than_2_people_timemeet = (int)$agora_chat->than_2_people_timemeet + (int)$current_than_2_people_timemeet ;
                }else{
                    $update_than_2_people_timemeet = $current_than_2_people_timemeet ;
                }
            }

            if($data_new == null){
                $update_time_start = null ;

                $date_now = date("Y-m-d H:i:s");

                $time_start = $agora_chat->time_start;

                $time_start_seconds = strtotime($time_start);
                $date_now_seconds = strtotime($date_now);
                $seconds_passed =  (int)$date_now_seconds - (int)$time_start_seconds ;

                $update_total_timemeet = (int)$agora_chat->total_timemeet + (int)$seconds_passed ;

                $update_than_2_people_time_start = null;
            }else{
                $update_time_start = $agora_chat->time_start ;
                $update_total_timemeet = $agora_chat->total_timemeet ;

                if($number_of_data < 2){
                    //ลบ ข้อมูล than_2_people_time_start
                    $update_than_2_people_time_start = null;
                }else{
                    $update_than_2_people_time_start = $agora_chat->than_2_people_time_start;
                }
            }

            if (!empty($check_time_Start)) {
                DB::table('agora_chats')
                ->where([
                        ['sos_id', $sos_id],
                        ['room_for', $type_text],
                    ])
                ->update([
                        'time_start' => $update_time_start,
                        'total_timemeet' => $update_total_timemeet,
                    ]);
            }

            if (!empty($check_time_Start_2_people)) {
                DB::table('agora_chats')
                ->where([
                        ['sos_id', $sos_id],
                        ['room_for', $type_text],
                    ])
                ->update([
                        'than_2_people_timemeet' => $update_than_2_people_timemeet,
                        'than_2_people_time_start' => $update_than_2_people_time_start,
                    ]);
            }

        }else{
            $agora_chat_old = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
            $data_old = $agora_chat_old->member_in_room;

            $data_array = json_decode($data_old, true);
            // นับจำนวนข้อมูลใน $data_update

            if(!empty($data_array) ){
                // ใช้ array_filter เพื่อกรองข้อมูลที่ต้องการลบ
                $data_array = array_filter($data_array, function($value) use ($user_id) {
                    return $value != $user_id;
                });

                if (!empty($data_array)) {
                    // ใช้ array_values เพื่อรีเดิมดัชนีของอาร์เรย์ให้ต่อเนื่องโดยไม่มีช่องว่าง
                    $data_array = array_values($data_array);
                    // แปลงกลับเป็น JSON
                    $data_update = json_encode($data_array);
                    // นับจำนวนข้อมูลใน $data_update
                    $number_of_data = count($data_array);
                } else {
                    $data_update = null;
                }
            }else{
                $data_update = null;
            }

            DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', $type_text],
                ])
            ->update([
                    'member_in_room' => $data_update,
            ]);

            $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
            $data_new = $agora_chat->member_in_room;

            $check_time_Start = $agora_chat->time_start;
            $check_time_Start_2_people = $agora_chat->than_2_people_time_start;
            // นับจำนวนข้อมูลใน $data_update

            if(!empty($agora_chat->than_2_people_time_start)){
                if($number_of_data < 2){
                    $update_than_2_people_timemeet = null;
                    $date_now_2 = date("Y-m-d H:i:s");

                    $than_2_people_time_start = $agora_chat->than_2_people_time_start ;

                    $than_2_time_start_seconds = strtotime($than_2_people_time_start);
                    $date_now_seconds_2 = strtotime($date_now_2);
                    $seconds_passed_2 =  (int)$date_now_seconds_2 - (int)$than_2_time_start_seconds ;

                    $current_than_2_people_timemeet = (int)$seconds_passed_2;
                }else{
                    $current_than_2_people_timemeet = null;
                }

                if(!empty($agora_chat->than_2_people_timemeet) ){
                    $update_than_2_people_timemeet = (int)$agora_chat->than_2_people_timemeet + (int)$current_than_2_people_timemeet ;
                }else{
                    $update_than_2_people_timemeet = $current_than_2_people_timemeet ;
                }
            }

            if($data_new == null){
                $update_time_start = null ;

                $date_now = date("Y-m-d H:i:s");

                $time_start = $agora_chat->time_start;

                $time_start_seconds = strtotime($time_start);
                $date_now_seconds = strtotime($date_now);
                $seconds_passed =  (int)$date_now_seconds - (int)$time_start_seconds ;

                $update_total_timemeet = (int)$agora_chat->total_timemeet + (int)$seconds_passed ;

                $update_than_2_people_time_start = null;
            }else{
                $update_time_start = $agora_chat->time_start ;
                $update_total_timemeet = $agora_chat->total_timemeet ;

                if($number_of_data < 2){
                    //ลบ ข้อมูล than_2_people_time_start
                    $update_than_2_people_time_start = null;
                }else{
                    $update_than_2_people_time_start = $agora_chat->than_2_people_time_start;
                }
            }

            if (!empty($check_time_Start)) {
                DB::table('agora_chats')
                ->where([
                        ['sos_id', $sos_id],
                        ['room_for', $type_text],
                    ])
                ->update([
                        'time_start' => $update_time_start,
                        'total_timemeet' => $update_total_timemeet,
                    ]);
            }

            if (!empty($check_time_Start_2_people)) {
                DB::table('agora_chats')
                ->where([
                        ['sos_id', $sos_id],
                        ['room_for', $type_text],
                    ])
                ->update([
                        'than_2_people_timemeet' => $update_than_2_people_timemeet,
                        'than_2_people_time_start' => $update_than_2_people_time_start,
                    ]);
            }

            return "OK" ;
        }
    }

    function get_local_data_4(Request $request){
        $user_id = $request->user_id;
        $type = $request->type;
        $sos_id = $request->sos_id;

        if($type == 'sos_1669'){
            $data_sos = Sos_help_center::where('id',$sos_id)->first();
        }else if($type == 'user_sos_1669'){
            $data_sos = Sos_help_center::where('id',$sos_id)->first();
        }else{
            $data_sos = Sos_map::where('id',$sos_id)->first();
        }

        $local_data = User::where('id',$user_id)->first();

        $data = [];
        $data['photo'] = $local_data->photo;
        $data['avatar'] = $local_data->avatar;

        if($type == 'sos_1669'){
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                $data['user_type'] = "ศูนย์อำนวยการ";
                $data['name_user'] = $data_command->name_officer_command;
                // $data['unit'] = '';
            }else if(!empty($data_officer->name_officer)){
                $data['user_type'] = "หน่วยแพทย์ฉุกเฉิน";
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                $data['user_type'] = "--";
                $data['name_user'] = $local_data->name;
            }
        }else if($type == 'user_sos_1669'){
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                $data['user_type'] = "ศูนย์อำนวยการ";
                $data['name_user'] = $data_command->name_officer_command;
                // $data['unit'] = '';
            }else if(!empty($data_officer->name_officer)){
                $data['user_type'] = "หน่วยแพทย์ฉุกเฉิน";
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                $data['user_type'] = "--";
                $data['name_user'] = $local_data->name;
            }
        }else{
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $data_command->name_officer_command;
                // $data['unit'] = '';
            }else if(!empty($data_officer->name_officer)){
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $local_data->name;
            }
        }

        if (!empty($local_data->photo)) {
            $text_path_local = storage_path('app/public/' . $local_data->photo);
            $img_local = Image::make($text_path_local);

            // ต่อไปคุณสามารถทำตามโค้ดต่อไปเช่นเดียวกัน
            // โหลดข้อมูลขนาดของรูปภาพ
            $imageData_local = file_get_contents($text_path_local);
            list($width, $height) = getimagesizefromstring($imageData_local);

            // หาจุดตรงกลาง
            $centerX = $width / 2;
            $centerY = $height / 2;

            // ตรวจสอบสีที่จุดกึ่งกลางรูปถาพ
            $hexcolor = $img_local->pickColor($centerX, $centerY, 'hex');
            // $hexcolor = '#2b2d31';
        } else {
            $hexcolor = '#2b2d31';
        }

        $data['hexcolor'] = $hexcolor;
        return $data;
    }

    function get_remote_data_4(Request $request){
        $user_id = $request->user_id;
        $type = $request->type;
        $sos_id = $request->sos_id;

        if($type == 'sos_1669'){
            $data_sos = Sos_help_center::where('id',$sos_id)->first();
        }else if($type == 'user_sos_1669'){
            $data_sos = Sos_help_center::where('id',$sos_id)->first();
        }else{
            $data_sos = Sos_map::where('id',$sos_id)->first();
        }

        $remote_data = User::where('id',$user_id)->first();

        $data = [];
        $data['photo'] = $remote_data->photo;
        $data['avatar'] = $remote_data->avatar;

        if($type == 'sos_1669'){
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                $data['user_type'] = "ศูนย์อำนวยการ";
                $data['name_user'] = $data_command->name_officer_command;
                // $data['unit'] = '';
            }elseif(!empty($data_officer->name_officer)){
                $data['user_type'] = "หน่วยแพทย์ฉุกเฉิน";
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                $data['user_type'] = "--";
                $data['name_user'] = $remote_data->name;
            }
        }else if($type == 'sos_1669'){
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                $data['user_type'] = "ศูนย์อำนวยการ";
                $data['name_user'] = $data_command->name_officer_command;
                // $data['unit'] = '';
            }elseif(!empty($data_officer->name_officer)){
                $data['user_type'] = "หน่วยแพทย์ฉุกเฉิน";
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                $data['name_user'] = $remote_data->name;
            }
        }
        else{
            $data_command = Data_1669_officer_command::where('user_id',$user_id)->first();
            $data_officer = Data_1669_operating_officer::where('user_id',$user_id)->first();

            if(!empty($data_command->name_officer_command)){
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $data_command->name_officer_command;
            }else if(!empty($data_officer->name_officer)){
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $data_officer->name_officer;
                // $data['unit'] = $data_officer->operating_unit->name;
            }else{
                if($user_id == $data_sos->user_id){
                    $data['user_type'] = "ผู้ขอความช่วยเหลือ";
                }elseif($user_id == $data_sos->helper_id){
                    $data['user_type'] = "เจ้าหน้าที่";
                }else{
                    $data['user_type'] = "ศูนย์ควบคุม";
                }
                $data['name_user'] = $remote_data->name;
            }

        }

        if (!empty($remote_data->photo)) {
            $text_path_remote = storage_path('app/public/' . $remote_data->photo);
            $img_remote = Image::make($text_path_remote);

            // โหลดข้อมูลขนาดของรูปภาพ
            $imageData_remote = file_get_contents($text_path_remote);
            list($width, $height) = getimagesizefromstring($imageData_remote);
            // หาจุดตรงกลาง
            $centerX = $width / 2;
            $centerY = $height / 2;

            // ตรวจสอบสีที่จุดกึ่งกลางรูปถาพ
            $hexcolor = $img_remote->pickColor($centerX, $centerY, 'hex');

            // $hexcolor = '#2b2d31';
        } else {
            $hexcolor = '#2b2d26';
        }

        $data['hexcolor'] = $hexcolor;
        return $data;
    }

    function check_user_in_room_4(Request $request)
    {
        $sos_id = $request->sos_id;
        $type_sos = $request->type;

        $user_in_room = [];
        $user_in_room['data'] = 'ไม่มีข้อมูล';

        if($type_sos == 'sos_1669'){
            $type_text = "meet_operating_1669";
        }else if($type_sos == 'user_sos_1669'){
            $type_text = "user_sos_1669";
        }else{
            $type_text = "sos_map";
        }

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();

        if ( empty($agora_chat) ){
            $data_create = [];
            $data_create['room_for'] = $type_text; //สร้างตามประเภท
            $data_create['sos_id'] = $sos_id;

            Agora_chat::create($data_create);
            $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' ,$type_text)->first();
        }

        $user_in_room['data_agora'] = $agora_chat;

        // if( !empty($agora_chat->member_in_room) ){
        //     $data_member_in_room = $agora_chat->member_in_room;
        //     $data_member_in_room_exp = explode(",",$data_member_in_room);

        //     if( !empty($data_member_in_room_exp) ){
        //         $data_users = [];
        //         for ($ii=0; $ii < count($data_member_in_room_exp); $ii++) {
        //             $data_users[] = User::where('id' , $data_member_in_room_exp[$ii])->first();
        //         }
        //         $user_in_room['data'] = $data_users;
        //     }

        // }

        if( !empty($agora_chat->member_in_room) ){
            $data_member_in_room = $agora_chat->member_in_room;
            $check_array_user = json_decode($data_member_in_room, true);

            if( !empty($check_array_user) ){
                $data_users = [];
                for ($ii=0; $ii < count($check_array_user); $ii++) {
                    $data_users[] = User::where('id' , $check_array_user[$ii])->first();
                }
                $user_in_room['data'] = $data_users;
            }
        }

        if ($user_in_room['data'] != "ไม่มีข้อมูล") {
            if(empty($user_in_room['data']) || count($user_in_room['data']) < 4)
            {
                $user_in_room['status'] = "ok";
            }else{
                $user_in_room['status'] = "no";
            }
        } else {
            $user_in_room['status'] = "ok";
        }

        return $user_in_room;
    }

    function search_phone_niems($cityName){

        $data = [];

        $phone_niems = DB::table('phone_niems')->where('province', 'LIKE', "%$cityName%")->get();
        $province_ths = DB::table('province_ths')
            ->where('province_name',  $cityName)
            ->where('sos_1669_show',  "show")
            ->first();

        if(!empty($phone_niems)){
            $data['phone_niems'] = $phone_niems;
        }else{
           $data['phone_niems'] = "no";
        }

        if(!empty($province_ths)){
            $data['1669'] = $cityName;
        }else{
            $data['1669'] = "no";
        }

        return $data ;
    }

    function check_status_sos_video_call(Request $request){
        $sos_id = $request->sos_id;

        $sos_data = Sos_map::where('id',$sos_id)->first();

        if($sos_data->status == "เสร็จสิ้น"){
            return "yes";
        }else{
            return "no";
        }

    }

    function check_status_room(Request $request){

        $sos_id = $request->sos_id;
        $type_sos = $request->type;

        if($type_sos == 'sos_1669'){
            $type_text = "meet_operating_1669";
        }else if($type_sos == 'user_sos_1669'){
            $type_text = "user_sos_1669";
        }else{
            $type_text = "sos_map";
        }

        $sos_data = Agora_chat::where('sos_id',$sos_id)->where('room_for',$type_text)->first();

        return $sos_data;
    }

    function check_user_for_operation_meet(Request $request){

        $sos_id = $request->sos_id;
        $type_sos = "meet_operating_1669";
        $type_check = $request->type_check;

        $sos_data = Agora_chat::where('sos_id',$sos_id)->where('room_for',$type_sos)->first();

        $status_member = [];

        if($type_check == "from_yellow"){//จากหน้า from_yellow
            if (!empty($sos_data->member_in_room)) {
                $member_array = json_decode($sos_data->member_in_room, true);

                foreach ($member_array as $user_id) {
                    $data_command = Data_1669_officer_command::where('user_id', $user_id)->first();
                    // $data_officer = Data_1669_operating_officer::where('user_id', $user_id)->first();

                    if(!empty($data_command)){
                        $status_member[] = "command";
                    }else{
                        $status_member[] = "not_command";
                    }
                }
            } else {
                $status_member = null;
            }

            if (!empty($status_member)) {
                $has_officer = in_array("command", $status_member);
                $has_not_officer = in_array("not_command", $status_member);

                if ($has_officer && $has_not_officer) {
                    $result = "เจ้าหน้าที่ศูนย์สั่งการอยู่กับหน่วยอื่น";
                } elseif ($has_officer) {
                    $result = "มีเจ้าหน้าที่ศูนย์สั่งการอยู่อย่างเดียว";
                } elseif ($has_not_officer) {
                    $result = "do";
                } else {
                    $result = "else";
                }
            }else{
                $result = "ไม่มีใครอยู่ในห้องสนทนา";
            }

            return $result;

        }else if($type_check == "show_case"){ //จากหน้า show_case

            $user_id = $request->user_id;

            if (!empty($sos_data->member_in_room)) {
                $member_array = json_decode($sos_data->member_in_room, true);

                foreach ($member_array as $member) {
                    // $data_command = Data_1669_officer_command::where('user_id', $user_id)->first();
                    // $data_officer = Data_1669_operating_officer::where('user_id', $member)->first();

                    if($member == $user_id){
                        $status_member[] = "operating";
                    }else{
                        $status_member[] = "not_operating";
                    }
                }

            } else {
                $status_member = null;
            }

            if (!empty($status_member)) {
                $has_operating = in_array("operating", $status_member);
                $has_not_operating = in_array("not_operating", $status_member);

                if ($has_operating && $has_not_operating) {
                    $result = "เจ้าหน้าที่ปฎิบัติการอยู่กับหน่วยอื่น";
                } elseif ($has_operating) {
                    $result = "มีเจ้าหน้าที่ปฎิบัติการอยู่อย่างเดียว";
                } elseif ($has_not_operating) {
                    $result = "do";
                } else {
                    $result = "else";
                }
            }else{
                $result = "ไม่มีใครอยู่ในห้องสนทนา";
            }

            return $result;
        }

    }

    function check_delete_member(Request $request){
            // If you prefer using $_POST
        // $data = $_POST['data']; // Assuming 'data' is the parameter you are sending

        // Alternatively, using file_get_contents("php://input")
        $data = file_get_contents("php://input");

        // Decode the JSON data if it is JSON
        $data_array = json_decode($data, true);

        // Access the data as needed
        $sos_id = $data_array['sos_id'];
        $user_id = $data_array['user_id'];
        $type = $data_array['type'];

        // Your existing logic here...

        if ($type == 'sos_1669') {
            $type_text = "meet_operating_1669";
        }else if($type == 'user_sos_1669'){
            $type_text = "user_sos_1669";
        } else {
            $type_text = "sos_map";
        }


        $agora_chat_old = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
        $data_old = $agora_chat_old->member_in_room;

        $data_array = json_decode($data_old, true);
        // นับจำนวนข้อมูลใน $data_update

        if(!empty($data_array) ){
            // ใช้ array_filter เพื่อกรองข้อมูลที่ต้องการลบ
            $data_array = array_filter($data_array, function($value) use ($user_id) {
                return $value != $user_id;
            });

            if (!empty($data_array)) {
                // ใช้ array_values เพื่อรีเดิมดัชนีของอาร์เรย์ให้ต่อเนื่องโดยไม่มีช่องว่าง
                $data_array = array_values($data_array);
                // แปลงกลับเป็น JSON
                $data_update = json_encode($data_array);
                // นับจำนวนข้อมูลใน $data_update
                $number_of_data = count($data_array);
            } else {
                $data_update = null;
            }
        }else{
            $data_update = null;
        }

        DB::table('agora_chats')
        ->where([
                ['sos_id', $sos_id],
                ['room_for', $type_text],
            ])
        ->update([
                'member_in_room' => $data_update,
        ]);

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
        $data_new = $agora_chat->member_in_room;

        $check_time_Start = $agora_chat->time_start;
        $check_time_Start_2_people = $agora_chat->than_2_people_time_start;
        // นับจำนวนข้อมูลใน $data_update

        if(!empty($agora_chat->than_2_people_time_start)){
            if($number_of_data < 2){
                $update_than_2_people_timemeet = null;
                $date_now_2 = date("Y-m-d H:i:s");

                $than_2_people_time_start = $agora_chat->than_2_people_time_start ;

                $than_2_time_start_seconds = strtotime($than_2_people_time_start);
                $date_now_seconds_2 = strtotime($date_now_2);
                $seconds_passed_2 =  (int)$date_now_seconds_2 - (int)$than_2_time_start_seconds ;

                $current_than_2_people_timemeet = (int)$seconds_passed_2;
            }else{
                $current_than_2_people_timemeet = null;
            }

            if(!empty($agora_chat->than_2_people_timemeet) ){
                $update_than_2_people_timemeet = (int)$agora_chat->than_2_people_timemeet + (int)$current_than_2_people_timemeet ;
            }else{
                $update_than_2_people_timemeet = $current_than_2_people_timemeet ;
            }
        }

        if($data_new == null){
            $update_time_start = null ;

            $date_now = date("Y-m-d H:i:s");

            $time_start = $agora_chat->time_start;

            $time_start_seconds = strtotime($time_start);
            $date_now_seconds = strtotime($date_now);
            $seconds_passed =  (int)$date_now_seconds - (int)$time_start_seconds ;

            $update_total_timemeet = (int)$agora_chat->total_timemeet + (int)$seconds_passed ;

            $update_than_2_people_time_start = null;
        }else{
            $update_time_start = $agora_chat->time_start ;
            $update_total_timemeet = $agora_chat->total_timemeet ;

            if($number_of_data < 2){
                //ลบ ข้อมูล than_2_people_time_start
                $update_than_2_people_time_start = null;
            }else{
                $update_than_2_people_time_start = $agora_chat->than_2_people_time_start;
            }
        }

        if (!empty($check_time_Start)) {
            DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', $type_text],
                ])
            ->update([
                    'time_start' => $update_time_start,
                    'total_timemeet' => $update_total_timemeet,
                ]);
        }

        if (!empty($check_time_Start_2_people)) {
            DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', $type_text],
                ])
            ->update([
                    'than_2_people_timemeet' => $update_than_2_people_timemeet,
                    'than_2_people_time_start' => $update_than_2_people_time_start,
                ]);
        }

        return "OK" ;

    }

    function after_video_call(){
        return view('video_call_4/after_video_call');
    }

}
