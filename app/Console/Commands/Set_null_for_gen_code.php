<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;

class Set_null_for_gen_code extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:set_null_for_gen_code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set_null_for_gen_code';

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
        $date_d = date("d");

        if ($date_d == '01') {
            
            $sos_1669_province_codes = DB::table('sos_1669_province_codes')->get();

            foreach ($sos_1669_province_codes as $item) {
                DB::table('sos_1669_province_codes')
                    ->where([ 
                            ['id', $item->id],
                        ])
                    ->update([
                            'for_gen_code' => null,
                        ]);
            }

        }
    }

}
