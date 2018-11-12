<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;

class customer extends Model
{
    protected $table = 'customer';

    const STATUS_RUNNING = 0;
    const STATUS_WARNING = 1;
    const STATUS_EXPIRED = 2;

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id');
	}
	
	public function supplier() {
		return $this->belongsTo('App\Supplier', 'supplier_id');
	}

    public static function checkStatus($customer) {
    	$days = Utils::getLeftDays($customer->dateexpired);
        
    	if($days<=30) {
    		//Sap het han
    		$customer->status = self::STATUS_WARNING;
    		if($days <= 0) { 
    			//het han
    			$customer->status = self::STATUS_EXPIRED;
            }
    	} else {
    		$customer->status = self::STATUS_RUNNING;
    	}
    	$customer->save();
        return $customer->status;
    }
}
