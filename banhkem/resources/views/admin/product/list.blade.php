@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên bánh</th>
                                <th>Mô tả</th>
                                <th>Loại bánh</th>
                                <th>Ẩn</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $p)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->name}}
                                    <img width = "100px" src="source/image/product/{{$p->image}}" /></td>
                                    <td>{{$p->description}}</td>
                                    <td>{{$p->product_type->name}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$p->id}}">Ẩn</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$p->id}}">Sửa</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection