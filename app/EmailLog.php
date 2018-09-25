<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    //
    protected $table = 'log';

    public static function saveLog($type, $content) {
    	$log = new EmailLog();
    	$log->type = $type;
    	$log->content = $content;
    	$log->save();
    }
}
