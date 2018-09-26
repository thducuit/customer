<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChartService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChartService $chart_service_ins)
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return view('test');
    }
}
