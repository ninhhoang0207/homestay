<a href="#"><span class="icon-rocket"></span><?php echo app('translator')->getFromJson('hotel/general.trangchu.xinchao'); ?>: <?php echo e(Auth::getUser()->name); ?><span class="caret icon-arrow-down6"></span></a>
	<ul class="children">
		<li><a href="#"><?php echo app('translator')->getFromJson('hotel/general.trangchu.thongtintaikhoan'); ?><span class="icon-dot"></span></a></li>
		<li><a href="<?php echo e(route('logout')); ?>"><?php echo app('translator')->getFromJson('hotel/general.trangchu.thoat'); ?> <span class="icon-dot"></span></a></li>
	</ul>
