<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\EmailLog;


class LogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$filler_date = $request->get('filler_date');
    	if(!$filler_date) {
    		$filler_date = date('Y-m-d');
    	}

    	$logs = EmailLog::whereDate('created_at', '=', $filler_date)->get();
        return view('log.index', [
        	'logs' => $logs,
        	'filler_date' => $filler_date
        ]);
    }

}
