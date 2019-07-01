@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$product->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai">
                                   @foreach($product_type as $pt)
                                    <option
                                    
                                    @if( $product->product_type->id == $pt->id)
                                    {{"selected"}}
                                    @endif
                                    
                                     value="{{$pt->id}}">{{$pt->name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên bánh</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên bánh" value="{{$product->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width = "200px"src="source/image/product/{{$product->image}}">
                                    <input class="form-control" type="file" name="Hinh" />
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="Description" class="form-control ckeditor" rows="3">
                                {{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control" name="GiaBan" placeholder="Nhập giá bán" value="{{$product->unit_price}}" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="DonVi" placeholder="Nhập đơn vị tính theo..." value="{{$product->unit}}" />
                            </div>
                            <div class="form-group">
                                <label>New</label>
                                <label class="radio-inline">
                                    <input name="New" value="0" 
                                    @if($product->new == 0)
                                        {{"checked"}}
                                    @endif
                                     type="radio">0
                                </label>
                                <label class="radio-inline">
                                    <input name="New" value="1" 
                                    
                                    @if($product->new == 1)
                                        {{"checked"}}
                                    @endif
                                    type="radio">1
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>   
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection