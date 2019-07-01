<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dothi', 'PageController@dothi');


Route::get('/', function () {
    return view('welcome');
});

 Route::get('index',[
 	'as'=>'trang-chu',
 	'uses'=>'PageController@getIndex'
 ]);

   Route::get('loai-san-pham/{type}',[
 	'as'=>'loaisanpham',
 	'uses'=>'PageController@getLoaiSp'
   ]);
  
   Route::get('chi-tiet-san-pham/{id}',[
 	'as'=>'chitietsanpham',
 	'uses'=>'PageController@getChitiet'
   ]);

   Route::get('lien-he',[
 	'as'=>'lienhe',
 	'uses'=>'PageController@getLienHe'
   ]);

   Route::get('gioi-thieu',[
 	'as'=>'gioithieu',
 	'uses'=>'PageController@getGioiThieu'
   ]);

   Route::get('add-to-cart/{id}',[
	   'as'=>'themgiohang',
	   'uses'=>'PageController@getAddtoCart'
   ]);

   Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
   ]);

	Route::get('dat-hang',[
		'as'=>'dathang',
		'uses'=>'PageController@getCheckout'
	]);
	Route::post('dat-hang',[
	   'as'=>'dathang',
	   'uses'=>'PageController@postCheckout'
   ]);
	Route::get('chi-tiet-dat-hang',[
	   'as'=>'chitietdathang',
	   'uses'=>'PageController@getChitietdathang'
	]);
	Route::post('chi-tiet-dat-hang',[
	   'as'=>'chitietdathang',
	   'uses'=>'PageController@postChitietdathang'
   ]);
	 
	 Route::get('thay-doi-chi-tiet-dat-hang',[
		'as'=>'thaydoichitietdathang',
		'uses'=>'PageController@changeNumber'
	]);

   Route::get('dang-nhap',[
	   'as'=>'login',
	   'uses'=>'PageController@getLogin'
   ]);

   Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
   ]);

   Route::get('dang-ky',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
   ]);

   Route::post('dang-ky',[
	'as'=>'signup',
	'uses'=>'PageController@postSignup'
   ]);

   Route::get('dang-xuat',[
	   'as'=>'logout',
	   'uses'=>'PageController@postLogout'
   ]);


	Route::get('search',[
		'as'=>'search',
		'uses'=>'PageController@getSearch'
	]);
	
	Route::group(['prefix'=>'admin'], function(){
		Route::group(['prefix'=>'productType'], function(){
			//admin/productType/danhsach
			Route::get('list','ProductTypeController@getList');
			Route::get('add','ProductTypeController@getAdd');
			Route::post('add','ProductTypeController@postAdd');

			Route::get('edit/{id}','ProductTypeController@getEdit');
			Route::post('edit/{id}','ProductTypeController@postEdit');
			
			Route::get('delete/{id}','ProductTypeController@getDelete');
			Route::get('show/{id}','ProductTypeController@getShow');
			
		});
		Route::group(['prefix'=>'product'], function(){
			Route::get('list','ProductController@getList');
			Route::get('add','ProductController@getAdd');
			Route::post('add','ProductController@postAdd');

			Route::get('edit/{id}','ProductController@getEdit');
			Route::post('edit/{id}','ProductController@postEdit');

			Route::get('delete/{id}','ProductController@getDelete');
		});
		Route::group(['prefix'=>'bills'], function(){
			Route::get('list','BillsController@getList');
			Route::get('delete/{id}','BillsController@getDelete');
			Route::get('edit/{id}','BillsController@getEdit');
			Route::post('edit/{id}','BillsController@postEdit');
			Route::get('details/{id}','BillsController@getChiTiet');
			Route::post('details/{id}','BillsController@posttChiTiet');
		});
		Route::group(['prefix'=>'billdetail'], function(){
			Route::get('list','BilldetailController@getList');
			Route::get('add','BilldetailController@getAdd');
			Route::get('edit','BilldetailController@getEdit');
			
		});
		Route::group(['prefix'=>'customer'], function(){
			Route::get('list','CustomerController@getList');
			Route::get('add','CustomerController@getAdd');
			Route::get('edit','CustomerController@getEdit');
		});
		Route::group(['prefix'=>'news'], function(){
			Route::get('list','NewsController@getList');
			Route::get('add','NewsController@getAdd');
			Route::get('edit','NewsController@getEdit');
		});
		Route::group(['prefix'=>'user'], function(){
			Route::get('list','UserController@getList');
			Route::get('add','UserController@getAdd');
			Route::post('add','UserController@postAdd');

			Route::get('edit/{id}','UserController@getEdit');
			Route::post('edit/{id}','UserController@postEdit');
			Route::get('delete/{id}','UserController@getDelete');
		});
		Route::group(['prefix'=>'slide'], function(){
			Route::get('list','SlideController@getList');
			Route::get('add','SlideController@getAdd');
			Route::get('edit','SlideController@getEdit');
		});
	});

	Route::get('lienketbang', function(){
		Schema::table('products',function($table){
			$table->unsignedInteger('id_type')->unsigned();
			$table->foreign('id_type')->references('id')->on('type_products')->onDelete('cascade');
		});
		echo 'da thuc hien tao thanh cong';
	});