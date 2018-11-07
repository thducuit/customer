<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceLog extends Model
{
    //
    protected $table = 'service_logs';

    public function service() {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public static function saveLog($service) {
    	$log = new ServiceLog();
    	$log->service_id = $service->id;
		$log->category_id = $service->category_id;
		$log->supplier_id = $service->supplier_id;
    	$log->status = $service->status;
    	$log->month = date('m');
    	$log->year = date('Y');
    	$log->save();
    }
}
