<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text_topic;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;

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

        foreach ($data_users as $data_user) {
            $provider_id = $data_user->provider_id ;
        }

        switch ($language) {
          case 'th':
              $richMenuId = "richmenu-c97702fad335082aad0b8a069d4a8e8f" ;
              break;
          case 'en':
              $richMenuId = "richmenu-e335c46ce1d4bfe6688cc4bdb19f8769" ;
              break;
          case 'zh-TW':
              $richMenuId = "zh-TW" ;
              break;
          case 'ja':
              $richMenuId = "ja" ;
              break;
          case 'ko':
              $richMenuId = "ko" ;
              break;
          case 'es':
              $richMenuId = "es" ;
              break;
      }

      $lineAPI = new LineApiController();
      $lineAPI->set_richmanu_language($provider_id , $richMenuId , $language);

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
