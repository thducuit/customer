<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\EmailLog;
use App\CustomerLog;
use App\ServiceLog;
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
    	$filler_date_from = $request->get('filler_date_from');
        $filler_date_to = $request->get('filler_date_to');

        $filler_date_from = (!$filler_date_from) ? date('Y-m-d 00:00:00') : Carbon::createFromFormat('d-m-Y H:i:s', $filler_date_from . ' 00:00:00')->format('Y-m-d');
        $filler_date_to = (!$filler_date_to) ? date('Y-m-d 23:59:59', strtotime('+6 day')) : Carbon::createFromFormat('d-m-Y H:i:s', $filler_date_to . ' 23:59:59')->format('Y-m-d');
        
        $logs = CustomerLog::query()
                            ->join(\DB::raw('(SELECT MAX(`id`) AS id, `month`, `customer_id`, `year` FROM `customer_log` GROUP BY `month`, `customer_id`, `year`) as clm'), 'clm.id',  '=', 'customer_log.id')
                            ->whereDate('created_at', '>=', $filler_date_from)
                            ->whereDate('created_at', '<=', $filler_date_to)->get();

        return view('log.index', [
        	'logs' => $logs,
        	'filler_date_from' => $filler_date_from,
        	'filler_date_to' => $filler_date_to,
        ]);
    }

    public function delete(Request $request) 
    {
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request)
    {
    	$filler_date_from = $request->get('filler_date_from');
        $filler_date_to = $request->get('filler_date_to');

        $filler_date_from = (!$filler_date_from) ? date('Y-m-d 00:00:00') : Carbon::createFromFormat('d-m-Y H:i:s', $filler_date_from . ' 00:00:00')->format('Y-m-d');
        $filler_date_to = (!$filler_date_to) ? date('Y-m-d 23:59:59', strtotime('+6 day')) : Carbon::createFromFormat('d-m-Y H:i:s', $filler_date_to . ' 23:59:59')->format('Y-m-d');
        
        $logs = ServiceLog::query()
                            ->join(\DB::raw('(SELECT MAX(`id`) AS id, `month`, `service_id`, `year` FROM `service_logs` GROUP BY `month`, `service_id`, `year`) as slm'), 'slm.id',  '=', 'service_logs.id')
                            ->whereDate('created_at', '>=', $filler_date_from)
                            ->whereDate('created_at', '<=', $filler_date_to)
                            ->get();
        
        return view('log.index2', [
        	'logs' => $logs,
        	'filler_date_from' => $filler_date_from,
        	'filler_date_to' => $filler_date_to,
        ]);
    }

    public function delete2(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $log = ServiceLog::where(['id' => $id])->first();
                $log->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy log']);
        } 
    }

}
