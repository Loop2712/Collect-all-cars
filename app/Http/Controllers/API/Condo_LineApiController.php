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
use App\Models\User_condo;

class Condo_LineApiController extends Controller
{
    public function store(Request $request)
	{
        //SAVE LOG
        $requestData = $request->all();

        //GET ONLY FIRST EVENT
        $event = $requestData["events"][0];
        $condo_id = $requestData["condo_id"];

        $data = [
            "title" => "LINE INPUT",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
            "condo_id" => $condo_id,
        ];
        Mylog_condo::create($data);  

        switch($event["type"]){
            case "message" : 
                $this->messageHandler($event , $condo_id);
                break;
            case "postback" : 
                $this->postbackHandler($event , $condo_id);
                break;
            // case "join" :
            //     $this->save_group_line($event);
            //     break;
            case "follow" :
                // SET RICH MENU LINE
                $this->set_richmanu_language($event["source"]['userId'], $condo_id);
                break;
        }
	}

	public function messageHandler($event , $condo_id)
    {
        switch($event["message"]["type"]){
            case "text" : 
                $this->textHandler($event , $condo_id);
                break;
        } 

    }

    public function postbackHandler($event , $condo_id)
    {
        $line_condo = new Condo_LineMessagingAPI();

        $data_postback_explode = explode("?",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "อื่นๆ" :  
                $line_condo->replyToUser($data_line_condos, $event, "other");
                break;
        }  

    }

    public function textHandler($event , $condo_id)
    {
        $line_condo = new Condo_LineMessagingAPI();

        switch( $event["message"]["text"] )
        {     
            case "สวัสดีครับ" :  
                $line_condo->replyToUser($event , $condo_id , "hello");
                break;
            // case "ข่าวสาร" :  
            //     $line_condo->replyToUser(null, $event, "vnews");
            //     break;
        }   

    }

    public function set_richmanu_language($provider_id, $condo_id)
    {
        $data_user = User::where('provider_id' , $provider_id)->first();
        $user_condos = User_condo::where('user_id' , $data_user->id)->where('condo_id' , $condo_id)->first();
        $data_condos = Partner_condo::where('id' , $condo_id)->first();

        $rich_menu_language = $user_condos->rich_menu_language ;

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
            "content" => $provider_id . " / " . $data_user->name . "(" . $data_user->id . ")",
            "condo_id" => $data_condos->id,
        ];
        Mylog_condo::create($data);
    }

}
