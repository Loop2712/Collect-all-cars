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

class AgoraController extends Controller
{
    // // // // -------- // // // //
    // // // // SOS 1669 // // // //
    // // // // -------- // // // //

    public function get_appId()
    {
        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        $data = [] ;
        $data['appId'] = $appID ;
        $data['appCertificate'] = $appCertificate ;

        return $data ;
    }
    public function index(Request $request)
    {
        $sos_id = $request->sos_id;
        $user = Auth::user();

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        $data_sos = Sos_help_center::where('sos_help_centers.id', $sos_id)->first();
        $data_officer_command = Data_1669_officer_command::where('id',$data_sos->command_by)->first();

        return view('sos_help_center/user_video_call', compact('sos_id','user','data_sos','data_officer_command','appID','appCertificate'));
        
    }

    public function token(Request $request)
    {
        // $appID = $request->appId;
        // $appCertificate = $request->appCertificate;

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        $data_user = User::where('id' ,$request->user_id)->first();

        $user = $data_user->id;
        $channelName = 'sos_1669_id_' . $request->sos_1669_id;
        // $channelName = 'sos_1669_id';

        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 1200;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        return $token;
    }

    public function callUser(Request $request)
    {

        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = Auth::id();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }

    function check_user_in_room(Request $request)
    {
        $sos_id = $request->sos_1669_id;
        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        $user_in_room = [];
        $user_in_room['data'] = 'ไม่มีข้อมูล';

        if ( empty($agora_chat) ){
            $data_create = [];
            $data_create['room_for'] = 'user_sos_1669';
            $data_create['sos_id'] = $sos_id;

            Agora_chat::create($data_create);
            $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();
        }

        $user_in_room['data_agora'] = $agora_chat;

        if( !empty($agora_chat->member_in_room) ){
            $data_member_in_room = $agora_chat->member_in_room;

            $data_array = json_decode($data_member_in_room, true);
            $check_user = $data_array['user'];

            if( !empty($check_user) ){
                $user_in_room['data'] = User::where('id' , $check_user)->first();
            }
        }

        return $user_in_room ;
    }

    function check_command_in_room(Request $request){

        $sos_id = $request->sos_1669_id;
        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        $command_in_room = [];
        $command_in_room['data'] = 'ไม่มีข้อมูล';

        if( !empty($agora_chat->member_in_room) ){
            $data_member_in_room = $agora_chat->member_in_room;

            $data_array = json_decode($data_member_in_room, true);
            $check_command = $data_array['command'];

            if( !empty($check_command) ){
                $command_in_room['data'] = Data_1669_officer_command::where('user_id' , $check_command)->first();
            }
        }

        return $command_in_room ;

    }

    function join_room(Request $request)
    {
        $sos_id = $request->sos_1669_id;
        $user_id = $request->user_id;
        $type = $request->type;

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        if ( !empty($agora_chat->member_in_room) ){
            // มีข้อมูล ใน member_in_room
            if($type == 'command_join'){
                $data_update = $agora_chat->member_in_room;

                $data_array = json_decode($data_update, true);
                $data_array['command'] = $user_id;

                // แปลงกลับเป็น JSON
                $data_update = json_encode($data_array);
            }else{
                $data_update = $agora_chat->member_in_room;

                $data_array = json_decode($data_update, true);
                $data_array['user'] = $user_id;

                // แปลงกลับเป็น JSON
                $data_update = json_encode($data_array);
            }

            $update_time_start = $agora_chat->time_start ;

        }else{
            // ไม่มีข้อมูล ใน member_in_room
            $data_update = [];
            if($type == 'command_join'){
                $data_update['command'] = $user_id ;
                $data_update['user'] = '' ; 
            }else{
                $data_update['user'] = $user_id ;
                $data_update['command'] = '' ; 
            }

            $update_time_start = date("Y-m-d H:i:s");
        }

        DB::table('agora_chats')
            ->where([ 
                    ['sos_id', $sos_id],
                    ['room_for', 'user_sos_1669'],
                ])
            ->update([
                    'member_in_room' => $data_update,
                    'time_start' => $update_time_start,
                ]);

        $agora_chat_last = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        $check_data_array = [];
        $check_data_array['data'] = 'ไม่มีข้อมูล' ;
        $check_data_array['data_agora'] = $agora_chat_last ;

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

    function left_room(Request $request)
    {
        $sos_id = $request->sos_1669_id;
        $user_id = $request->user_id;
        $type = $request->type;

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

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
                    ['room_for', 'user_sos_1669'],
                ])
            ->update([
                    'member_in_room' => $data_update,
                    'time_start' => $update_time_start,
                    'total_timemeet' => $update_total_timemeet,
                    'than_2_people_timemeet' => $update_than_2_people_timemeet,
                ]);

        $agora_chat_last = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

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

    function get_data_command_adn_user(Request $request)
    {
        $sos_id = $request->sos_1669_id;

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        if( !empty($agora_chat->member_in_room) ){

            $data_member_in_room = $agora_chat->member_in_room;
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
    // // // // // ------------ // // // // //
    // // // // // END SOS 1669 // // // // //
    // // // // // ------------ // // // // //


    // // // // // ---------------- // // // // //
    // // // // // SOS 1669 COMPANY // // // // //
    // // // // // ---------------- // // // // //

    public function index_sos_map(Request $request)
    {
        $sos_id = $request->sos_id;
        $user = Auth::user();

        $data_sos = Sos_map::where('id', $sos_id)->first();

        return view('sos_map/agora_chat/video_call', compact('sos_id','user','data_sos'));
        
    }

    // // // // // -------------------- // // // // //
    // // // // // END SOS 1669 COMPANY // // // // //
    // // // // // -------------------- // // // // //
}