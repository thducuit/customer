<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Template;
use App\MailTask;

class CategoryController extends Controller
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

        $templates = Template::where(['status' => Template::IN_USE])->get();

        $category = null; 
        if($id) {
            $category = Category::where(['id' => $id])->first();
        }else {
            $category = new Category;
        }
        
    	$categories = Category::get();
        return view('category.index', [
        	'categories' => $categories,
            'category' => $category,
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
                'chart_bg_color' => 'required',
                'chart_bd_color' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput($request->all());
            }

            $input = $request->all();
            $id = $input['id'];

            $category = null;
            if($id) {
                $category = Category::where(['id' => $id])->first();
            }else {
                $category = new Category;
            }
            $category->title = $input['title'];
            $category->status = isset($input['status']) ? $input['status'] : 1;
            $category->order = 1;
            $category->chart_bg_color = $input['chart_bg_color'];
            $category->chart_bd_color = $input['chart_bd_color'];
            $category->save();

            //upload photo
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                try{
                    $path = $file->move(public_path("/uploads"), $file->getClientOriginalName() );
                    $category->gallery = $file->getClientOriginalName();
                    $category->save();
                }catch(Exception $e) {
                    Log::error('update photo fail');
                }
            }

            Log::info('update category success: ' . $category->title);
        }
        return redirect('/quan-ly-dich-vu')->with(['success' => 'Cập nhật thành công']);
    }

    public function delete(Request $request) {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $category = Category::where(['id' => $id])->first();
                $category->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy danh mục']);
        } 
    }

    public function mail(Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->all();

            $mail_task = new MailTask;
            $mail_task->template_id = $input['template_id'];
            $mail_task->cc = $input['cc'];
            $mail_task->category_ids = join(',', $input['categories']);
            $mail_task->save();
        }
        return redirect('/quan-ly-dich-vu')->with(['info' => 'Thêm mới thành công! Hệ thống đang bắt đầu gửi mail']);
    }
}
