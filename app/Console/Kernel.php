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
        //
        'App\Console\Commands\SendEmails',
        'App\Console\Commands\CheckService',
        'App\Console\Commands\SendMailTask'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:send')
                    ->timezone('Asia/Ho_Chi_Minh')
                    ->dailyAt("23:00");

        $schedule->command('check:service')
                    ->timezone('Asia/Ho_Chi_Minh')
                    ->dailyAt("23:30");

        $schedule->command('mail:task')
                    ->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
