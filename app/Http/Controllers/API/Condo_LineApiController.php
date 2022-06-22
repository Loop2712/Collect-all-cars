<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog_condo;
use App\Models\Condo_LineMessagingAPI;
use App\Models\Group_line;
use App\Models\Sos_map;
use App\Models\Partner;
use App\Models\Partner_condo;
use App\User;

class Condo_LineApiController extends Controller
{
    public function store(Request $request)
	{
        //SAVE LOG
        $requestData = $request->all();

        //GET ONLY FIRST EVENT
        $event = $requestData["events"][0];

        // หาว่าเป็นข้อความที่ส่งมาจากไลน์ไหน
        $data_postback_explode = explode("From_LINE=",$event["postback"]["data"]);
        $From_LINE = $data_postback_explode[1] ;
        // ข้อมูลไลน์คอนโด
        $data_line_condos = Partner_condo::where('id' , $From_LINE)->get();

        $data = [
            "title" => "LINE INPUT",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
            "condo_id" => $From_LINE,
        ];
        Mylog_condo::create($data);  

        switch($event["type"]){
            case "message" : 
                $this->messageHandler($event);
                break;
            case "postback" : 
                $this->postbackHandler($event , $data_line_condos);
                break;
            case "join" :
                $this->save_group_line($event);
                break;
            case "follow" :
                $this->user_follow_line($event);
                // DB::table('users')
                //     ->where([ 
                //             ['type', 'line'],
                //             ['provider_id', $event['source']['userId']],
                //             ['status', "active"] 
                //         ])
                //     ->update(['add_line' => 'Yes']);
                break;
        }
	}

	public function messageHandler($event)
    {
        switch($event["message"]["type"]){
            case "text" : 
                $this->textHandler($event);
                break;
        }   

    }

    public function postbackHandler($event, $data_line_condos)
    {
        $line_condo = new Condo_LineMessagingAPI();
    	
        $data_postback_explode = explode("From_LINE=",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "อื่นๆ" :  
                $line_condo->replyToUser($data_line_condos, $event, "other");
                break;
        }   

    }

    public function textHandler($event)
    {
        $line_condo = new Condo_LineMessagingAPI();

        switch( $event["message"]["text"] )
        {     
            // case "อื่นๆ" :  
            //     $line_condo->replyToUser(null, $event, "other");
            //     break;
            // case "ข่าวสาร" :  
            //     $line_condo->replyToUser(null, $event, "vnews");
            //     break;
        }   

        // if ($event["message"]["text"] == "ติดต่อ ViiCHECK") {
        //     $line_condo->replyToUser(null, $event, "contact_viiCHECK");
        // }else {

        //     $data_users = DB::table('users')
        //         ->where('provider_id', $event["source"]['userId'])
        //         ->where('status', "active")
        //         ->get();

        //     foreach ($data_users as $data_user) {
        //         if (!empty($data_user->language)) {
        //             $user_language = $data_user->language ;
        //             if ($user_language == "zh-TW") {
        //                 $user_language = "zh_TW";
        //             }
        //             if ($user_language == "zh-CN") {
        //                 $user_language = "zh_CN";
        //             }
        //         }else{
        //             $user_language = 'en' ;
        //         }
        //     }
            
        //     $text_topic = DB::table('text_topics')
        //         ->select('th')
        //         ->where($user_language, $event["message"]["text"])
        //         ->get();

        //     foreach ($text_topic as $item) {
        //         $text_th = $item->th ;
        //     }
        
        //     switch( strtolower($text_th) )
        //     {     
        //         case "อื่นๆ" :  
        //             $line_condo->replyToUser(null, $event, "other");
        //             break;
        //         case "ข่าวสาร" :  
        //             $line_condo->replyToUser(null, $event, "vnews");
        //             break;
        //     }   
        // }
    }

    public function save_group_line($event)
    {
        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
            ]
        ];

        $group_id = $event['source']['groupId'];

        $context  = stream_context_create($opts);
        $url = "https://api.line.me/v2/bot/group/".$group_id."/summary";
        $result = file_get_contents($url, false, $context);

        $data_group_line = json_decode($result);

        $save_name_group = [
            "groupId" => $data_group_line->groupId,
            "groupName" => $data_group_line->groupName,
            "pictureUrl" => $data_group_line->pictureUrl,
            "time_zone" => "Asia/Bangkok",
            "language" => "en",
        ];
        
        Group_line::firstOrCreate($save_name_group);

        $data = [
            "title" => "บันทึก Name Group Line",
            "content" => $data_group_line->groupName,
        ];
        Mylog_condo::create($data);

        $line_condo = new Condo_LineMessagingAPI();
        $line_condo->send_HelloLinegroup($event,$save_name_group);

    }

    public function user_follow_line($event)
    {
        $provider_id = $event['source']['userId'];

        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => 'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);

        $url = "https://api.line.me/v2/bot/profile/".$provider_id;
        $result = file_get_contents($url, false, $context);

        $data_result = json_decode($result);

        //SAVE LOG
        $data = [
            "title" => "ตรวจสอบภาษาเครื่องผู้ใช้",
            "content" => $data_result->displayName . "-" . $data_result->language,
        ];
        Mylog_condo::create($data);

        $data_users = DB::table('users')
                ->where('provider_id', $provider_id)
                ->where('status', "active")
                ->get();

        if (!empty($data_users[0])) {
            // เช็คภาษาของ User
            $this->check_language_user($data_users);
        }else {
            // ตั้งค่าริชเมนูเริ่มต้น
            $this->set_richmanu_start($provider_id , $data_result->language);
        }

    }


    public function set_richmanu_language($data_user, $data_condos, $rich_menu_language)
    {
        $provider_id = $data_user->provider_id ;

        switch ($rich_menu_language) {
            case 'th':
                $richMenuId = $data_condos->rich_menu_TH ;
                break;
            case 'en':
                $richMenuId = $data_condos->rich_menu_EN ;
                break;
            case 'zh-TW':
                $richMenuId = $data_condos->rich_menu_zh_TW ;
                break;
            case 'zh-CN':
                $richMenuId = $data_condos->rich_menu_zh_CN ;
                break;
        }

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($data_condos->channel_access_token);
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $data_condos->channel_secret]);
        $response = $bot->linkRichMenu($provider_id, $richMenuId);

        $data = [
            "title" => "set_richmanu_" . $rich_menu_language,
            "content" => $provider_id . "-" . $data_user->name . "(" . $data_user->id . ")",
            "condo_id" => $data_condos->id,
        ];
        Mylog_condo::create($data);
    }

    public function check_add_line($id_user)
    {
        $data_user = DB::table('users')
            ->where('id', $id_user)
            ->get();

        return $data_user;
    }

}
