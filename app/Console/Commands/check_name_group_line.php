<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;
use App\Models\MyLog;
use App\Models\LineMessagingAPI;
use App\Models\Group_line;

class Check_name_group_line extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_name_group_line';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check_name_group_line hourly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all_group_line = Group_line::get();

        foreach ($all_group_line as $item) {

            $groupId = $item->groupId ; // แทนที่ด้วย groupId ของคุณ
            $channelAccessToken = env('CHANNEL_ACCESS_TOKEN'); // แทนที่ด้วย channel access token ของคุณ

            $url = "https://api.line.me/v2/bot/group/{$groupId}/summary";

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $channelAccessToken
            ]);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                //SAVE LOG
                $requestData = $request->all();
                $data = [
                    "title" => "Line",
                    "content" => 'cURL error: ' . curl_error($ch),
                ];
                MyLog::create($data);
            } else {
                // แปลง JSON response เป็น PHP object
                $responseData = json_decode($response);

                // ตรวจสอบว่าแปลง JSON สำเร็จ
                if ($responseData && isset($responseData->groupName, $responseData->pictureUrl)) {
                    // เปรียบเทียบและอัปเดตข้อมูล
                    if ($responseData->groupName != $item->groupName || $responseData->pictureUrl != $item->pictureUrl) {
                        DB::table('group_lines')
                            ->where('groupId', $responseData->groupId)
                            ->update([
                                'groupName' => $responseData->groupName,
                                'pictureUrl' => $responseData->pictureUrl,
                            ]);

                        //SAVE LOG
                        $requestData = $request->all();
                        $data = [
                            "title" => "Line",
                            "content" => 'เปลี่ยนชื่อกลุ่มไลน์ | ' . $item->groupName . ' >> ' . $responseData->groupName,
                        ];
                        MyLog::create($data);
                    }
                } else {
                    //SAVE LOG
                    $requestData = $request->all();
                    $data = [
                        "title" => "Line",
                        "content" => 'Unexpected response format: ' . $response,
                    ];
                    MyLog::create($data);
                }
            }

            curl_close($ch);
        }
    }

}
