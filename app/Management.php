<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Utils;

class Management extends Model
{
    protected $table = 'management';

    const STATUS_RUNNING = 0;
    const STATUS_WARNING = 1;
    const STATUS_EXPIRED = 2;

    public function category() {
    	return $this->belongsTo('App\Category', 'category_id');
	}
	
	public function supplier() {
		return $this->belongsTo('App\Supplier', 'supplier_id');
	}

    public static function check_status($customer) {
    	$days = Utils::get_left_days($customer->dateexpired);
        
    	if($days<=30) {
    		//Sap het han
    		$customer->status = Management::STATUS_WARNING;
    		if($days <= 0) { 
    			//het han
    			$customer->status = Management::STATUS_EXPIRED;
            }
    	} else {
    		$customer->status = Management::STATUS_RUNNING;
    	}
    	$customer->save();
    }
}
