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

        return view('video_call_4/video_call_4', compact('sos_id','user','appID','appCertificate'));

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


}
