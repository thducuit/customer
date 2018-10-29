<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailTask extends Model
{
    //
    protected $table = 'mail_tasks';

    const STATUS_WAITING = 0;
    const STATUS_RUNNING = 2;
    const STATUS_DONE = 1;
    const STATUS_FAILURE = 3;
}
