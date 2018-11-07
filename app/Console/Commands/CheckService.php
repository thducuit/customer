<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check service expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Log::info('Run cron check service');
        $services = \App\Service::get();
        
        foreach ($services as $key => $service) {
            $expired_day = $service->dateexpired;
            if(!$expired_day) {
                continue;
            }

            //get left days
            $days = \App\Helpers\Utils::get_left_days($expired_day);

            $status = '';
            if($days==3||$days==5||$days==7||$days==30||$days==0) {
                $service->status = \App\Service::STATUS_WARNING;
                if($days == 0) { 
                    $service->status = \App\Service::STATUS_EXPIRED;
                }
                $service->save();

                //save service log
                \App\ServiceLog::saveLog($service);
            }
        }
        return;
    }
}
