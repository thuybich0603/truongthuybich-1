<?php $__env->startSection('content'); ?>
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small><?php echo e($product->name); ?></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($err); ?><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session('thongbao')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('thongbao')); ?>

                            </div>
                        <?php endif; ?>
                        <form action="admin/product/edit/<?php echo e($product->id); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai">
                                   <?php $__currentLoopData = $product_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                    
                                    <?php if( $product->product_type->id == $pt->id): ?>
                                    <?php echo e("selected"); ?>

                                    <?php endif; ?>
                                    
                                     value="<?php echo e($pt->id); ?>"><?php echo e($pt->name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên bánh</label>
                                <input class="form-control" name="Ten" placeholder="Nhập tên bánh" value="<?php echo e($product->name); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width = "200px"src="source/image/product/<?php echo e($product->image); ?>">
                                    <input class="form-control" type="file" name="Hinh" />
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" name="Description" class="form-control ckeditor" rows="3">
                                <?php echo e($product->description); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá bán</label>
                                <input class="form-control" name="GiaBan" placeholder="Nhập giá bán" value="<?php echo e($product->unit_price); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Đơn vị</label>
                                <input class="form-control" name="DonVi" placeholder="Nhập đơn vị tính theo..." value="<?php echo e($product->unit); ?>" />
                            </div>
                            <div class="form-group">
                                <label>New</label>
                                <label class="radio-inline">
                                    <input name="New" value="0" 
                                    <?php if($product->new == 0): ?>
                                        <?php echo e("checked"); ?>

                                    <?php endif; ?>
                                     type="radio">0
                                </label>
                                <label class="radio-inline">
                                    <input name="New" value="1" 
                                    
                                    <?php if($product->new == 1): ?>
                                        <?php echo e("checked"); ?>

                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>