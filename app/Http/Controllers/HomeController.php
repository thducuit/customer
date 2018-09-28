<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChartService;
use App\Category as Category;
use App\Supplier as Supplier;

class HomeController extends Controller
{

    private $chart_service_ins;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChartService $chart_service_ins)
    {
        $this->middleware('auth');
        $this->chart_service_ins = $chart_service_ins;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where(['status' => 1])->get();
        $suppliers = Supplier::all();
        return view('home', [
            'chart1' => $this->chart_service_ins->getDataChartByCategory(),
            'chart2' => $this->chart_service_ins->getDataChartBySupplier(),
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }
}
