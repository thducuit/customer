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
            SELECT count(*) AS val, cl.`category_id` AS cat, cl.`month`
            FROM `customer_log` AS cl
            INNER JOIN `category` AS c ON cl.`category_id` = c.`id` 
            INNER JOIN (SELECT MAX(`id`) AS id, `month`, `customer_id` FROM `customer_log` GROUP BY `month`, `year`, `customer_id`) AS clm ON clm.`id` = cl.`id`
            INNER JOIN `management` AS m ON cl.`customer_id` = m.`id`
            WHERE c.`status` = 1 AND m.`status` = 1 AND cl.`year` = %d 
            GROUP BY cl.`month`, cl.`category_id`" , $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartByCategory($result);
    }

    public function getDataChartBySupplier() {
        $year = date('Y');
        $sql = sprintf(
            "select count(*) as val, supplier_id as sup, month
                from `service_logs` as sl 
                inner join `suppliers` as s on sl.supplier_id = s.id 
                where sl.status = 1 and sl.year = %d 
                group by sl.month, sl.supplier_id" , $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartBySupplier($result);
    }

    public function getDataServiceByCategory() {
        $year = date('Y');
        $sql = sprintf(
            "select count(*) as val, category_id as cat, month
                from `service_logs` as sl 
                inner join `category` as c on sl.category_id = c.id 
                where c.status = 1 and sl.status = 1 and sl.year = %d 
                group by sl.month, sl.category_id" , $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartByCategory($result);
    }

}