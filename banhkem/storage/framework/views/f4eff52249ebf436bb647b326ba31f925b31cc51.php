<?php $__env->startSection('content'); ?>
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="<?php echo e(route('signup')); ?>" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php if(count($errors)>0): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($err); ?>

                                <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('thanhcong')): ?>
                        <div class="alert alert-success"><?php echo e(Session::get('thanhcong')); ?></div>
                    <?php endif; ?>
				<div class="row">
               
                    <div class="col-sm-3"></div>
                   
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Địa chỉ Email</label>
							<input type="email" name="email" required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Tên đăng nhập</label>
							<input type="text" name="fullname" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ</label>
							<input type="text" name="address" value="" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại</label>
							<input type="text" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu</label>
							<input type="password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng Ký </button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>