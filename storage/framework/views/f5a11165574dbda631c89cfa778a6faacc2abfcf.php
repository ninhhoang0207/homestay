<div class="col-sm-12">
	<div class="collapse" id="collapseExample">
		<div class="well">
			<div id="map-canvas"></div>
		</div>
	</div>
</div>
<?php foreach ($data as $key => $value): ?>
	<!--item-list-hotel 1 -->
	<div class="col-xs-12 col-sm-12 item-list-hotel">
		<div class="col-xs-3 col-sm-3">
			<img alt="Hotel" src="<?php echo e(asset($value->url_hinhanh)); ?>" class="img-responsive img-hotel">
		</div>
		<div class="label label-success price-fav"><span class="glyphicon glyphicon-usd"></span> -10%</div>
		<div class="col-xs-9 col-sm-5 info-hotel">
			<a href=<?php echo e(route('detailHotel')); ?>?hotel_id=<?php echo e($value->nn_id); ?>""><?php echo e($value->ten); ?></a>
			<p><span class="glyphicon glyphicon-flag"></span> <?php echo e($value->diachi); ?></p>
			<p class="hidden-lg"><span class="glyphicon glyphicon-usd"></span> <?php echo app('translator')->getFromJson('search/general.giodau'); ?> <?php echo e($value->phongdon_motgio); ?> k/h, <?php echo app('translator')->getFromJson('search/general.quadem'); ?> <?php echo e($value->phongdon_quadem); ?>, <?php echo e($value->phongdon_nhieungay); ?>k/<?php echo app('translator')->getFromJson('search/general.ngay'); ?></p>
			<p class="hidden-xs"><span class="glyphicon glyphicon-map-marker"></span> <?php echo app('translator')->getFromJson('search/general.khoangcach'); ?>: <?php echo e($value->khoangcach); ?>km <?php echo app('translator')->getFromJson('search/general.quadem'); ?> <a href="" class="view-map">( <?php echo app('translator')->getFromJson('search/general.xembando'); ?> )</a></p>
			<?php foreach ($value->dichvu as $key1 => $value1): ?>
				<div class="tooltip-x hidden-xs"> <img src="<?php echo e(asset('images/'.$value1.'.png')); ?>" alt="">
					<span class="tooltiptext"><?php echo e($ten_dichvu[$value1]); ?></span>
				</div>
			<?php endforeach ?>

		</div>
		<div class="col-sm-4 price-hotel hidden-xs">
			<p class="first-item"><?php echo app('translator')->getFromJson('search/general.giagiodau'); ?>: <strong class="item-price-hotel "><?php echo e($value->phongdon_motgio); ?> đ</strong></p>
			<p><?php echo app('translator')->getFromJson('search/general.giaquadem'); ?>: <strong class="item-price-hotel"><?php echo e($value->phongdon_quadem); ?> đ</strong></p>
			<p><?php echo app('translator')->getFromJson('search/general.giangaydem'); ?>: <strong class="item-price-hotel"><?php echo e($value->phongdon_nhieungay); ?> đ</strong></p>
			<a href="" class="btn btn-danger book-room"><?php echo app('translator')->getFromJson('search/general.datphongngay'); ?> <span class="glyphicon glyphicon-hand-up"></span></a>
		</div>
	</div>
	<!--END item-list-hotel -->
<?php endforeach ?>
<!-- Nav page Next-Prev -->
<div class="col-xs-12 col-sm-4 col-sm-offset-4">
	<nav aria-label="Page navigation">
		<input type="hidden" name="" id="data_type" value="<?php echo e($data_type); ?>">
		<?php echo e($data->links()); ?>

	</nav>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		<?php if(isset($kq_timkiem)): ?> {
		$('#firstHour1').text(<?php echo e($kq_timkiem['firstHour']['firstHour1']); ?>);
		$('#firstHour2').text(<?php echo e($kq_timkiem['firstHour']['firstHour2']); ?>);
		$('#firstHour3').text(<?php echo e($kq_timkiem['firstHour']['firstHour3']); ?>);
		$('#firstHour4').text(<?php echo e($kq_timkiem['firstHour']['firstHour4']); ?>);
		$('#overNight1').text(<?php echo e($kq_timkiem['overNight']['overNight1']); ?>);
		$('#overNight2').text(<?php echo e($kq_timkiem['overNight']['overNight2']); ?>);
		$('#overNight3').text(<?php echo e($kq_timkiem['overNight']['overNight3']); ?>);
		$('#overNight4').text(<?php echo e($kq_timkiem['overNight']['overNight4']); ?>);
		$('#day1').text(<?php echo e($kq_timkiem['days']['day1']); ?>);
		$('#day2').text(<?php echo e($kq_timkiem['days']['day2']); ?>);
		$('#day3').text(<?php echo e($kq_timkiem['days']['day3']); ?>);
		$('#day4').text(<?php echo e($kq_timkiem['days']['day4']); ?>);
		$('.results').text(<?php echo e($data->total()); ?>);
		}
		<?php endif; ?>
	});
</script>
<script type="text/javascript">
	//Pagination
	$('.pagination a').on('click',function(event) {
		event.preventDefault();
		var url = $(this).attr('href');
		var firstHour = $('input[name="firstHour"]:checked');
		var overNight = $('input[name="overNight"]:checked');
		var days = $('input[name="days"]:checked');
		var services = $('input[name="services"]:checked');
		var firstHour_data ='';
		var overNight_data = '';
		var days_data = '';
		var services_data = '';
		var data_type = $('#data_type').val();
		$.each(firstHour,function(index,value) {
			firstHour_data += (value.value+'-');
		});
		$.each(overNight,function(index,value) {
			overNight_data += (value.value+'-');
		});
		$.each(days,function(index,value) {
			days_data += (value.value+'-');
		});
		$.each(services,function(index,value) {
			services_data += (value.value+'-');
		});
		firstHour_data = firstHour_data.substring(0,firstHour_data.length-1);
		overNight_data = overNight_data.substring(0,overNight_data.length-1);
		days_data = days_data.substring(0,days_data.length-1);
		services_data = services_data.substring(0,services_data.length-1);

		map_lat = <?php echo e($toado[0]); ?>;
		map_lng = <?php echo e($toado[1]); ?>; 
		coordinate = map_lat+'-'+map_lng;
		$('#hotel-data').empty();
		$.ajax({
			url:url,
			data:{
				firstHour:firstHour_data,
				overNight:overNight_data,
				days:days_data,
				services:services_data,
				search_type:data_type,
			},
		}).done(function(data) {
			$('#hotel-data').append(data);
			$('#collapseExample').collapse('hide');
		});
	});

	$('#view-map').on('click',function(event){
		event.preventDefault();
		$('#collapseExample').collapse();
		var map_lat = <?php echo e($toado[0]); ?>;
		var map_lng = <?php echo e($toado[1]); ?>;
		map = new google.maps.Map(document.getElementById('map-canvas'), {
				center: {lat: map_lat, lng: map_lng},
				zoom: 13
			});
		isLoadMap=0;
		markers=[];
		if (isLoadMap == 0) {
			var length = <?php echo e($data->count()); ?>;
			<?php foreach ($data as $key => $value): ?>
			var marker = new google.maps.Marker({
				position : {lat: <?php echo e($value->toado_lat); ?>, lng: <?php echo e($value->toado_lng); ?>},
				title:'<?php echo e($value->ten); ?>',
			});
			markers.push(marker);
			<?php endforeach ?>
			for (var i = markers.length - 1; i >= 0; i--) {
				markers[i].setMap(map);
			}
			isLoadMap++;
		}
	});
</script>