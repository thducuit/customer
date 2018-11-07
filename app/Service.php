<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;

class Service extends Model
{
    protected $table = "services";

    const STATUS_RUNNING = 0;
    const STATUS_WARNING = 1;
    const STATUS_EXPIRED = 2;

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id');
	}
	
	public function supplier() {
		return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public static function check_status($service) {
    	$days = Utils::get_left_days($service->dateexpired);
        
    	if($days<=30) {
    		//Sap het han
    		$service->status = Service::STATUS_WARNING;
    		if($days <= 0) { 
    			//het han
    			$service->status = Service::STATUS_EXPIRED;
            }
    	} else {
    		$service->status = Service::STATUS_RUNNING;
    	}
    	$service->save();
        return $service->status;
    }
    
}
