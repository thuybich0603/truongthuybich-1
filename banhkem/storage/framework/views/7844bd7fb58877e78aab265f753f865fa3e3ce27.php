<?php $__env->startSection('content'); ?>
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
                    <?php if(session('thongbao')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('thongbao')); ?>

                        </div>
                    <?php endif; ?>
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
                            <?php $__currentLoopData = $billdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo e($b->id); ?></td>
                                    <td><?php echo e($b->id_bill); ?></td>
                                    <td><?php echo e($b->id_product); ?></td>
                                    <?php if($b->status == 1): ?>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>Dang giao</td>
                                    <?php else: ?>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i>hoan thanh</td>
                                    <?php endif; ?>
                                    <td class="center"><a href="admin/bills/delete/<?php echo e($b->id); ?>"><i class="fa fa-trash-o  fa-fw"></i>Ẩn</a></td>
                                    <td class="center"><a href="admin/bills/edit/<?php echo e($b->id); ?>"><i class="fa fa-pencil fa-fw"></i>Sửa</a></td>
                                    <td><button style="background-color:tomato; color:white;border:none">Chi tiết</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>