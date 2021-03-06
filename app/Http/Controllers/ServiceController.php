<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Service;
use App\Supplier;
use App\Template;
use Carbon\Carbon;
use App\Helpers\Mail as MailHelper;


class ServiceController extends Controller
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
        $id = $request->get('id');
        $isExpand = $request->get('expand', false);

        $categories = Category::where(['status' => 1])->get();
        $suppliers = Supplier::all();

        $service = null; 
        if($id) {
            $service = Service::where(['id' => $id])->first();
        }else {
            $service = new Service;
        }
        
        $services = Service::get();
        $templates = Template::where(['status' => Template::IN_USE])->get();
        return view('service.index', [
        	'categories' => $categories,
            'suppliers' => $suppliers,
            'service' => $service,
            'services' => $services,
            'templates' => $templates,
            'expand' => $isExpand
        ]);
    }

    public function post(Request $request) 
    {
        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'status' => 'required',
                'datecreated' => 'required',
                'dateexpired' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'email' => 'required',
                'price' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput($request->all());
            }

            $input = $request->all();
            $id = $input['id'];

            $date_created = Carbon::createFromFormat('d-m-Y', $input['datecreated'])->timestamp;
            $date_expired = Carbon::createFromFormat('d-m-Y', $input['dateexpired'])->timestamp;
            if( $date_expired - $date_created < 0 ) {
                return redirect()
                            ->back()
                            ->withInput($request->all())
                            ->with(['error' => 'Ngày hết hạn phải lớn hơn ngày tạo']);
            }

            $service = null;
            if($id) {
                $service = Service::where(['id' => $id])->first();
            }else {
                $service = new Service;
            }
            $service->title = $input['title'];
            $service->status = isset($input['status']) ? $input['status'] : 1;
            $service->category_id = $input['category_id'];
            $service->supplier_id = $input['supplier_id'];
            $service->email = $input['email'];
            $service->price = $input['price'];
            $service->datecreated = Carbon::createFromFormat('d-m-Y', $input['datecreated'])->toDateTimeString();
            $service->dateexpired = Carbon::createFromFormat('d-m-Y', $input['dateexpired'])->toDateTimeString();
            $service->save();

            Log::info('update service success: ' . $service->title);

            $status = Service::check_status($service);
            if($status == Service::STATUS_WARNING) {
                \App\ServiceLog::saveLog($service);
                return redirect('/quan-ly-dich-vu-thue')->with(['warning' => 'Cập nhật thành công! Dữ liệu của bạn vừa được ghi lại vào `Log theo dõi dịch vụ thuê` để thống kê']);
            }
        }
        return redirect('/quan-ly-dich-vu-thue')->with(['success' => 'Cập nhật thành công']);
    }

    public function mail(Request $request) 
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $id = $input['mail_id'];
            $template_id = $input['template_id'];
            $status = isset($input['status']) ? $input['status'] : 1;

            $template = Template::where(['id' => $template_id])->first();
            $service = Service::where(['id' => $id])->first();

            $mail_info = MailHelper::mail_content_service($template, $service, $status);
            try {
                $config_email_cc = [];
                $config_cc = \App\Config::where(['key' => 'cc'])->first();
                if($config_cc && $config_cc->value) {
                    $config_email_cc = explode(',', $config_cc->value);
                }
                
                MailHelper::send_mail($mail_info, $config_email_cc);
                Log::info('Email sent to: ' . $mail_info['email']);
                \App\EmailLog::saveLog('sent', sprintf('Email [%s] sent to: %s', $status, $mail_info['email']) );
            }catch(Exception $e) {
                Log::error($e->getMessage());
                \App\EmailLog::saveLog('error', sprintf('Email %s sent to: %s with error: %s', $status, $mail_info['email']), $e->getMessage() );
            }
        }

        return redirect('/quan-ly-dich-vu-thue')->with(['success' => 'Gửi mail thành công']);
    }

    public function delete(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $service = Service::where(['id' => $id])->first();
                $service->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy dịch vụ thuê']);
        } 
    }

    public function extra(Request $request) 
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $id = $input['extra_id'];
            $period = $input['period'];
            $unit = $input['unit'];

            $service = Service::where(['id' => $id])->first();
            $expired_day = $service->dateexpired;

            $new_date = \App\Helpers\Utils::extra_time($expired_day, $period, $unit);

            $service->dateexpired = $new_date;
            $service->datecreated = date('Y-m-d');

            $service->save();

            Service::check_status($service);
            
        }

        return redirect('/quan-ly-dich-vu-thue')->with(['success' => 'Gia hạn thành công']);
    }

}
