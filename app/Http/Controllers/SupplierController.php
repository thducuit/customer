<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Supplier;
use Validator;  

class SupplierController extends Controller
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
        
        $supplier = null; 
        if($id) {
            $supplier = Supplier::where(['id' => $id])->first();
        }else {
            $supplier = new Supplier;
        }
        
    	$suppliers = Supplier::get();
        return view('supplier.index', [
        	'suppliers' => $suppliers,
            'supplier' => $supplier,
            'expand' => $isExpand
        ]);
    }

    public function post(Request $request) 
    {
        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'chart_bg_color' => 'required',
                'chart_bd_color' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('/quan-ly-nha-cung-cap')
                            ->withErrors($validator)
                            ->withInput();
            }

            $input = $request->all();
            $id = $input['id'];

            $supplier = null;
            if($id) {
                $supplier = Supplier::where(['id' => $id])->first();
            }else {
                $supplier = new Supplier;
            }
            $supplier->name = $input['name'];
            $supplier->note = '';
            $supplier->chart_bg_color = $input['chart_bg_color'];
            $supplier->chart_bd_color = $input['chart_bd_color'];
            $supplier->save();

            Log::info('update supplier success: ' . $supplier->name);
        }
        return redirect('/quan-ly-nha-cung-cap')->with(['success' => 'Cập nhật thành công']);
    }

    public function delete(Request $request) 
    {
        if($request->ajax()) {
            $input = $request->all();
            $id = $input['id'];
            if($id) {
                $supplier = Supplier::where(['id' => $id])->first();
                $supplier->delete();
                return response(['success' => true]);
            }
            return response(['success' => false, 'message' => 'Không tìm thấy nhà cung cấp']);
        } 
    }
}
