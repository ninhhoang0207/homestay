<?php $__env->startSection('content'); ?>
<section>
	<div class="container hidden-xs">
		<h2 class="title text-center">Nhà nghỉ giá rẻ</h2>
		<div class="row endless-pagination" data-next-page = "<?php echo e($data->nextPageUrl()); ?>" id="features">
			<!-- <div class="col-sm-12"> -->
			<?php foreach ($data as $key => $value): ?>
			<div class="col-sm-6 feature">
					<div class="panel">
						<div class="col-sm-5">
						<img alt="Hotel" src="<?php echo e(asset($value->url_hinhanh)); ?>" style="max-height:155px; min-height:155px; max-width:220px; min-width:220px;" border="0">
						</div>
						<div class="label label-success price"><span class="glyphicon glyphicon-usd"></span> -10%</div>
						<div class="col-sm-7 feature">
							<h3 class="title-text">
								<a href=""><?php echo e($value->ten); ?></a>
							</h3>
							<h5 class="item-text">
								<a href=""><span class="glyphicon glyphicon-flag"></span> Địa chỉ: <?php echo e($value->diachi); ?></a>
							</h5>
							<h5 class="item-text">
								<a href=""><span class="glyphicon glyphicon-usd"></span> Giá: giờ đầu 60k/h, qua đêm 200k, 250k/ngày</a>
							</h5>
							<div class="col-sm-6">
								<input type="button" name="button-view" value="Xem chi tiết" class="btn btn-danger">
							</div>
							<div class="col-sm-6">
								<input type="button" name="button-book" value="Đặt phòng ngay" class="btn btn-block">
							</div>
						</div>
					</div><!-- end panel -->
				</div><!-- end feature -->
			<?php endforeach ?>
			<!-- <?php echo e($data->links()); ?> -->
		</div><!-- end features -->
		<div class="col-md-4"></div>
		<div  class="col-md-4" style="text-align: center;">
			<button id="readmore" onclick="loadData()" class="btn-lg btn-primary">Read more...</button>
			<img src="<?php echo e(asset('images/loading.gif')); ?>" height="120px" width="282px" id="loading" style="display: none">
		</div>
		</div>
		<div class="col-md-4"></div>
		<hr>
		<!-- <div id="loading" style="text-align: center; display: none" class="col-sm-12"> -->
			
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
	function loadData(){
		var page = $('.endless-pagination').data('next-page');
		if (page != null && page != '') {
			$('#loading').show();
			$('#readmore').hide();
			setTimeout(function(){ 
				$.get(page, function(data){
					$('.endless-pagination').append(data.loadData);
					$('.endless-pagination').data('next-page',data.next_page);
				});
				$('#loading').hide();
			}, 300);
			setTimeout(function(){
				if ($('.endless-pagination').data('next-page') != null) {
					$('#readmore').show();
				}
				$("body, html").animate({
					scrollTop: $(document).height()
				}, 400);
			},1000);
		}
	}
	$(document).ready(function(){
		var page = $('.endless-pagination').data('next-page');
		if (page == null || page == '')
		{
			$('#readmore').hide();
		}
		// $(window).scroll(fetchData);
		// $('#loading').hide();
		// function fetchData(){
		// 	var page = $('.endless-pagination').data('next-page');
		// 	if (page != null) {
		// 		$('#loading').show();
		// 		clearTimeout($.data(this,"scrollCheck"));
		// 		$.data(this,"scrollCheck",setTimeout(function(){
		// 			var scroll_position_for_load = $(window).height()+$(window).scrollTop()+100;
		// 			if (scroll_position_for_load >= $(document).height()) {
		// 				$.get(page, function(data){
		// 					$('.endless-pagination').append(data.loadData);
		// 					$('.endless-pagination').data('next-page',data.next_page);
		// 				});
		// 			}
		// 			$('#loading').hide();
		// 		},1000));
		// 	}else{
		// 		$('#loading').hide();
		// 	}
		// }
	});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.fontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>