<?php

namespace App\Services;

class ChartService {

    private $chart_helper;

    public function __construct() {
        $this->chart_helper = new \App\Helpers\Chart;
    }

    public function getDataChartByCategory() {
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

    public function getDataChartBySupplier() {
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

    public function getDataServiceByCategory() {
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

}