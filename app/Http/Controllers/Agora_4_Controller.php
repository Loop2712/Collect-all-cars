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

// use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
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
        // $sos_id = $request->sos_id;
        $sos_id = 555;
        $consult_doctor_id = 123;
        $request->user_to_call;

        return view('video_call_4/before_video_call_4', compact('user','appId','appCertificate','sos_id','consult_doctor_id'));

    }

    public function index(Request $request ,$sos_id)
    {
        $user = Auth::user();

        $requestData = $request->all();

        // $appId = $requestData['appId'];
        // $appCertificate =  $requestData['appCertificate'];
        // $sos_id = $requestData['sos_id'];

        $videoTrack = $requestData['videoTrack'];
        $audioTrack = $requestData['audioTrack'];

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        return view('video_call_4/video_call_4', compact('user','appID','appCertificate','videoTrack','audioTrack','sos_id'));

    }

    public function token(Request $request)
    {
        // $appID = $request->appId;
        // $appCertificate = $request->appCertificate;

        //============ Viicheck appID & appCertificate =============
        // $appID = "03039c40792e46bdbe46c16b1a338303";
        // $appCertificate = "cf9986c91db74f16879deead4a34dd03";

        //============ Mithcare appID & appCertificate =============
        $appID = "acb41870f41c48d4a42b7b0ef1532351";
        $appCertificate = "41aa313ac49f4e3d81f1a3056e122ca0";

        if(strlen($appID) < 32){
            $appID = env('AGORA_APP_ID');
            $appCertificate = env('AGORA_APP_CERTIFICATE');
        }

        $data_user = User::where('id' ,$request->user_id)->first();

        $user = $data_user->id;
        $channelName = 'sos_4';
        // $channelName = 'sos_1669_id';

        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 30;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        $agora_data = [
            'token' => $token,
            'privilegeExpiredTs' => $privilegeExpiredTs,
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
      //============== ยังไม่ได้ดำเนินการ ===============//
    }

    function left_room_4(Request $request)
    {
        $sos_id = $request->sos_1669_id;
        $user_id = $request->user_id;
        $type = $request->type;

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'meet_operating_1669')->first();

        // เวลาของการสนทนาตั้งแต่ 2 คนขึ้นไป
        if( !empty($agora_chat->than_2_people_timemeet) ){
            $update_than_2_people_timemeet = $agora_chat->than_2_people_timemeet ;
        }else{
            $update_than_2_people_timemeet = null ;
        }

        if( !empty($request->meet_2_people) ){

            $meet_2_people = $request->meet_2_people;
            $hours = $request->hours;
            $minutes = $request->minutes;
            $seconds = $request->seconds;

            if($meet_2_people == 'Yes'){
                $update_than_2_people_timemeet =  (int)($hours / 3600) + (int)($minutes / 60) + $seconds ;
            }else{
                $update_than_2_people_timemeet = null ;
            }

            if( !empty($agora_chat->than_2_people_timemeet) ){
                $update_than_2_people_timemeet = (int)$agora_chat->than_2_people_timemeet + (int)$update_than_2_people_timemeet ;
            }else{
                $update_than_2_people_timemeet = $update_than_2_people_timemeet ;
            }

        }

        if($type == 'command_left'){
            $data_old = $agora_chat->member_in_room;

            $data_array = json_decode($data_old, true);

            if( !empty($data_array['user']) ){
                $data_array['command'] = '';
                // แปลงกลับเป็น JSON
                $data_update = json_encode($data_array);
            }else{
                $data_update = null;
            }

        }else{
            $data_old = $agora_chat->member_in_room;

            $data_array = json_decode($data_old, true);

            if( !empty($data_array['command']) ){
                $data_array['user'] = '';
                // แปลงกลับเป็น JSON
                $data_update = json_encode($data_array);
            }else{
                $data_update = null;
            }

        }

        if($data_update == null){
            $update_time_start = null ;

            $date_now = date("Y-m-d H:i:s");
            $time_start = $agora_chat->time_start ;

            $time_start_seconds = strtotime($time_start);
            $date_now_seconds = strtotime($date_now);
            $seconds_passed =  (int)$date_now_seconds - (int)$time_start_seconds ;

            $update_total_timemeet = (int)$agora_chat->total_timemeet + (int)$seconds_passed ;
        }else{
            $update_time_start = $agora_chat->time_start ;
            $update_total_timemeet = $agora_chat->total_timemeet ;
        }

        DB::table('agora_chats')
            ->where([
                    ['sos_id', $sos_id],
                    ['room_for', 'meet_operating_1669'],
                ])
            ->update([
                    'member_in_room' => $data_update,
                    'time_start' => $update_time_start,
                    'total_timemeet' => $update_total_timemeet,
                    'than_2_people_timemeet' => $update_than_2_people_timemeet,
                ]);

        $agora_chat_last = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'meet_operating_1669')->first();

        $check_data_array = [];
        $check_data_array['data'] = 'ไม่มีข้อมูล' ;

        if( !empty($agora_chat_last->member_in_room) ){

            $data_member_in_room = $agora_chat_last->member_in_room;
            $check_data_array['data'] = json_decode($data_member_in_room, true);

            $check_user = $check_data_array['data']['user'];
            $check_command = $check_data_array['data']['command'];

            if( !empty($check_user) ){
                $check_data_array['data_user'] = User::where('id' , $check_user)->first();
            }

            if( !empty($check_command) ){
                $check_data_array['data_command'] = User::where('id' , $check_command)->first();
            }
        }

        return $check_data_array ;

    }

    // function check_user_in_room_4(Request $request)
    // {
    //     $sos_id = $request->sos_1669_id;
    //     $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'meet_operating_1669')->first();

    //     $user_in_room = [];
    //     $user_in_room['data'] = 'ไม่มีข้อมูล';

    //     if ( empty($agora_chat) ){
    //         $data_create = [];
    //         $data_create['room_for'] = 'meet_operating_1669';
    //         $data_create['sos_id'] = $sos_id;

    //         Agora_chat::create($data_create);
    //         $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'meet_operating_1669')->first();
    //     }

    //     $user_in_room['data_agora'] = $agora_chat;

    //     if( !empty($agora_chat->member_in_room) ){
    //         $data_member_in_room = $agora_chat->member_in_room;

    //         $data_array = json_decode($data_member_in_room, true);
    //         $check_user = $data_array['user'];

    //         if( !empty($check_user) ){
    //             $user_in_room['data'] = User::where('id' , $check_user)->first();
    //         }
    //     }

    //     return $user_in_room ;
    // }


}
