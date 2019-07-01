@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bills
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
                                <th>Tổng tiền</th>
                                <th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                                <th>Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bills as $bill)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->total}}</td>
                                    <td>{{$bill->date_order}}</td>
                                    @if($bill->status == 1)
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>Dang giao</td>
                                    @else
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>hoan thanh</td>
                                    @endif
                                    <td class="center"><a href="admin/bills/delete/{{$bill->id}}"><i class="fa fa-trash-o  fa-fw"></i>Ẩn</a></td>
                                    <td class="center"><a href="admin/bills/edit/{{$bill->id}}"><i class="fa fa-pencil fa-fw"></i>Sửa</a></td>
                                    <td><button style="background-color:tomato; color:white;border:none"><a href="admin/bills/details/{bill->id}">Chi tiết</a></button></td>
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