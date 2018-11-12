<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail warning to clients';

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
        Log::info('Run cron check and send email daily');
        $customers = \App\Customer::get();
        $template = \App\Template::where(['auto' => \App\Template::IS_AUTO])->first();
        
        if(!$template) {
            Log::error('Template auto mail not found');
            return;
        }
        
        foreach ($customers as $key => $customer) {
            $expired_day = $customer->dateexpired;
            if(!$expired_day) {
                continue;
            }

            //get left days
            $days = \App\Helpers\Utils::getLeftDays($expired_day);

            $status = '';
            if($days==3||$days==5||$days==7||$days==30||$days==0) {
                $status = "SẮP HẾT HẠN";
                $customer->status = \App\Customer::STATUS_WARNING;
                if($days == 0) { 
                    $status = "ĐÃ HẾT HẠN";
                    $customer->status = \App\Customer::STATUS_EXPIRED;
                }
                $customer->save();

                //save customer log
                \App\CustomerLog::saveLog($customer);

                $mail_info = \App\Helpers\Mail::setMailContent($template, $customer, $status);
                try {
                    $config_email_cc = [];
                    $config_cc = \App\Config::where(['key' => 'cc'])->first();
                    if($config_cc && $config_cc->value) {
                        $config_email_cc = $config_cc->value ? explode(',', $config_cc->value) : [];
                    }
                    \App\Helpers\Mail::sendMail($mail_info, $config_email_cc);
                    Log::info('Email sent to: ' . $mail_info['email']);
                    \App\EmailLog::saveLog('sent', sprintf('Email [%s] sent to: %s day(s) left [%s]', $status, $mail_info['email'], $days) );
                }catch(Exception $e) {
                    Log::error($e->getMessage());
                    \App\EmailLog::saveLog('error', sprintf('Email %s sent to: %s with error: %s', $status, $mail_info['email']), $e->getMessage() );
                }
            }
        }
        
        Log::info('Finish check and send email daily');
        return;
    }
}
