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

    public function pc_index(Request $request ,$type,$sos_id)
    {
        $user = Auth::user();

        $requestData = $request->all();

        // $appId = $requestData['appId'];
        // $appCertificate =  $requestData['appCertificate'];

        $sos_data  = Sos_help_center::join('sos_1669_form_yellows', 'sos_help_centers.id', '=', 'sos_1669_form_yellows.sos_help_center_id')
        ->where('sos_help_centers.id',$sos_id)
        ->first();

        $useSpeaker = $requestData['useSpeaker'];
        $useMicrophone = $requestData['useMicrophone'];
        $useCamera = $requestData['useCamera'];

        $videoTrack = $requestData['videoTrack'];
        $audioTrack = $requestData['audioTrack'];

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');

        return view('video_call_4/pc_video_call_4', compact('user','appID','appCertificate','videoTrack','audioTrack','sos_id','useSpeaker','useMicrophone','useCamera','type','sos_data'));

    }

    public function mobile_index(Request $request ,$sos_id)
    {
        return view('video_call_4/mobile_video_call_4');
    }

    public function token(Request $request)
    {
        // $appID = $request->appId;
        // $appCertificate = $request->appCertificate;

        // $appID = env('AGORA_APP_ID_MITHCARE');
        // $appCertificate = env('AGORA_APP_CERTIFICATE_MITHCARE');

        $appID = "acb41870f41c48d4a42b7b0ef1532351";
        $appCertificate = "41aa313ac49f4e3d81f1a3056e122ca0";

        // if(strlen($appID) < 32){
        //     $appID = env('AGORA_APP_ID');
        //     $appCertificate = env('AGORA_APP_CERTIFICATE');
        // }

        $data_user = User::where('id' ,$request->user_id)->first();

        $user = $data_user->id;
        $channelName = 'sos_4';
        // $channelName = 'sos_1669_id';

        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 600;
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
        //
    }

    function left_room_4(Request $request)
    {
        //
    }

    function get_local_data_4(Request $request){
        $user_id = $request->user_id;

        $local_data = User::where('id',$user_id)->first();

        $text_path = url('storage') . '/' . $local_data->photo;
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

        $local_data['hexcolor'] = $hexcolor;
        return $local_data;
    }

    function get_remote_data_4(Request $request){
        $user_id = $request->user_id;

        $remote_data = User::where('id',$user_id)->first();

        $text_path = url('storage') . '/' . $remote_data->photo;
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

        $remote_data['hexcolor'] = $hexcolor;
        return $remote_data;
    }

    function check_user_in_room_4(Request $request)
    {
       //
    }


}
