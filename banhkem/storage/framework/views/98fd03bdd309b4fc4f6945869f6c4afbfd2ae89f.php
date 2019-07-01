
<?php $__env->startSection('content'); ?>
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Sản phẩm <?php echo e($loai_sp->name); ?></h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="<?php echo e(route('trang-chu')); ?>">Home</a> / <span>Loại sản phẩm</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<?php $__currentLoopData = $loai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="<?php echo e(route('loaisanpham',$l->id)); ?>"><?php echo e($l->name); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($sp_theoloai)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<?php $__currentLoopData = $sp_theoloai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-4 mt-5">
									<div class="single-item">
										<?php if($sp->promotion_price!=0): ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<?php endif; ?>
										<div class="single-item-header">
											<a href="<?php echo e(route('chitietsanpham',$sp->id)); ?>"><img src="source/image/product/<?php echo e($sp->image); ?>" alt="" height="230px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($sp->name); ?></p>
											<p class="single-item-price">
												<?php if($sp->promotion_price !=0): ?>
													<span class="flash-del"><?php echo e(number_format($sp->unit_price)); ?> đ</span>
													<span class="flash-sale"><?php echo e(number_format($sp->promotion_price)); ?> đ</span>
												<?php else: ?>
												<span><?php echo e(number_format($sp->unit_price)); ?> đ</span>	
												<?php endif; ?>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('themgiohang',$sp->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('chitietsanpham',$sp->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy <?php echo e(count($sp_khac)); ?> sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<?php $__currentLoopData = $sp_khac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp_k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-sm-4">
									<div class="single-item">
										<?php if($sp_k->promotion_price!=0): ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<?php endif; ?>
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/<?php echo e($sp_k->image); ?>" alt="" height="230px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($sp_k->name); ?></p>
											<p class="single-item-price">
												<?php if($sp_k->promotion_price !=0): ?>
													<span class="flash-del"><?php echo e(number_format($sp_k->unit_price)); ?> đ</span>
													<span class="flash-sale"><?php echo e(number_format($sp_k->promotion_price)); ?> đ</span>
												<?php else: ?>
												<span><?php echo e(number_format($sp_k->unit_price)); ?> đ</span>	
												<?php endif; ?>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="<?php echo e(route('themgiohang',$sp_k->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="<?php echo e(route('chitietsanpham',$sp_k->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div> <!-- .container -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>