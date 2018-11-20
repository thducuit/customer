<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Validator;
use App\Template;
use App\Config;

class EmailTemplateController extends Controller
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
        $is_expand = $request->get('expand', false);
        $is_auto = $request->get('auto', false);

        $template = null; 
        if($id) {
            $template = Template::where(['id' => $id])->first();
        }else {
            $template = new Template;
        }
        
    	$templates = Template::all();
        return view('template.index', [
        	'templates' => $templates,
            'template' => $template,
            'expand' => $is_expand,
            'auto' => $is_auto
        ]);
    }

    public function post(Request $request) 
    {
        if($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'status' => 'required',
                'content' => 'required'
            ]);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput($request->all());
            }


            $input = $request->all();
            $id = $input['id'];

            $template = null;
            if($id) {
                $template = Template::where(['id' => $id])->first();
            }else {
                $template = new Template;
            }
            $template->title = $input['title'];
            $template->status = isset($input['status']) ? $input['status'] : 1;
            $template->content = stripslashes($input['content']);
            $template->save();

            Log::info('update template success: ' . $template->title);
        }
        return redirect('/quan-ly-mau-email')->with(['success' => 'Cập nhật thành công']);
    }

    public function delete(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $template = Template::where(['id' => $id])->first();
                $template->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'template not found']);
        } 
    }

    public function auto(Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $id = $input['auto_id'];
            $cc = $input['cc'];
            $auto = $input['auto'];

            $template = Template::where(['id' => $id])->first();
            Template::where('auto', '=', $auto)->update(['auto' => 0]);

            $template->auto = $auto;
            $template->cc = $cc;
            $template->save();

            Log::info('update auto template success: ' . $template->title);
        }
        return redirect('/quan-ly-mau-email')->with(['success' => 'Cập nhật thành công']);
    }

    public function addCC(Request $request) 
    {
        $config_cc = Config::where(['key' => 'cc'])->first();
        if(empty($config_cc)) {
            $config_cc = new Config;
            $config_cc->key = 'cc';
            $config_cc->save();
        }
        return view('template.cc', [
            'config_cc' => $config_cc
        ]);
    }

    public function cc(Request $request)
    {
        if($request->isMethod('post')) {
            $input = $request->all();
            $config_cc = Config::where(['key' => 'cc'])->first();
            $config_cc->value = $input['email'];
            $config_cc->save();

        }
        return redirect('/them-cc')->with(['success' => 'Cập nhật thành công']);
    }

    public function get(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $template = Template::where(['id' => $id])->first();
                return response(['success' => true, 'template' => $template]);
            }
            return response(['success' => false, 'message' => 'template not found']);
        }
    }


}
