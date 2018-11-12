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

    public static function checkStatus($service) {
    	$days = Utils::getLeftDays($service->dateexpired);
        
    	if($days<=30) {
    		//Sap het han
    		$service->status = self::STATUS_WARNING;
    		if($days <= 0) { 
    			//het han
    			$service->status = self::STATUS_EXPIRED;
            }
    	} else {
    		$service->status = self::STATUS_RUNNING;
    	}
    	$service->save();
        return $service->status;
    }
    
}
