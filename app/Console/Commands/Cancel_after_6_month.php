<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Cancel_Profile;
use App\Models\Cancel_after_6_month;
use App\User;

class Cancel_after_6_month extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:cancel_after_6_month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel_after_6_month';

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
        $date_add = strtotime("-6 Month");
        $date_6_month = date("Y-m-d" , $date_add);

        $user_6_month = Cancel_Profile::where('created_at' , "<=" , $date_6_month)->get();

        foreach ($user_6_month as $item ) {

            $find_data_user = User::where('id' , $item->user_id)->get();

            $data_6_month = array();

            foreach ($find_data_user as $key) {

                $data_6_month['name'] = $key->name ;
                $data_6_month['username'] = $key->username ;
                $data_6_month['email'] = $key->email ;
                $data_6_month['provider_id'] = $key->provider_id ;
                $data_6_month['avatar'] = $key->avatar ;
                $data_6_month['role'] = $key->role ;
                $data_6_month['type'] = $key->type ;
                $data_6_month['phone'] = $key->phone ;
                $data_6_month['brith'] = $key->brith ;
                $data_6_month['sex'] = $key->sex ;
                $data_6_month['ranking'] = $key->ranking ;
                $data_6_month['driver_license'] = $key->driver_license ;
                $data_6_month['driver_license2'] = $key->driver_license2 ;
                $data_6_month['location_P'] = $key->location_P ;
                $data_6_month['location_A'] = $key->location_A ;
                $data_6_month['organization'] = $key->organization ;
                $data_6_month['branch'] = $key->branch ;
                $data_6_month['branch_district'] = $key->branch_district ;
                $data_6_month['branch_province'] = $key->branch_province ;
                $data_6_month['photo'] = $key->photo ;
                $data_6_month['user_id'] = $key->id ;

                Cancel_after_6_month::create($data_6_month);
                User::where('id' , $item->user_id)->delete();
            }
        }

    }

}
