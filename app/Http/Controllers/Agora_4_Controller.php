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

        $consult_doctor_id = 123;
        $request->user_to_call;


        //ตรวจอุปกรณ์
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // ตรวจสอบชนิดของอุปกรณ์
        if (preg_match('/android/i', $userAgent)) {
            $type_device = "mobile_video_call";
        }
        else if (preg_match('/iPad|iPhone|iPod/', $userAgent) && !strpos($userAgent, 'MSStream')) {
            $type_device = "mobile_video_call";
        }
        else{
            $type_device = "pc_video_call";
        }

        return view('video_call_4/before_video_call_4', compact('user','appId','appCertificate','sos_id','consult_doctor_id','type','type_device'));

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

        return view('video_call_4/pc_video_call_4', compact('user','appID','appCertificate','videoTrack','audioTrack','sos_id','useSpeaker','useMicrophone','useCamera','type','sos_data','role_permission','groupId'));

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


        return view('video_call_4/mobile_video_call_4' , compact('user','appID','appCertificate','videoTrack','audioTrack','sos_id','useSpeaker','useMicrophone','useCamera','type','sos_data','role_permission','groupId'));
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
        //
    }

    function left_room_4(Request $request)
    {
        //
    }

    function get_local_data_4(Request $request){
        $user_id = $request->user_id;
        $type = $request->type;
        $sos_id = $request->sos_id;

        if($type == 'sos_1669'){
            $data_sos = Sos_help_center::where('id',$sos_id)->first();
        }else{
            $data_sos = Sos_map::where('id',$sos_id)->first();
        }

        $local_data = User::where('id',$user_id)->first();

        $data = [];
        $data['photo'] = $local_data->photo;
        $data['avatar'] = $local_data->avatar;
        echo $local_data->photo;
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
            // $text_path = url('storage') . '/' . $local_data->photo;
            $text_path = "https://www.viicheck.com/storage/".$local_data->photo;
            $img = Image::make( $text_path );
            // get file path
            $aaa = $img->basePath();
            // โหลดข้อมูลขนาดของรูปภาพ
            list($width, $height) = getimagesize($text_path);

            // หาจุดตรงกลาง
            $centerX = $width / 2;
            $centerY = $height / 2;

            // ตรวจสอบสีที่จุดกึ่งกลางรูปถาพ
            $hexcolor = $img->pickColor($centerX, $centerY, 'hex');
            $hexcolor = '#2b2d31';
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
        }else{
            $data_sos = Sos_map::where('id',$sos_id)->first();
        }

        $remote_data = User::where('id',$user_id)->first();

        $data = [];
        $data['photo'] = $remote_data->photo;
        $data['avatar'] = $remote_data->avatar;
        echo $remote_data->photo;
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
            // $text_path = url('storage') . '/' . $remote_data->photo;
            $text_path = "https://www.viicheck.com/storage/".$remote_data->photo;
            $img = Image::make( $text_path );
            // get file path
            $aaa = $img->basePath();
            // โหลดข้อมูลขนาดของรูปภาพ
            list($width, $height) = getimagesize($text_path);

            // หาจุดตรงกลาง
            $centerX = $width / 2;
            $centerY = $height / 2;

            // ตรวจสอบสีที่จุดกึ่งกลางรูปถาพ
            $hexcolor = $img->pickColor($centerX, $centerY, 'hex');
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

        if($type_sos == 'sos_1669'){
            $type_text = "meet_operating_1669";
        }else{
            $type_text = "sos_map";
        }

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , $type_text)->first();
        $agora_chat_people = 0;
        // if($agora_chat->member_in_room < 4 || $agora_chat->member_in_room == null)
        if($agora_chat_people < 4)
        {
            $check_status = "ok";
        }else{
            $check_status = "no";
        }

        return $check_status;
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

}
