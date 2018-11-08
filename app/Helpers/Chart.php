<?php
namespace App\Helpers;

use App\Category as Category;
use App\Supplier as Supplier;
use App\Constant as Constant;

class Chart {

    public function formatDataChartByCategory($data = []) {
        $datasets_temp = [];
        $datasets = [];
        $yAxes = [];
        $categories = Category::where(['status' => 1])->get();
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
                    // 'max' =>  30,
                    'min' =>  0,
                    'stepSize' => 5
                ]
            ];
        }

        //add value from database to dataset[data]
        foreach ($data as $d) {
            $datasets_temp[$d->cat]['data'][$d->month] = $d->val;
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

        return [
            'datasets' => $datasets,
            'yAxes' => $yAxes
        ];
    } 

    public function formatDataChartBySupplier($data = []) {
        $datasets_temp = [];
        $datasets = [];
        $yAxes = [];
        $suppliers = Supplier::all();
        $default_data = Constant::createDefautListByMonth();
        foreach($suppliers as $sup) {
            $datasets_temp[$sup->id] = [
                'label'=> $sup->name,
                'data' => $default_data,
                'backgroundColor' => $sup->chart_bg_color,
                'borderColor' => $sup->chart_bd_color,
                'borderWidth' => 1,
                'yAxisID'=> 'y-axis-' . $sup->id
            ];

            $yAxes[] = [
                'type' => 'linear', 
                'display' => false,
                'id' => 'y-axis-' . $sup->id,
                'ticks' => [
                    // 'max' =>  30,
                    'min' =>  0,
                    'stepSize' => 2
                ]
            ];
        }

        //add value from database to dataset[data]
        foreach ($data as $d) {
            $datasets_temp[$d->sup]['data'][$d->month] = $d->val;
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

        return [
            'datasets' => $datasets,
            'yAxes' => $yAxes
        ];
    }
}