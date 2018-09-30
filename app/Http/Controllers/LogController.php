<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\EmailLog;
use App\CustomerLog;
use Carbon\Carbon;

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
    	}else {
            $filler_date = Carbon::createFromFormat('d-m-Y', $filler_date)->format('Y-m-d');
        }

    	$logs = CustomerLog::whereDate('created_at', '=', $filler_date)->get();
        return view('log.index', [
        	'logs' => $logs,
        	'filler_date' => $filler_date
        ]);
    }

    public function delete(Request $request) {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $log = CustomerLog::where(['id' => $id])->first();
                $log->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy log']);
        } 
    }

}
