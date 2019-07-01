<?php $__env->startSection('content'); ?>
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
                    <?php if(session('thongbao')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('thongbao')); ?>

                        </div>
                    <?php endif; ?>
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
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX" align="center">
                                    <td><?php echo e($p->id); ?></td>
                                    <td><?php echo e($p->name); ?>

                                    <img width = "100px" src="source/image/product/<?php echo e($p->image); ?>" /></td>
                                    <td><?php echo e($p->description); ?></td>
                                    <td><?php echo e($p->product_type->name); ?></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/<?php echo e($p->id); ?>">Ẩn</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/<?php echo e($p->id); ?>">Sửa</a></td>
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