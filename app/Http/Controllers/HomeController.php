<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChartService;
use App\Category as Category;
use App\Supplier as Supplier;
use App\Template as Template;
use App\MailTask;

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

        $labels1 = ["T1", "T2", "T3", "T4", "T5", "T6", "T7", "T8", "T9", "T10", "T11", "T12"];
        $labels2 = [];
        foreach($suppliers as $sup) {
            $labels2[] = $sup->name;
        }
        
        $expiredCustomerByMonth =  $this->chart_service_ins->getExpiredCustomerByMonth();
        $serviceByCategoryAndSupplier = $this->chart_service_ins->getServiceByCategoryAndSupplier();
        $expiredServiceByMonth = $this->chart_service_ins->getExpiredServiceByMonth();

        return view('home', [
            'chart1' => $expiredCustomerByMonth,
            'table1' => $expiredCustomerByMonth['datasets'],
            'chart2' => $serviceByCategoryAndSupplier,
            'table2' => $expiredServiceByMonth['datasets'],
            'labels1' => $labels1,
            'labels2' => $labels2,
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }


    public function mail(Request $request)
    {
        $categories = Category::where(['status' => 1])->get();
        $templates = Template::where(['status' => Template::IN_USE])->get();

        if($request->isMethod('post')) {
            $input = $request->all();

            if( !isset($input['categories']) && empty($input['categories']) && empty($input['email']) ) {
                return redirect('/gui-mail')->with(['error' => 'Chọn `Dịch vụ` hoặc nhập `Email`', 'input' => $input]);
            }

            if( $input['template_id'] == 0 && empty($input['title']) ) {
                return redirect('/gui-mail')->with(['error' => 'Chọn `Mẫu email` hoặc nhập đày đủ `Tiêu đề` và `Nội dung`', 'input' => $input]);
            }

            $mail_task = new MailTask;
            $mail_task->template_id = $input['template_id'];
            $mail_task->email = $input['email'];
            $mail_task->title = $input['title'];
            $mail_task->category_ids = isset($input['categories']) ? join(',', $input['categories']) : '';
            $mail_task->content = stripslashes($input['content']);
            $mail_task->save();

            return redirect('/gui-mail')->with(['info' => 'Thêm mới thành công! Hệ thống đang bắt đầu gửi mail']);
        }

        return view('home.mail', [
            'categories' => $categories,
            'templates' => $templates,
        ]);
    }
}
