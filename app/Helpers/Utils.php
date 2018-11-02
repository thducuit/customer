<?php
namespace App\Helpers;
use Carbon\Carbon;

class Utils {
	public static function get_left_days($expired_day) 
	{
		$today = strtotime("now");
		$expired_day = strtotime($expired_day . ' 23:00:00');
        $days = round( ($expired_day - $today)/60/60/24 );
        return $days;
	}

	public static function extra_time($expired_day, $period, $unit) 
	{
		$code = sprintf("+%s %s", $period, $unit);
		$expired_day = strtotime($expired_day);
		return date("Y-m-d", strtotime($code, $expired_day));
	}

	public static function getCategoryTitle($category_ids = '') 
	{
		$categories = \App\Category::select('title')->whereIn('id', explode(',', $category_ids))->get();
		$str = '';
		foreach ($categories as $cat) {
			$str .= $cat->title . '<br/>';
		}
		return $str;
	}
}