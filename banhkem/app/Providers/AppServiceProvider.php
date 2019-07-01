<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header', function($view){
            $loai_sp = ProductType::where("isShow",true)->get();
            $view->with('loai_sp',$loai_sp);
        });

        view()->composer(['header','page.dat_hang','page.chitiet_dathang'],function($view){
            if(Session('cart')){
                //tạo 1 biến $oldCart để k.tra xem thử trong giỏ hàng hiện tại của mình có sản phẩm nào được mua hay chưa, và lấy session của cart hiện tại của mình
                $oldCart = Session::get('cart'); //lấy giỏ hàng hiện tại gắn                                     vào giỏ hàng cũ
                $cart = new Cart($oldCart); //kiểm tra giỏ hàng hiện tại của                               mình có hay chưa, nếu có rồi thì                               gán vào giỏ hàng mới và gán vào                                cái Cart mới  
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
