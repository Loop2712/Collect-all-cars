<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Check_in;

class Delete_check_in extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:delete_check_in_after_15_day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete_check_in_after_15_day';

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
        $date_now = date("Y-m-d");
        $date_add = strtotime("-15 days");
        $date_15 = date("Y-m-d" , $date_add);

        $check_in_15days = Check_in::where('created_at' , "<=" , $date_15)->get();

        foreach ($check_in_15days as $item) {
            Check_in::where('id' , $item->id)->delete();
        }

    }

}
