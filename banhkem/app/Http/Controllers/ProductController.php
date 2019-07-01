<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function getList(){
        $product = Product::where('isShow', 1)->get();
        return view('admin.product.list',['product'=>$product]);
    }
    public function getAdd(){
        $product_type = ProductType::all();
        return view('admin.product.add',['product_type'=>$product_type]);
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'TheLoai' => 'required',
            'Ten' => 'required|unique:products,name|min:3|max:100',
            'Description' => 'required',
            'GiaBan' => 'required|numeric',
            'DonVi' => 'required',
            'New' => 'required'
        ],
        [
            'TheLoai.required'=>"Bạn chưa chọn thể loại",
            'Ten.required'=>'Bạn chưa nhập tên bánh',
            'Ten.min' => 'Tên bánh phải có từ 3 cho đến 100 kí tự',
            'Ten.max' => 'Tên bánh phải có từ 3 cho đến 100 kí tự',
            'Ten.unique'=>"Tên bánh đã tồn tại",
            'Description.required'=>"Bạn chưa nhập mô tả",
            'GiaBan.required' => "Bạn chưa nhập giá tiền",
            'GiaBan.numeric' =>"Giá tiền không đúng",
            'DonVi.required' => "Bạn chưa nhập đơn vị",
            'New' => "Bạn chưa chọn trạng thái sản phẩm"

        ]); 
        $product = new Product;
        $product->name = $request->Ten;
        $product->id_type = $request->TheLoai;
        $product->description = $request->Description;
        $product->unit_price = $request->GiaBan;
        $product->unit = $request->DonVi;
        $product->new = $request->New;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add
        
        ')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("source/image/product/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$Hinh);
            $product->image = $Hinh;
        }

        else{
            $product->image = "";
        }

       $product->save();

        return redirect('admin/product/add
        
        ')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getEdit($id){
        $product = Product::find($id);
        $product_type = ProductType::all();
        return view('admin.product.edit',['product'=>$product,'product_type'=>$product_type]); 
    }
    public function postEdit(Request $request, $id){
        $product = Product::find($id);
        $this->validate($request,[
            'TheLoai' => 'required',
            'Ten' => 'required|min:3|max:100',
            'Description' => 'required',
            'GiaBan' => 'required|numeric',
            'DonVi' => 'required',
            'New' => 'required'
        ],
        [
            'TheLoai.required'=>"Bạn chưa chọn thể loại",
            'Ten.required'=>'Bạn chưa nhập tên bánh',
            'Ten.min' => 'Tên bánh phải có từ 3 cho đến 100 kí tự',
            'Ten.max' => 'Tên bánh phải có từ 3 cho đến 100 kí tự',
            
            'Description.required'=>"Bạn chưa nhập mô tả",
            'GiaBan.required' => "Bạn chưa nhập giá tiền",
            'GiaBan.numeric' =>"Giá tiền không đúng",
            'DonVi.required' => "Bạn chưa nhập đơn vị",
            'New' => "Bạn chưa chọn trạng thái sản phẩm"

        ]); 
        $product->name = $request->Ten;
        $product->id_type = $request->TheLoai;
        $product->description = $request->Description;
        $product->unit_price = $request->GiaBan;
        $product->unit = $request->DonVi;
        $product->new = $request->New;

        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add
        
        ')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str_random(4)."_".$name;
            while(file_exists("source/image/product/".$Hinh))
            {
                $Hinh = str_random(4)."_". $name;
            }
            $file->move("source/image/product",$Hinh);
            
            //Xóa file ảnh cũ đi 
            unlink("source/image/product".$product->image);
            $product->image = $Hinh;
        }
       $product->save();
       return redirect("admin/product/edit/".$id)->with('thongbao','Sửa thành công');
    }

    public function getDelete($id){
        DB::table('products')
            ->where('id', $id)
            ->update(['isShow' => false]);

        return redirect('admin/product/list')->with('thongbao','Xóa thành công');
    }

}
