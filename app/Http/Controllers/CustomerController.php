<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Management;
use App\Category;
use App\Template;
use App\Supplier;
use App\Helpers\Mail as MailHelper;
use Illuminate\Support\Facades\Log;
use Validator;
use Carbon\Carbon;

class CustomerController extends Controller
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
        $page = $request->get('page');
        $isExpand = $request->get('expand', '');

        //filter
        $keyword = $request->get('key', null);
        $category = $request->get('cat', 0);
        $sort = $request->get('sort', null);
        $status = $request->get('status', -1);
        $orders = $request->get('order', []);

        if($request->isMethod('post')) {
            foreach($orders as $idx => $value) {
                $customer = Management::where(['id' => $idx])->first();
                $customer->order = $value;
                $customer->save();
            }
        }

        $query = Management::whereIn('status', [0, 1, 2]);
        if(!empty($category)) {
            $query->where(['category_id' => $category]);
        }

        if(!empty($keyword)) {
            $query->where('customer', 'like', '%' . $keyword . '%');
        }

        if(is_numeric($status) && $status != -1) {
            $query->where(['status' => $status]);
        }

        if(!empty($sort)) {
            if($sort == 'category') {
                $query->orderBy('category_id');
            }
            else if($sort == 'ID'){
                $query->orderBy('id');
            }
        }else
        {
            $query->orderBy('order', 'asc');
        }
        $customers = $query->paginate(15);

        $categories = Category::where(['status' => 1])->get();
        $suppliers = Supplier::all();
        $templates = Template::where(['status' => Template::IN_USE])->get();

        $customer = null; 
        if($id) {
            $customer = Management::where(['id' => $id])->first();
        }else {
            $customer = new Management;
        }

        return view('customer.index', [
        	'customers' => $customers,
            'categories'=> $categories,
            'suppliers' => $suppliers,
            'customer'=> $customer,
            'templates'=> $templates,
            'key'=> $keyword,
            'cat'=> $category,
            'status'=> $status,
            'sort'=> $sort,
            'page'=> $page,
            'expand' => $isExpand
        ]);
    }

    public function post(Request $request) 
    {
        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'customer' => 'required',
                'services' => 'required',
                'category_id' => 'required',
                'supplier_id' => 'required',
                'services' => 'required',
                'datecreated' => 'required',
                'dateexpired' => 'required',
                'price' => 'required',
                'contact' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'status' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect('/quan-ly-khach-hang')
                            ->withErrors($validator)
                            ->withInput();
            }

            $input = $request->all();
            $id = $input['id'];

            $customer = null;
            if($id) {
                $customer = Management::where(['id' => $id])->first();
            }else {
                $customer = new Management;
            }

            $datecreated = Carbon::createFromFormat('d-m-Y', $input['datecreated'])->timestamp;
            $dateexpired = Carbon::createFromFormat('d-m-Y', $input['dateexpired'])->timestamp;
            if( $dateexpired - $datecreated < 0 ) {
                return redirect('/quan-ly-khach-hang')->with(['error' => 'Ngày hết hạn phải lớn hơn ngày tạo']);
            }

            $customer->customer = $input['customer'];
            $customer->services = $input['services'];
            $customer->category_id = $input['category_id'];
            $customer->supplier_id = $input['supplier_id'];
            $customer->datecreated = Carbon::createFromFormat('d-m-Y', $input['datecreated'])->toDateTimeString();
            $customer->dateexpired = Carbon::createFromFormat('d-m-Y', $input['dateexpired'])->toDateTimeString();
            $customer->price = $input['price'];
            $customer->contact = $input['contact'];
            $customer->email = $input['email'];
            $customer->phone = $input['phone'];
            $customer->note = $input['note'];
            $customer->status = $input['status'];
            $customer->save();

            Management::check_status($customer);

            Log::info('update customer success: ' . $customer->customer);

            return redirect('/quan-ly-khach-hang')->with(['success' => 'Cập nhật thành công']);
        }        
    }

    public function delete(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $customer = Management::where(['id' => $id])->first();
                $customer->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'customer not found']);
        } 
    }

    public function mail(Request $request) 
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $id = $input['mail_id'];
            $template_id = $input['template_id'];
            $status = isset($input['status']) ? $input['status'] : 1;

            $template = Template::where(['id' => $template_id])->first();
            $customer = Management::where(['id' => $id])->first();

            $mail_info = MailHelper::mail_content($template, $customer, $status);
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

        return redirect('/quan-ly-khach-hang')->with(['success' => 'Gửi mail thành công']);
    }

    public function extra(Request $request) 
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $id = $input['extra_id'];
            $period = $input['period'];
            $unit = $input['unit'];

            $customer = Management::where(['id' => $id])->first();
            $expired_day = $customer->dateexpired;

            $new_date = \App\Helpers\Utils::extra_time($expired_day, $period, $unit);

            $customer->dateexpired = $new_date;
            $customer->datecreated = date('Y-m-d');

            $customer->save();

            Management::check_status($customer);
            
        }

        return redirect('/quan-ly-khach-hang')->with(['success' => 'Gia hạn thành công']);
    }
}
