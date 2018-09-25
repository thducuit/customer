<?php
namespace App\Helpers;

class Utils {
	public static function get_left_days($expired_day) 
	{
		$today = strtotime("now");
		$expired_day = strtotime($expired_day);
        $days = floor( ($expired_day - $today)/60/60/24 );
        return $days;
	}

	public static function extra_time($expired_day, $period, $unit) 
	{
		$code = sprintf("+%s %s", $period, $unit);
		$expired_day = strtotime($expired_day);
		return date("Y-m-d", strtotime($code, $expired_day));
	}
}