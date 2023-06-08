<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Data_1669_officer_command;
use App\Models\Sos_help_center;
use App\Models\Agora_chat;

// use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
use Willywes\AgoraSDK\RtcTokenBuilder;

class AgoraController extends Controller
{
    public function index(Request $request)
    {
        $sos_id = $request->sos_id;
        $user = Auth::user();

        $data_sos = Sos_help_center::where('sos_help_centers.id', $sos_id)->first();
        $data_officer_command = Data_1669_officer_command::where('id',$data_sos->command_by)->first();

        return view('sos_help_center/user_video_call', compact('sos_id','user','data_sos','data_officer_command'));
        
    }

    public function token(Request $request)
    {
        $appID = $request->appId;
        $appCertificate = $request->appCertificate;

        $data_user = User::where('id' ,$request->user_id)->first();

        $user = $data_user->id;
        // $channelName = 'sos_1669_id_' . $request->sos_1669_id;
        $channelName = 'sos_1669_id';

        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 600;
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

        $user_in_room = '';
        $data_member_in_room = $agora_chat->member_in_room;

        $data_array = json_decode($data_member_in_room, true);
        $check_user = $data_array['user'];

        if( !empty($check_user) ){
            $user_in_room = User::where('id' , $check_user)->first();
        }

        return $user_in_room ;
    }

    function join_room(Request $request)
    {
        $sos_id = $request->sos_1669_id;
        $user_id = $request->user_id;
        $type = $request->type;

        $agora_chat = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        if ( !empty($agora_chat->member_in_room) ){
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
        }else{
            $data_update = [];
            if($type == 'command_join'){
                $data_update['command'] = $user_id ;
                $data_update['user'] = '' ; 
            }else{
                $data_update['user'] = $user_id ;
                $data_update['command'] = '' ; 
            }
        }

        DB::table('agora_chats')
            ->where([ 
                    ['sos_id', $sos_id],
                    ['room_for', 'user_sos_1669'],
                ])
            ->update([
                    'member_in_room' => $data_update,
                ]);

        $agora_chat_last = Agora_chat::where('sos_id' , $sos_id)->where('room_for' , 'user_sos_1669')->first();

        $user_in_room = '';
        $data_member_in_room = $agora_chat_last->member_in_room;

        $data_array_last = json_decode($data_member_in_room, true);
        $check_user = $data_array_last['user'];

        if( !empty($check_user) ){
            $user_in_room = User::where('id' , $check_user)->first();
        }

        return $user_in_room ;
    }
}