<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text_topic;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;
use App\Models\LineMessagingAPI;

class API_language extends Controller
{
    public function change_language($language , $user_id)
    {
        DB::table('users')
              ->where('id', $user_id)
              ->update([
                'language' => $language,
        ]);

        $data_users = DB::table('users')
                ->where('id', $user_id)
                ->where('status', "active")
                ->get();

        $lineAPI = new LineApiController();
        $lineAPI->check_language_user($data_users);

        // return $language;
    }

    public function change_language_fromline($language , $user_id)
    {
        DB::table('users')
              ->where('id', $user_id)
              ->update([
                'language' => $language,
        ]);

        $data_users = DB::table('users')
                ->where('id', $user_id)
                ->where('status', "active")
                ->get();

        $lineAPI = new LineApiController();
        $lineAPI->check_language_user($data_users);

        $line = new LineMessagingAPI();
        $line->replyToUser(null, $event, "change_language_fromline");
        // return $language;
    }

    public function add_text_topic($text_th)
    {
      
      $requestData = array();

      $requestData['th'] = $text_th ;
        
      Text_topic::firstOrCreate($requestData);

      return $text_th;
    }
}
