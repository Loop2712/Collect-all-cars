<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text_topic;
use Auth;
use Illuminate\Support\Facades\DB;

class API_language extends Controller
{
    public function change_language($language , $user_id)
    {
        DB::table('users')
              ->where('id', $user_id)
              ->update([
                'language' => $language,
        ]);

        return $language;
    }

    public function add_text_topic($text_th)
    {
      
      $requestData = array();

      $requestData['th'] = $text_th ;
        
      Text_topic::create($requestData);

      return $text_th;
    }
}
