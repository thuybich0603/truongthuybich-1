<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ProductType;
use Illuminate\Support\Facades\DB;
class ProductTypeController extends Controller
{
    public function getList(){
        $theloai = ProductType::where("isShow",true)->get();
        return view('admin.productType.list',['theloai'=>$theloai]);
    }
    public function getAdd(){
        return view('admin.productType.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'Ten' => 'required|unique:type_products,name|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập thể loại',
            'Ten.min' => 'Tên thể loại phải có từ 3 cho đến 100 kí tự',
            'Ten.max' => 'Tên thể loại phải có từ 3 cho đến 100 kí tự',
            'Ten.unique'=>"Tên thể loại đã tồn tại"

        ]); 
        $theloai = new ProductType;
        $theloai->name = $request->Ten;
        
        $theloai->save();

        return redirect('admin/productType/add
        
        ')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
        $theloai = ProductType::find($id);
        return view('admin.productType.edit',['theloai'=>$theloai]);
    }
    public function postEdit(Request $request, $id){
        $theloai = ProductType::find($id);
        $this->validate($request,[
            'Ten' => 'required|unique:type_products,name|min:3|max:100'
        ],
        [
            'Ten.required'=>"Bạn chưa nhập tên thể loại",
            'Ten.unique'=>'Tên thể loại đã tồn tại',
            'Ten.min' => 'Tên thể loại phải có từ 3 cho đến 100 kí tự',
            'Ten.max' => 'Tên thể loại phải có từ 3 cho đến 100 kí tự'
        ]);

        $theloai->name = $request->Ten;
        $theloai->unsign_name = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/productType/edit/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getDelete($id){
        DB::table('type_products')
            ->where('id', $id)
            ->update(['isShow' => false]);

        return redirect('admin/productType/list')->with('thongbao','Ẩn thành công');
    }
    public function getShow($id){
        DB::table('type_products')
            ->where('id', $id)
            ->update(['isShow' => true]);

        return redirect('admin/productType/list')->with('thongbao','Hiện thành công');
    }
}
