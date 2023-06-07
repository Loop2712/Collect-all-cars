<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Data_1669_officer_command;
use App\Models\Sos_help_center;

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
        $channelName = 'sos_1669_id_' . $request->sos_1669_id;

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

    function command_video_call(Request $request)
    {

    }
}