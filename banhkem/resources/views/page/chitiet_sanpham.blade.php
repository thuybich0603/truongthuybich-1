@extends('master')
@section('content')
<style>
.hinhanh{
	width: 100%;
	height: 200px;
}
</style>

<div class="container-fluid" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)),  url('source/image/new_products/9.jpg');
			background-position: center;
			background-size: cover;
			background-repeat: no-repeat;
			 height:300px">
	<p class="text-center" style="color:white; font-weight: bold; font-size: 30px; padding-top: 130px"> SHOP</p
	><hr style="width: 150px; margin:auto; background-color: orange" class="mt-2"></div>
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<div class="col-sm-4">
					@if($sanpham->new==0)
										<div class="ribbon-wrapper"><div class="ribbon sale">-10%</div></div>
									@endif
									<div class="single-item-header">
						<img src="source/image/product/{{$sanpham->image}}" alt=""></div>
					</div>
					<div class="col-sm-8">
					<div class="single-item-body">
										<p class="single-item-title">{{$sanpham->name}}</p>
										<p class="single-item-price">
											@if($sanpham->new!=0)
												<span class="flash-sale">{{number_format($sanpham->unit_price)}} đ</span>
											@else
												<span class="flash-del">{{number_format($sanpham->unit_price)}} đ</span>
												<span class="flash-sale">{{number_format($sanpham->unit_price - ($sanpham->unit_price *10/100))}} đ</span>
											@endif
										</p>
									</div>

						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>

						<div class="single-item-desc">
							<p>{{$sanpham->description}}</p>
						</div>
						<div class="space20">&nbsp;</div>

						
						<div class="single-item-options">
						@if(Session::has('cart'))
							<a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
							<div class="clearfix"></div>
							
                                @endif
						</div>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{{$sanpham->description}}</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản phẩm tương tự</h4>

					<div class="row">
						@foreach($sp_tuongtu as $sptt)
						<div class="col-sm-4 mt-5">
						<div class="single-item">
									@if($sptt->new==0)
										<div class="ribbon-wrapper"><div class="ribbon sale">-10%</div></div>
									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="230px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sptt->new!=0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}} đ</span>
											@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} đ</span>
												<span class="flash-sale">{{number_format($sptt->unit_price - ($sptt->unit_price *10/100))}} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row">{{$sp_tuongtu->links()}}</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				
				<marquee direction="up" behavior="scroll" scrolldelay="seconds" height="300px" style="padding:10px">
						
							<a href="#"><img src="https://images.unsplash.com/photo-1469533667357-006056eaf780?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" width="100%"/> </a>
							<div class="decs">
								<b style="color:#585858">Bánh Kem Socala Cherry</b><hr style="border:1px solid gray">
							</div>
							<br/>
						
							<a href="monan_bobittet.html"><img src="https://images.unsplash.com/photo-1483695028939-5bb13f8648b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" width="100%"/> </a>
							<div class="decs">
								<b style="color:#585858">Bánh mỳ các loại</b><hr style="border:1px solid gray">
							</div>
						
							<br/>
							<a href="monan_pizzahaisan.html"><img src="https://images.unsplash.com/photo-1496174883999-edcc585a373f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"/> </a>
							<div class="decs">
								<b style="color:#585858">Muffins dâu</b><hr style="border:1px solid gray">
							</div>
							<br/>
						
							<a href="#"><img src="https://images.unsplash.com/photo-1528975604071-b4dc52a2d18c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" width="100%"/> </a>
							<div class="decs">
								<b style="color:#585858">Bánh Crepe 7 sắc</b><hr style="border:1px solid gray"><br/><br/>
							</div>
						
							<a href="#"><img src="https://images.unsplash.com/photo-1545159401-dc732a21b6c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" width="100%"/> </a>
							<div class="decs">
								<b style="color:#585858">Muffin kiểu Ý</b><hr style="border:1px solid gray"><br/><br/>
							</div>
					</marquee>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection