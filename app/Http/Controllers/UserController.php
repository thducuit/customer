<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Validator;
use App\User;

class UserController extends Controller
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

        $user = null; 
        if($id) {
            $user = User::where(['id' => $id])->first();
        }else {
            $user = new User;
        }
        
    	$users = User::get();
        return view('user.index', [
        	'choosen_user' => $user,
        	'users' => $users,
            'expand' => $isExpand
        ]);
    }

    public function change(Request $request) 
    {
        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'password' => 'required|min:6|confirmed'
            ]);

            if ($validator->fails()) {
                return back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $input = $request->all();
            $id = $input['id'];

            $user = User::where(['id' => $id])->first();
            
            // if(empty($user)) {
            //     return back()->withError('Mật khẩu cũ không đúng');
            // }

            // if($input['old_password'] == $input['password']) {
            //     return back()->withError('Mật khẩu mới phải khác mật khẩu cũ');
            // }

            $user->password = bcrypt($input['password']);
            $user->save();

            Log::info('update password success: ' . $user->email);
        }
        return redirect('/quan-ly-tai-khoan')->with(['success' => 'Đổi mật khẩu thành công']);
    }

    public function delete(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $category = User::where(['id' => $id])->first();
                $category->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy tài khoản']);
        } 
    }
}
