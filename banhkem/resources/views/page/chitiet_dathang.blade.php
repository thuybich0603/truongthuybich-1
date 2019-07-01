@extends('master')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
/* Global settings */
 
.product-image {
  float: left;
  width: 20%;
}
 
.product-details {
  float: left;
  width: 37%;
}
 
.product-price {
  float: left;
  width: 12%;
}
 
.product-quantity {
  float: left;
  width: 10%;
}
 
.product-removal {
  float: left;
  width: 9%;
}
 
.product-line-price {
  float: left;
  width: 12%;
  text-align: right;
}
 
/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before,
.group:after,
.shopping-cart:after,
.column-labels:after,
.product:after,
.totals-item:after {
  content: '';
  display: table;
}
 
.group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
  clear: both;
}
 
.group, .shopping-cart, .column-labels, .product, .totals-item {
  zoom: 1;
}
 
/* Apply clearfix in a few places */
/* Apply dollar signs */

 
/* Body/Header stuff */
.shopping-cart {
  padding: 0px 30px 30px 20px;
  font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 100;
}
 
h1 {
  font-weight: 100;
}
 
label {
  color: #aaa;
}
 
.shopping-cart {
  margin-top: -45px;
}
 
/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}
.column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
  text-indent: -9999px;
}
 
/* Product entries */
.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
  font-size: 12px;
  border-radius: 3px;
}
.product .remove-product:hover {
  background-color: #a44;
}
 
/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}
.totals .totals-item-total {
  font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
}
 
.checkout {
  float: right;
  border: 0;
  margin-top: 20px;
  padding: 6px 25px;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}
 
.checkout:hover {
  background-color: #494;
}
 
/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }
 
  .column-labels {
    display: none;
  }
 
  .product-image {
    float: right;
    width: auto;
  }
  .product-image img {
    margin: 0 0 10px 10px;
  }
 
  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }
 
  .product-price {
    clear: both;
    width: 70px;
  }
 
  .product-quantity {
    width: 100px;
  }
  .product-quantity input {
    margin-left: 20px;
  }
 
  .product-quantity:before {
    content: 'x';
  }
 
  .product-removal {
    width: auto;
  }
 
  .product-line-price {
    float: right;
    width: 70px;
  }
}
/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }
 
  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }
 
  .product .product-line-price:before {
    content: 'Item Total: đ';
  }
 
  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
}
</style>
<!------ Include the above in your HEAD tag ---------->
<br><br><br>
 
<div class="shopping-cart">
 
  <div class="column-labels">
    <label class="product-image">Hình ảnh</label>
    <label class="product-details">Sản phẩm</label>
    <label class="product-price">Đơn giá</label>
    <label class="product-quantity">Số lượng</label>
    <label class="product-removal">Xóa</label>
    <label class="product-line-price">Tổng tiền</label>
  </div>
  @if(Session::has('cart'))
	@foreach($product_cart as $cart)
  <div class="product">
    <div class="product-image">
      <img src="source/image/product/{{$cart['item']['image']}}">
    </div>
    <div class="product-details">
      <div class="product-title">{{$cart['item']['name']}}</div>
      
    </div>
    <!-- <div class="product-price">{{number_format($cart['item']['unit_price'])}}đ</div> -->
    <div class="product-price">
    @if($cart['item']->new!=0)
												<span class="flash-sale" style="color:black">{{number_format($cart['item']->unit_price)}} đ</span>
											@else
												<span class="flash-del" style="color:gray">{{number_format($cart['item']->unit_price)}} đ</span>
												<span class="flash-sale" style="color:black">{{number_format($cart['item']->unit_price - ($cart['item']->unit_price *0.1))}} đ</span>
											@endif
    </div>
    <div class="product-quantity">
      <input type="number" value="{{$cart['qty']}}" min="1">
      <a href="{{route('chitietdathang')}}"><button style="background-color:orange; border-collapse: collapse;color:white;border:none">Cập nhật</button></a>
    </div>
    <div class="product-removal">
	<a href="{{route('xoagiohang',$cart['item']['id'])}}" class="remove" title="Remove this item" style="color:black">Xóa<i class="fa fa-trash-o" style="color:black"></i></a>
    </div>
    <div class="product-line-price" style="color:red">@if($cart['item']['new']==0)
													{{number_format(($cart['item']['unit_price']-($cart['item']['unit_price']*0.1))*$cart['qty'])}}
												@else
													{{number_format($cart['item']['unit_price']*$cart['qty'])}} 
												@endif</div>
  </div>
 
  @endforeach
@endif
 
  <div class="totals">
    <div class="totals-item">
      <label>Tổng tiền</label>
      <div class="totals-value" id="cart-subtotal">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif đ</div>
    </div>
  </div>
       
      <button class="checkout"><a href="{{route('dathang')}}" style="color:white">Đặt Hàng</a></button>
 
</div>
<script>

$(document).ready(function() {
 

 /* Assign actions */
 $('.product-quantity input').change( function() {
   updateQuantity(this);
 });
  

 /* Recalculate cart */
 function recalculateCart()
 {
   var subtotal = 0;
	
   /* Sum up row totals */
   $('.product').each(function () {
	 subtotal += parseFloat($(this).children('.product-line-price').text());
   });
	

	
   /* Update totals display */
   $('.totals-value').fadeOut(fadeTime, function() {
	 $('#cart-subtotal').html(subtotal.toFixed(3));
	 $('#cart-tax').html(tax.toFixed(2));
	 $('#cart-shipping').html(shipping.toFixed(2));
	 $('#cart-total').html(total.toFixed(2));
	 if(total == 0){
	   $('.checkout').fadeOut(fadeTime);
	 }else{
	   $('.checkout').fadeIn(fadeTime);
	 }
	 $('.totals-value').fadeIn(fadeTime);
   });
 }
  
  
 /* Update quantity */
 function updateQuantity(quantityInput)
 {
   /* Calculate line price */
   var productRow = $(quantityInput).parent().parent();
   var price = parseFloat(productRow.children('.product-price').text());
   var quantity = $(quantityInput).val();
   var linePrice = price * quantity;
   var productName = productRow.children('.product-details').children('.product-title').text();
	

   $.get("{{route('thaydoichitietdathang')}}", 
   {
    name : productName,
    number : quantity
   },
     function (data, textStatus, jqXHR) {
       console.log(data);
     },
     "dataType"
   );
 }
  

  
 });
  
 
</script>
@endsection