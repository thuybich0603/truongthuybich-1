<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bill;

class BillsController extends Controller
{
    public function getList(){
        $bills = Bill::all();
        return view('admin.bills.list',['bills'=>$bills]);
    }
    public function getDelete($id){
        DB::table('bill_detail')
            ->where('id_bill', $id)
            ->delete();

        DB::table('bills')
            ->where('id', $id)
            ->delete();

        return redirect('admin/bills/list')->with('thongbao','Xoa thành công');
    }
    public function getEdit($id){
        $bill = Bill::find($id);
        return view('admin.bills.edit',['bill'=>$bill]);
    }
    public function postEdit(Request $request, $id){
        $bill = Bill::find($id);
        $bill->status = $request->status;
        $bill->save();

        return redirect('admin/bills/list')->with('thongbao','Sửa thành công');
    }

    
}
