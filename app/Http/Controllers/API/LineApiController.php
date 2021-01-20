<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;

class LineApiController extends Controller
{
    public function store(Request $request)
	{
		echo "Hello";

		$access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";
 
		// $content = file_get_contents('php://input');
		// $arrJson = json_decode($content, true);

		$content = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($content, JSON_UNESCAPED_UNICODE),
        ];
        Mylog::create($data);

		// Parse JSON
		$events = $content;
		 
		if (!is_null($events['events'])) {

			foreach ($events['events'] as $event) {
				// หาข้อความที่ของเจ้าของรถส่งมา
				if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
						$text = $event['message']['text'];
				
					// หา UserId ของเจ้าของรถ
					if ($event['type'] == 'message' && $event['source']['type'] == 'user') {
						$userId = $event['source']['userId'];

						// UserId คนเรียก
						$reply_provider_id = DB::select("SELECT * FROM register_cars WHERE provider_id = '$userId' ");

						$arrPostData['to'] = $reply_provider_id;
		                $arrPostData['messages'][0]['type'] = "text";
		                $arrPostData['messages'][0]['text'] = $text;

						// Make a POST Request to Messaging API to reply to sender
				        $url = 'https://api.line.me/v2/bot/message/reply';
				        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
				        $ch = curl_init($url);
				        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
				        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				        $result = curl_exec($ch);
				        curl_close($ch);
				        echo $result . "";
					    
				    }
				}
			}

		}

	}
}
