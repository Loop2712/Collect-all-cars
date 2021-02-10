<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;

class AlertAct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'alert_act';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public $channel_access_token = "VsNZQKpv/ojbmRVXqM6v4PdOHGG5MKQblyKr4LuXo0jyGGRkaNBRLmEBQKE1BzLRNA9SPWTBr4ooOYPusYcwuZjsy6khvF717wmNnAEBu4oeppBc/woRCLiPqz3X5xTCMrEwxvrExidXIidR9SWUxAdB04t89/1O/w1cDnyilFU=";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date_now = date("Y-m-d");
        $date_add = strtotime("+30 Day");
        $date_30 = date("Y-m-d" , $date_add);

        // พรบ
        $act = Register_car::where('act' , "<=" , $date_30)
                                ->where('alert_act' , "=" , null)
                                ->get();

        foreach ($act as $item) {
            $template_path = storage_path('../public/json/flex-act.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง","พรบ. ของคุณใกล้หมดอายุ",$string_json);
            $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.$this->channel_access_token,
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data = [
                "title" => "https://api.line.me/v2/bot/message/push",
                "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            ];

            DB::table('register_cars')
                ->where('registration_number', $item->registration_number)
                ->where('province', $item->province)
                ->update(['alert_act' => $date_now]);

            MyLog::create($data);
            return $result;
        }
        // จบ พรบ

        // ประกัน
        $insurance = Register_car::where('insurance' , "<=" , $date_30)
                                ->where('insurance_act' , "=" , null)
                                ->get();

        foreach ($insurance as $item) {
            $template_path = storage_path('../public/json/flex-act.json');   
            $string_json = file_get_contents($template_path);
            $string_json = str_replace("ตัวอย่าง","ประกัน. ของคุณใกล้หมดอายุ",$string_json);
            $string_json = str_replace("9กก9999",$item->registration_number,$string_json);
            $string_json = str_replace("กรุงเทพมหานคร",$item->province,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.$this->channel_access_token,
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data = [
                "title" => "https://api.line.me/v2/bot/message/push",
                "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
            ];

            DB::table('register_cars')
                ->where('registration_number', $item->registration_number)
                ->where('province', $item->province)
                ->update(['insurance_act' => $date_now]);

            MyLog::create($data);
            return $result;
        }
        // จบ ประกัน
    }

}
