<?php

namespace App\Services;

class ChartService {

    public function test() {
        echo 111; die();
    }

    public function getChart1Data($status, $year) {
        $sql = "select count(*) 
                from `customer_logs` as cl 
                left join `category` as c on cl.category_id = c.id 
                where cl.status = 1 and cl.year = 2018 
                group by cl.month, cl.category_id";
        
        $result = DB::raw();
    }
}