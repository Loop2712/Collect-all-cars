<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AlertAct::class,
        Commands\Cancel_after::class,
        Commands\Delete_check_in::class,
        Commands\Set_null_for_gen_code::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    { 
        $schedule->command('cron:alert_act')->dailyAt('07:00')->withoutOverlapping(5);
        $schedule->command('cron:cancel_after_6_month')->dailyAt('07:30')->withoutOverlapping(5);
        $schedule->command('cron:delete_check_in_after_15_day')->dailyAt('08:00')->withoutOverlapping(5);
        $schedule->command('cron:set_null_for_gen_code')->dailyAt('00:00')->withoutOverlapping(5);
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
