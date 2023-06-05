<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
use Willywes\AgoraSDK\RtcTokenBuilder;

class AgoraController extends Controller
{
    public function index(Request $request)
    {
        $sos_id = $request->sos_id;

        // fetch all users apart from the authenticated user
        // $users = User::where('id', '<>', Auth::id())->get();


        return view('sos_help_center/user_video_call', compact('sos_id'));
        
    }

    public function token(Request $request)
    {
        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

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
}