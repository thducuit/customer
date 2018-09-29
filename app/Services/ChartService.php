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
            "select count(*) as val, category_id as cat, month
                from `customer_log` as cl 
                inner join `category` as c on cl.category_id = c.id 
                where c.status = 1 and cl.status = 1 and cl.year = %d 
                group by cl.month, cl.category_id" , $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartByCategory($result);
    }

    public function getDataChartBySupplier() {
        $year = date('Y');
        $sql = sprintf(
            "select count(*) as val, supplier_id as sup, month
                from `customer_log` as cl 
                inner join `suppliers` as s on cl.supplier_id = s.id 
                where cl.status = 1 and cl.year = %d 
                group by cl.month, cl.supplier_id" , $year
        );
        
        $result = \DB::select(\DB::raw($sql));
        return $this->chart_helper->formatDataChartBySupplier($result);
    }
}