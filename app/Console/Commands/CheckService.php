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

        $template = \App\Template::where(['auto' => \App\Template::IS_AUTO_SERVICE])->first();
        
        if(!$template) {
            Log::error('Template auto mail not found');
            return;
        }
        
        foreach ($services as $key => $service) {
            $expired_day = $service->dateexpired;
            if(!$expired_day) {
                continue;
            }

            //get left days
            $days = \App\Helpers\Utils::get_left_days($expired_day);

            $status = '';
            if($days==3||$days==5||$days==7||$days==30||$days==0) {
                $status = "SẮP HẾT HẠN";
                $service->status = \App\Service::STATUS_WARNING;
                if($days == 0) { 
                    $status = "ĐÃ HẾT HẠN";
                    $service->status = \App\Service::STATUS_EXPIRED;
                }
                $service->save();

                //save service log
                \App\ServiceLog::saveLog($service);

                $mail_info = \App\Helpers\Mail::mail_content_service($template, $service, $status);
                try {
                    $config_email_cc = [];
                    $config_cc = \App\Config::where(['key' => 'cc'])->first();
                    if($config_cc && $config_cc->value) {
                        $config_email_cc = $config_cc->value ? explode(',', $config_cc->value) : [];
                    }
                    \App\Helpers\Mail::send_mail($mail_info, $config_email_cc);
                    Log::info('Email Service sent to: ' . $mail_info['email']);
                    \App\EmailLog::saveLog('sent', sprintf('Email Service [%s] sent to: %s day(s) left [%s]', $status, $mail_info['email'], $days) );
                }catch(Exception $e) {
                    Log::error($e->getMessage());
                    \App\EmailLog::saveLog('error', sprintf('Email Service %s sent to: %s with error: %s', $status, $mail_info['email']), $e->getMessage() );
                }

            }
        }
        return;
    }
}
