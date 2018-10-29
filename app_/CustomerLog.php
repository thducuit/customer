<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLog extends Model
{
    //
    protected $table = 'customer_log';

    public function customer() {
        return $this->belongsTo('App\Management', 'customer_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public static function saveLog($customer) {
    	$log = new CustomerLog();
    	$log->customer_id = $customer->id;
		$log->category_id = $customer->category_id;
		$log->supplier_id = $customer->supplier_id;
    	$log->status = $customer->status;
    	$log->month = date('m');
    	$log->year = date('Y');
    	$log->save();
    }
}
