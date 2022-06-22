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
        // $data_postback_explode = explode("From_LINE=",$event["postback"]["data"]);
        // $From_LINE = $data_postback_explode[1] ;
        // // ข้อมูลไลน์คอนโด
        // $data_line_condos = Partner_condo::where('id' , $From_LINE)->get();

        $data = [
            "title" => "LINE INPUT",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
            "condo_id" => "",
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
            $x = "x" ;
            // case "อื่นๆ" :  
            //     $line_condo->replyToUser(null, $event, "other");
            //     break;
            // case "ข่าวสาร" :  
            //     $line_condo->replyToUser(null, $event, "vnews");
            //     break;
        }   

    }

    public function set_richmanu_language($user_id, $data_condos, $rich_menu_language)
    {
        $data_user = User::where('id' , $user_id)->first();
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

}
