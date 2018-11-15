<?php
namespace App\Helpers;

use App\Category as Category;
use App\Supplier as Supplier;
use App\Constant as Constant;

class Chart {

    public function formatDataChartByCategory($data = [], $categories = []) 
    {
        $datasets_temp = [];
        $datasets = [];
        $yAxes = [];
        $default_data = Constant::createDefautListByMonth();
        foreach($categories as $cat) {
            $datasets_temp[$cat->id] = [
                'label'=> $cat->title,
                'data' => $default_data,
                'backgroundColor' => $cat->chart_bg_color,
                'borderColor' => $cat->chart_bd_color,
                'borderWidth' => 1,
                'yAxisID'=> 'y-axis-' . $cat->id
            ];

            $yAxes[] = [
                'type' => 'linear', 
                'display' => false,
                'id' => 'y-axis-' . $cat->id,
                'ticks' => [
                    'beginAtZero' => true,
                    'min' =>  0,
                    'stepSize' => 5,
                ]
            ];
        }

        //add value from database to dataset[data]
        $max_val = 0;
        foreach ($data as $d) {
            $datasets_temp[$d->cat]['data'][$d->month] = $d->val;
            if($max_val < $d->val) {
                $max_val = $d->val;
            }
        }
        

        //revert dataset
        foreach($datasets_temp as $dataset_temp) {
            $dataset_data = $dataset_temp['data'];
            $dataset_temp['data'] = [];
            foreach($dataset_data as $val) {
                $dataset_temp['data'][] = $val;
            }
            $datasets[] = $dataset_temp;
        }

        foreach($yAxes as $key => $yAxes_e) {
            $max_val = ceil($max_val/$yAxes[$key]['ticks']['stepSize']) * $yAxes[$key]['ticks']['stepSize'];
            $yAxes[$key]['ticks']['max'] = $max_val;
        }

        return [
            'datasets' => $datasets,
            'yAxes' => $yAxes
        ];
    } 

    public function formatDataChartBySupplier($data = []) 
    {
        $datasets_temp = [];
        $datasets = [];
        $yAxes = [];
        $suppliers = Supplier::all();
        $categories = Category::all();
        $default_data = [];
        foreach($suppliers as $s) {
            $default_data[$s->id] = $s->name;
        }
        foreach($categories as $cat) {
            $datasets_temp[$cat->id] = [
                'label'=> $cat->title,
                'data' => $default_data,
                'backgroundColor' => $cat->chart_bg_color,
                'borderColor' => $cat->chart_bd_color,
                'borderWidth' => 1,
                'yAxisID'=> 'y-axis-' . $cat->id
            ];

            $yAxes[] = [
                'type' => 'linear', 
                'display' => false,
                'id' => 'y-axis-' . $cat->id,
                'ticks' => [
                    'beginAtZero' => true,
                    'min' =>  0,
                    'stepSize' => 5
                ]
            ];
        }

        //add value from database to dataset[data]
        $max_val = 0;
        foreach ($data as $d) {
            $datasets_temp[$d->cat]['data'][$d->sup] = $d->val;
            if($max_val < $d->val) {
                $max_val = $d->val;
            }
        }

        //revert dataset
        foreach($datasets_temp as $dataset_temp) {
            $dataset_data = $dataset_temp['data'];
            $dataset_temp['data'] = [];
            foreach($dataset_data as $val) {
                $dataset_temp['data'][] = $val;
            }
            $datasets[] = $dataset_temp;
        }

        foreach($yAxes as $key => $yAxes_e) {
            $max_val = ceil($max_val/$yAxes[$key]['ticks']['stepSize']) * $yAxes[$key]['ticks']['stepSize'];
            $yAxes[$key]['ticks']['max'] = $max_val;
        }

        return [
            'datasets' => $datasets,
            'yAxes' => $yAxes
        ];
    }
}