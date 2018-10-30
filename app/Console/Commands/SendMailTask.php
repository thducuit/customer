<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;

class SendMailTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email by task';

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
        Log::info('Run cron send email task');

        $mail_task = \App\MailTask::where(['status' => \App\MailTask::STATUS_WAITING])->first();
        if(empty($mail_task)) {
            return;
        }
        $mail_task->status = \App\MailTask::STATUS_RUNNING;
        $mail_task->save();
        
        if(!empty($mail_task->title)) {
            $template = new \App\Template;
            $template->title = $mail_task->title;
            $template->content = $mail_task->content;
            $template->save();
        }else {
            $template = \App\Template::where(['id' => $mail_task->template_id])->first(); 
        }

        $cc = $mail_task->cc ? explode(',', $mail_task->cc) : [];
        $category_ids = $mail_task->category_ids ? explode(',', $mail_task->category_ids) : [];
        $emails = $mail_task->email ? explode(',', $mail_task->email) : [];
        $customers = \App\Management::whereIn('category_id', $category_ids)->get();

        foreach ($customers as $key => $customer) {
            $mail_info = \App\Helpers\Mail::mail_content($template, $customer);
            try {
                \App\Helpers\Mail::send_mail($mail_info, $cc);
                Log::info('Email sent to: ' . $mail_info['email']);
                \App\EmailLog::saveLog('sent', sprintf('Email [%s] sent task success', $mail_info['email']) );
            }catch(Exception $e) {
                $mail_task->status = \App\MailTask::STATUS_FAILURE;
                $mail_task->save();
                Log::error($e->getMessage());
                \App\EmailLog::saveLog('error', sprintf('Email %s sent task fail', $mail_info['email']) );
            }
        }

        foreach($emails as $value) {
            $mail_info = [
                'email' => $value,
                'cc' => $cc,
                'content' => $template->content,
                'subject' => $template->title
            ];
            try {
                \App\Helpers\Mail::send_mail($mail_info, $cc);
                Log::info('Email sent to: ' . $mail_info['email']);
                \App\EmailLog::saveLog('sent', sprintf('Email [%s] sent task success', $mail_info['email']) );
            }catch(Exception $e) {
                $mail_task->status = \App\MailTask::STATUS_FAILURE;
                $mail_task->save();
                Log::error($e->getMessage());
                \App\EmailLog::saveLog('error', sprintf('Email %s sent task fail', $mail_info['email']) );
            }
        }

        $mail_task->status = \App\MailTask::STATUS_DONE;
        $mail_task->save();

        Log::info('Finish check and send email task');
        return;
    }
}
