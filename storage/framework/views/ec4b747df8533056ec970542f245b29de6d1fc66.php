<?php foreach ($data as $key => $value): ?>
<div class="col-sm-6 feature">
	<div class="panel">
		<div class="col-sm-5">
			<img alt="Hotel" src="<?php echo e(asset($value->url_hinhanh)); ?>" style="max-height:155px; min-height:155px; max-width:220px; min-width:220px;" border="0">
		</div>
		<div class="label label-success price"><span class="glyphicon glyphicon-usd"></span> -10%</div>
		<div class="col-sm-7 feature">
			<h3 class="title-text">
				<a href="<?php echo e(route('detailHotel')); ?>?hotel_id=<?php echo e($value->nn_id); ?>"><?php echo e($value->ten); ?></a>
			</h3>
			<h5 class="item-text">
				<a href=""><span class="glyphicon glyphicon-flag"></span> <?php echo app('translator')->getFromJson('home/general.diachi'); ?>: <?php echo e($value->diachi); ?></a>
			</h5>
			<h5 class="item-text">
			<a href=""><span class="glyphicon glyphicon-usd"></span> <?php echo app('translator')->getFromJson('hotel/general.trangchu.gia'); ?>: <?php echo app('translator')->getFromJson('home/general.giodau'); ?> <?php echo e($value->phongdon_motgio); ?><small> đ</small>, <?php echo app('translator')->getFromJson('home/general.quadem'); ?> <?php echo e($value->phongdon_quadem); ?><small> đ</small>, <?php echo e($value->phongdon_nhieungay); ?><small> đ/<?php echo app('translator')->getFromJson('home/general.ngay'); ?></small></a>
			</h5>
			<div class="col-sm-6">
				<a href="<?php echo e(route('detailHotel')); ?>?hotel_id=<?php echo e($value->nn_id); ?>">
					<input type="button" name="button-view" value="Xem chi tiết" class="btn btn-danger">
				</a>
			</div>
			<div class="col-sm-6">
				<input type="button" name="button-book" value="Đặt phòng ngay" class="btn btn-block">
			</div>
		</div>
	</div><!-- end panel -->
</div><!-- end feature -->
<?php endforeach ?>
