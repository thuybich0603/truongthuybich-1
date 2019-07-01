<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function getList(){
        $user = User::where("isShow",true)->get();
        return view('admin.user.list', ['user'=>$user]);
    }
    public function getAdd(){
        return view('admin.user.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'address'=>'required',
            'password' => 'required|min:6|max:32',
            're_password' => 'required|same:password'
        ],
        [
            'name.required'=>"Bạn chưa nhập tên người dùng",
            'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'phone.regex'=>'Số điện thoại không đúng',
            'address.required'=>'Bạn chưa nhập địa chỉ',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu chỉ được chứa tối đa 32 ký tự',
            're_password.required'=>"Bạn chưa nhập lại mật khẩu",
            're_password.same'=>"Mật khẩu nhập lại chưa khớp"

        ]); 

        $user = new User();
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('admin/user/add')->with('thongbao','Thêm thành công');
    }
    public function getEdit($id){
       $user = User::find($id);
       return view('admin.user.edit',['user'=>$user]);
    }
    public function postEdit(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'phone' => 'required|regex:/(0)[0-9]{9}/',
            'address'=>'required'	
        ],
        [
            'name.required'=>"Bạn chưa nhập tên người dùng",
            'name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
            'phone.regex'=>'Số điện thoại không đúng',
            'address.required'=>'Bạn chưa nhập địa chỉ'
        ]); 

        $user = User::find($id);
        $user->full_name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if($request->changePassword == "on")
        {
            $this->validate($request,[
                'password' => 'required|min:6|max:32',
                're_password' => 'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
                'password.max'=>'Mật khẩu chỉ được chứa tối đa 32 ký tự',
                're_password.required'=>"Bạn chưa nhập lại mật khẩu",
                're_password.same'=>"Mật khẩu nhập lại chưa khớp"
    
            ]); 
        $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/edit/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getDelete($id){
        DB::table('users')
            ->where('id', $id)
            ->update(['isShow' => false]);

        return redirect('admin/user/list')->with('thongbao','Ẩn thành công');
    }
    public function getShow($id){
        DB::table('type_products')
            ->where('id', $id)
            ->update(['isShow' => true]);

        return redirect('admin/productType/list')->with('thongbao','Hiện thành công');
    }
}
