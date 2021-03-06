<?php

namespace App\Services;

use App\Category as Category;

class ChartService {

    private $chart_helper;

    public function __construct() {
        $this->chart_helper = new \App\Helpers\Chart;
    }

    public function getDataChartByCategory() 
    {
        $year = date('Y');
        $sql = sprintf(
            "
            SELECT COUNT(*) AS val, cl.`category_id` AS cat, cl.`month`
            FROM `customer_log` AS cl
            INNER JOIN `category` AS c ON cl.`category_id` = c.`id` 
            INNER JOIN (SELECT MAX(`id`) AS id, `month`, `customer_id` FROM `customer_log` WHERE `year` = %d GROUP BY `month`, `customer_id`) AS clm ON clm.`id` = cl.`id`
            INNER JOIN `management` AS m ON cl.`customer_id` = m.`id`
            WHERE c.`status` = 1 AND m.`status` = 1 AND cl.`year` = %d 
            GROUP BY cl.`month`, cl.`category_id`" , $year, $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartByCategory($result);
    }

    public function getDataChartBySupplier() 
    {
        $year = date('Y');
        $sql = sprintf(
            "
            SELECT COUNT(*) AS val, sl.`supplier_id` AS sup, sl.`category_id` AS cat
                FROM `service_logs` AS sl 
                INNER JOIN `suppliers` AS s ON sl.`supplier_id` = s.`id`
                INNER JOIN `category` AS c ON sl.`category_id` = c.`id`
                INNER JOIN `services` AS se ON sl.`service_id` = se.`id`
                INNER JOIN (SELECT MAX(`id`) AS id, `category_id`, `service_id` FROM `service_logs` WHERE `year` = %d GROUP BY `category_id`, `service_id`) AS slm ON slm.`id` = sl.`id`
                WHERE c.`status` = 1 AND se.`status` = 1 AND sl.`year` = %d 
                GROUP BY sl.`category_id`, sl.`supplier_id`
            " , $year, $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartBySupplier($result);
    }

    public function getDataServiceByCategory() 
    {
        $year = date('Y');
        $sql = sprintf(
            "
            SELECT COUNT(*) AS val, sl.`category_id` AS cat, sl.`month`
            FROM `service_logs` AS sl
            INNER JOIN `suppliers` AS s ON sl.`supplier_id` = s.`id`
            INNER JOIN `category` AS c ON sl.`category_id` = c.`id`
            INNER JOIN `services` AS se ON sl.`service_id` = se.`id`
            INNER JOIN (SELECT MAX(`id`) AS id, `month`, `service_id` FROM `service_logs` WHERE `year` = %d GROUP BY `month`, `service_id`) AS slm ON slm.`id` = sl.`id`
            WHERE c.`status` = 1 and se.`status` = 1 and sl.`year` = %d 
            GROUP BY sl.`month`, sl.`category_id`" , $year, $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartByCategory($result);
    }

    public function getExpiredCustomerByMonth()
    {
        $year = date('Y');
        $sql = sprintf("
            SELECT COUNT(*) AS val, cus.`category_id` AS cat, month(cus.`dateexpired`) as `month`
            FROM `management` AS cus
            WHERE cus.`status` < 2 and year(cus.`dateexpired`) = %d
            GROUP BY cus.`category_id`, `month`
            ", $year);
        
        $result = \DB::select(\DB::raw($sql));
        $categories = Category::where(['status' => 1, 'is_for_rent' => 0])->get();
        return $this->chart_helper->formatDataChartByCategory($result, $categories);
    }

    public function getServiceByCategoryAndSupplier()
    { 
        $sql = "
            SELECT COUNT(*) AS val, ser.`supplier_id` AS sup, ser.`category_id` AS cat
            FROM `services` AS ser
            WHERE ser.`status` < 2
            GROUP BY ser.`supplier_id`, ser.`category_id`
            ";
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartBySupplier($result);
    }

    public function getExpiredServiceByMonth()
    {
        $year = date('Y');
        $sql = sprintf("
            SELECT COUNT(*) AS val, ser.`category_id` AS cat, month(ser.`dateexpired`) as `month`
            FROM `services` AS ser
            WHERE ser.`status` < 2 AND year(ser.`dateexpired`) = %d
            GROUP BY ser.`category_id`, `month`
            ", $year);
        
        $result = \DB::select(\DB::raw($sql));
        $categories = Category::where(['status' => 1])->get();
        return $this->chart_helper->formatDataChartByCategory($result, $categories);
    }

}