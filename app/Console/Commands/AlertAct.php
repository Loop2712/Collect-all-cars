<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Register_car;
use App\Models\MyLog;

class AlertAct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:alert_act';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'alert_act everyMinute';

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

        $line = new LineMessagingAPI();

        $line->alert_act();
        
    }

}
