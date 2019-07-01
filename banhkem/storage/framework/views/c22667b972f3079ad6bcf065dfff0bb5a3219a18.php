
<?php $__env->startSection('content'); ?>
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
	    <div class="banner" >
				<ul>
					<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
		            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/<?php echo e($sl->image); ?>" data-src="source/image/slide/<?php echo e($sl->image); ?>" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/<?php echo e($sl->image); ?>'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
									</div>
								</div>

		        </li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>
<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<h4 class="text-center text-uppercase font-weight-bold lead">SẢN PHẨM KHUYẾN MÃI</h4>
						<div class="beta-products-details">
							
							<div class="clearfix"></div>
							<hr class="hr_sp ">
								<p class="text-center title">Sản phẩm tốt nhất của chúng tôi - Niềm đam mê lớn đến từ thực phẩm</p>
								<p class="">Tìm thấy <?php echo e(count($sanpham_khuyenmai)); ?> sản phẩm</p>
						</div>

						<div class="row">
							<?php $__currentLoopData = $sanpham_khuyenmai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-sm-3">
								<div class="single-item">
									<?php if($spkm->new==0): ?>
										<div class="ribbon-wrapper"><div class="ribbon sale">-10%</div></div>
									<?php endif; ?>
									<div class="single-item-header">
										<a href="<?php echo e(route('chitietsanpham',$spkm->id)); ?>"><img src="source/image/product/<?php echo e($spkm->image); ?>" alt="" height="230px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title"><?php echo e($spkm->name); ?></p>
										<p class="single-item-price">
											<?php if($spkm->new!=0): ?>
												<span class="flash-sale"><?php echo e(number_format($spkm->unit_price)); ?> đ</span>
											<?php else: ?>
												<span class="flash-del"><?php echo e(number_format($spkm->unit_price)); ?> đ</span>
												<span class="flash-sale"><?php echo e(number_format($spkm->unit_price - ($spkm->unit_price *10/100))); ?> đ</span>
											<?php endif; ?>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="<?php echo e(route('themgiohang',$spkm->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="<?php echo e(route('chitietsanpham',$spkm->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
						<div class="row" style="margin-top: 30px; margin-left: 400px"><?php echo e($sanpham_khuyenmai->links()); ?></div>
					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
<div class="container-fluid" style="background-image:linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3)),  url('https://laboom.sk-web-solutions.com/images/banner1.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;color:white">
    <p class="lead font-weight-bold text-center" style="color:white;">
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content" style="color:white">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
					
						<h4 class="text-center text-uppercase font-weight-bold lead">SẢN PHẨM MỚI NHẤT
</h4>
						<div class="beta-products-details">
							<div class="clearfix"></div>
							<hr class="hr_sp ">
								<p class="text-center title">Sản phẩm tốt nhất của chúng tôi - Niềm đam mê lớn đến từ thực phẩm</p>
								<p class="">Tìm thấy <?php echo e(count($new_product)); ?> sản phẩm</p>
						</div>
						<div class="row">
							<?php $__currentLoopData = $new_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-sm-3 mb-5">
								<div class="single-item">
									<div class="single-item-header">
										<a href="<?php echo e(route('chitietsanpham',$new->id)); ?>"><img src="source/image/product/<?php echo e($new->image); ?>" alt="" style=" border-radius: 50%;"height="240px"></a>
									</div>
									<div class="single-item-body"style="margin-left:50px">
										<p class="single-item-title"><?php echo e($new->name); ?></p>
										<p class="single-item-price">
											<span class="flash-sale"><?php echo e(number_format($new->unit_price)); ?> đ</span>
											
										</p>
									</div>
									<div class="single-item-caption" style="margin-left:50px">
										<a class="add-to-cart pull-left" href="<?php echo e(route('themgiohang',$new->id)); ?>"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="<?php echo e(route('chitietsanpham',$new->id)); ?>">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="row" style="margin-top: 10px; margin-left: 400px"><?php echo e($new_product->links()); ?></div>
						</div>
						
					</div> <!-- .beta-products-list -->
					
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->
</div><br><br><br><br>
<div class="container">
        <p class="lead font-weight-bold text-center">DỊCH VỤ CHÍNH CHÚNG TÔI CUNG CẤP</p><hr class="hr_sp">
        <p class="text-center title"> Dịch vụ  chúng tôi cung cấp chất lượng tuyệt vời nhất trong từng sản phẩm</p><br></br>
    <div class="row">
            <div class="col-3">
                <div class="icon-svg">
                    <div class="text-center icon_svg1">
                        <img src="source/image/icon_svg/bread.svg" class="">
                    </div>
                    <p class="mt-3 text-center text-warning font-weight-bold">BÁNH MÌ TƯƠI</p>
                    <p class="mt-3 text-center px-3 text_p" style="font-family: 'Dancing Script', cursive; font-size:18px">Bánh mì tươi là loại bánh thuộc dòng bánh mì và được chế biến từ nguyên liệu bột mì hay bột ngũ cốc rồi ủ cho lên men và nướng chín, có thể bảo quản từ 5 đến 7 ngày.</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-svg">
                    <div class="text-center icon_svg1">
                        <img src="source/image/icon_svg/piece-of-cake.svg" class="">
                    </div>
                    <p class="mt-3 text-center text-warning font-weight-bold text-uppercase">Bánh ngọt</p>
                    <p class="mt-3 text-center px-3" style="font-family: 'Dancing Script', cursive; font-size:18px">Là dạng bánh mì từ bột nhào, dùng để tráng miệng. Cake có nhiều loại, được phân theo nguyên liệu và kỹ thuật chế biến như làm từ lúa mì, bơ, bánh ngọt dạng bọt biển.</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-svg">
                    <div class="text-center icon_svg1">
                        <img src="source/image/icon_svg/cake.svg" class="">
                    </div>
                    <p class="mt-3 text-center text-warning font-weight-bold text-uppercase">Bánh kem</p>
                    <p class="mt-3 text-center px-3" style="font-family: 'Dancing Script', cursive; font-size:18px">Đây là một món ăn ngọt dạng cốt như bánh bông lan xốp và được phủ lên một lớp kem dày vừa để trang trí vừa để tăng thêm hương vị cho bánh.</p>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-svg">
                    <div class="text-center icon_svg1">
                        <img src="source/image/icon_svg/muffin.svg" class="">
                    </div>
                    <p class="mt-3 text-center text-warning font-weight-bold">MUFFINS</p>
                    <p class="mt-3 text-center px-3 font-weight-light" style="font-family: 'Dancing Script', cursive; font-size:18px">Muffin là loại bánh đang được rất nhiều người trên thế giới yêu thích. Có kích thước khá nhỏ và dễ thương, gồm nhiều loại và hương vị khác nhau.</p>
                </div>
            </div>
    </div>
    </div><br><br><br><br>

    <div class="container-fluid" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)),  url('source/image/new_products/9.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed; height:500px">
    <p class="lead font-weight-bold text-center" style="color:white; padding-top: 200px">HÃY ĐẾN VỚI CHÚNG TÔI - CHÚNG TÔI SẼ MANG GIÁ TRỊ ĐẾN CHO BẠN</p><center><hr style="border: 1px solid white;width:200px"></center>
    <p class="text-center "style="font-size:20px; color: white">Nơi chất lượng tuyệt hảo</p><br></br>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>