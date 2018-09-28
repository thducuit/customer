<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLog extends Model
{
    //
    protected $table = 'customer_log';

    public static function saveLog($customer) {
    	$log = new CustomerLog();
    	$log->customer_id = $customer->id;
		$log->category_id = $customer->category_id;
		$log->supplier_id = $customer->supplier_id;
    	$log->status = $customer->status;
    	$log->month = date('m');
    	$log->year = date('y');
    	$log->save();
    }
}
