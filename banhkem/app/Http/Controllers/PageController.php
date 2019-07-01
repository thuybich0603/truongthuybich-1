<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill; 
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
    	$slide = Slide::all();
    	$sanpham_khuyenmai = Product::where('new',0)->where('isShow',1)->paginate(4);
    	$new_product = Product::where('new',1)->where('isShow',1)->paginate(8);
    	return view('page.trangchu',compact('slide','sanpham_khuyenmai','new_product'));
    }

    public function getLoaiSp($type){
    	$sp_theoloai = Product::where('id_type', $type)->get();
    	$sp_khac = Product::where('id_type','<>',$type)->paginate(3);
    	$loai = ProductType::where("isShow",1)->get();
    	$loai_sp = ProductType::where('id',$type)->where("isShow",1)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitiet(Request $req){
		$sanpham = Product::where('id',$req->id)->first();  //moi s.pham chi co mot id duy nhat nen t (dung ham first() chi lay 1s.pham), thay vi (dung get() lay het)
		$sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
		$new_product = Product::where('unit_price','<>',1);
    	return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu','new_product'));
    }

     public function getLienHe(){
    	return view('page.lienhe');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
	}
	
	public function getAddtoCart(Request $req,$id){
	
		$product = Product::find(
			$id);
		$oldCart = Session('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart->add($product, $id);
		$req->session()->put('cart',$cart);
		return redirect()->back();
	
	}
	public function changeNumber(Request $req){
		$name=$req['name'];
		$number = $req['number'];

		$product = DB::table('products')->where('name', $name)->first();
		$oldCart = Session('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		//$cart->removeItem($product->id);
		$cart->changeNumber($product, $product->id,$number);
		$req->session()->put('cart',$cart);
	
	}


	public function getDelItemCart($id){
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		if(count($cart->items) >= 0){
			Session::put('cart',$cart);
		}
		else{
			Session::forget('cart');
		}
		return redirect()->back();
	}

	public function getCheckout(){
		return view('page.dat_hang');
	}
	public function getChitietdathang(){
		return view('page.chitiet_dathang');
	}
	public function postChitietdathang(Request $req){
		$cart = Session::get('cart');
		$bill = new Bill;
		// $bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = $cart->totalPrice;
		// $bill->payment = $req->payment_method;
		// $bill->note = $req->notes;
		$bill->save();
		foreach ($cart->items as $key => $value){
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $key; 
			$bill_detail->quantity = $value['qty'];
			$bill_detail->unit_price = ($value['price']/$value['qty']);
			$bill_detail->save();
		}
	}
	public function postCheckout(Request $req){
		$cart = Session::get('cart');
		$this->validate($req,
			[
				
				'email'=>'required|email',
				'phone' => 'required|regex:/(0)[0-9]{9}/'	
			],
			[
				
				'email.required'=>'Vui lòng nhập Email',
				'email.email'=>'Không đúng định dạng Email',
				'phone.regex'=>'Số điện thoại không đúng'
				
			]);
			
		$customer = new Customer;
		$customer->name = $req->name;
		$customer->gender = $req->gender;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->phone;
		$customer->note = $req->notes;
		$customer->save(); //để lưu vào database

		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = $cart->totalPrice;
		$bill->payment = $req->payment_method;
		$bill->note = $req->notes;
		$bill->save();
		
	   
		foreach ($cart->items as $key => $value){
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $key; 
			$bill_detail->quantity = $value['qty'];
			$bill_detail->unit_price = ($value['price']/$value['qty']);
			$bill_detail->save();
		}
		Session::forget('cart'); //sau khi lưu thành công thì ta dùng hàm forget() để quên session giỏ hàng đi
		//sau đó return về view cũ và in ra thông báo là đặt hàng thành công
		return redirect()->back()->with('thongbao','Đặt Hàng Thành Công');
	}

	public function getLogin(){
		return view('page.dangnhap');
	}

	public function getSignup(){
		return view('page.dangky');
	}

	public function postSignup(Request $req){
		$this->validate($req,
			[
				
				'email'=>'required|email|unique:users,email',
				'fullname'=>'required',
				'password'=>'required|min:6|max:20',
				're_password'=>'required|same:password',
				'phone' => 'required|regex:/(0)[0-9]{9}/'
			],
			[
				'email.required'=>'Vui lòng nhập Email',
				'email.email'=>'Không đúng định dạng Email',
				'email.unique'=>'Email đã có người sử dụng',
				'password.required'=>'Vui lòng nhập mật khẩu',
				're_password.same'=>'Mật khẩu không giống nhau',
				'password.min'=>'Mật khẩu ít nhất phải có 6 kí tự',
				'phone.regex' => 'Số điện thoại không đúng ' 

			]);
			$user = new User();
			$user->full_name = $req->fullname;
			$user->email = $req->email;
			$user->password = Hash::make($req->password);
			$user->phone = $req->phone;
			$user->address = $req->address;
			$user->save();
			return redirect()->back()->with('thanhcong','Tạo tài khoản Thành Công');
	}

	public function postLogin(Request $req){
		$this->validate($req,
			[
				'email'=>'required|email',
				'password'=>'required|min:6|max:20'
			],
			[
				'email.required'=>'Vui lòng nhập email',
				'email.email'=>'Email không đúng định dạng',
				'password.required'=>'Vui lòng nhập mật khẩu',
				'password.min'=>'Mật khẩu ít nhất có 6 ký tự',
				'password.max'=>"Mật khẩu không quá 20 ký tự"
			]
			);
			$credentials = array('email'=>$req->email, 'password'=>$req->password);
			if(Auth::attempt($credentials)){
				
				return redirect()->route('trang-chu');
				// return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
			}
			else{
				return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
			}
	}

	public function postLogout( Request $req){
		Auth::logout();
		// $req->Session()->flush();
		// Session::forget('cart');
		return redirect()->route('trang-chu');
	}

	public function getSearch(Request $req){
		$product = Product::where('name','like','%'.$req->key.'%')
							->orwhere('unit_price',$req->key)
							->get();
		return view('page.search',compact('product'));
	}
}
