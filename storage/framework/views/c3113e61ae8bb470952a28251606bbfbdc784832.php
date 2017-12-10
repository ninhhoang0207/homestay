	<!DOCTYPE html>
	<html>
	<head>
		<title><?php echo app('translator')->getFromJson('search/general.tieude'); ?> | <?php echo app('translator')->getFromJson("general.tieude"); ?></title>
		<link href="<?php echo e(asset("css/bootstrap.min.css")); ?>" rel="stylesheet">
		<link href="<?php echo e(asset("css/style3_1.css")); ?>" rel="stylesheet">
		<link href="<?php echo e(asset("css/font-awesome.min.css")); ?>" rel="stylesheet">
		<link href="<?php echo e(asset("css/jquery.datetimepicker.min.css")); ?>" rel="stylesheet">
	<style type="text/css">
		#map-canvas {
			width: 100%;
			height: 350px;
		}
		#map-canvas-modal {
			width: 100%;
			height: 350px;
		}
	</style>
</head>
<body>
	<?php echo $__env->make('includes/fontend_topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<section >
		<div class="container background-w">
			<div class="row hidden-sm">
				<div class="col-sm-10 col-sm-offset-1 address-title hidden-xs">
					<div class="col-sm-6">
						<a href="#"><?php echo app('translator')->getFromJson('search/general.trangchu'); ?>
							<span class="glyphicon glyphicon-play"></span>
						</a>
						<a href="#"> <?php echo app('translator')->getFromJson('search/general.timkiem'); ?>
							<span class="glyphicon glyphicon-play"></span>
						</a>
						<a href="#"> <?php echo app('translator')->getFromJson('search/general.ketqua'); ?></a>
						<span class="glyphicon glyphicon-play"></span>
						<a href="#"> <?php echo app('translator')->getFromJson('search/general.taidayco'); ?> <span class="results"><?php echo e($data->total()); ?></span> <?php echo app('translator')->getFromJson('search/general.nhanghi'); ?>
						</a>
					</div>
					<div class="col-sm-6 form-facebook">
						<div class="col-sm-2">
							<button class="form-item form-like">
								<span class="glyphicon glyphicon-thumbs-up"></span>
								<span> <?php echo app('translator')->getFromJson('search/general.thich'); ?></span>
							</button>
						</div>
						<div class="col-sm-2">
							<button class="form-item form-share">
								<span> <?php echo app('translator')->getFromJson('search/general.chiase'); ?></span>
							</button>
						</div>
						<div class="col-sm-8 text-info">
							<p><?php echo app('translator')->getFromJson('search/general.uudai'); ?></p>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-3 left-content">
						<div class="form-find-fast">
							<h2><?php echo app('translator')->getFromJson('search/general.giagiodau'); ?></h2>
							<ul id="firstHour">
								<li>
									<input class="firstHour" type="checkbox" name="firstHour" value="1">
									<label><?php echo app('translator')->getFromJson('search/general.duoi'); ?> 60.000 đ</label>
									<span class="pull-right" id="firstHour1"><?php echo e($kq_timkiem['firstHour']['firstHour1']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input class="firstHour" type="checkbox" name="firstHour" value="2">
									<label>60.000 - 80.000 đ</label>
									<span class="pull-right" id="firstHour2"><?php echo e($kq_timkiem['firstHour']['firstHour2']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input class="firstHour" type="checkbox" name="firstHour" value="3">
									<label>80.000 - 100.000 đ</label>
									<span class="pull-right" id="firstHour3"><?php echo e($kq_timkiem['firstHour']['firstHour3']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input class="firstHour" type="checkbox" name="firstHour" value="4">
									<label>100.000 - 150.000 đ</label>
									<span class="pull-right" id="firstHour4"><?php echo e($kq_timkiem['firstHour']['firstHour4']); ?></span>
								</li>
							</ul>
						</div>
						<div class="form-find-fast">
							<h2><?php echo app('translator')->getFromJson('search/general.giaquadem'); ?></h2>
							<ul>
								<li>
									<input type="checkbox" name="overNight" value="1">
									<label class="active"><?php echo app('translator')->getFromJson('search/general.duoi'); ?> 150.000 đ</label>
									<span class="pull-right" id="overNight1"><?php echo e($kq_timkiem['overNight']['overNight1']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="overNight" value="2">
									<label>60.000 - 80.000 đ</label>
									<span class="pull-right" id="overNight2"><?php echo e($kq_timkiem['overNight']['overNight2']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="overNight" value="3">
									<label>80.000 - 100.000 đ</label>
									<span class="pull-right" id="overNight3"><?php echo e($kq_timkiem['overNight']['overNight3']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="overNight" value="4">
									<label>100.000 - 150.000 đ</label>
									<span class="pull-right" id="overNight4"><?php echo e($kq_timkiem['overNight']['overNight4']); ?></span>
								</li>
							</ul>
						</div>
						<div class="form-find-fast">
							<h2><?php echo app('translator')->getFromJson('search/general.giangaydem'); ?></h2>
							<ul>
								<li>
									<input type="checkbox" name="days" value="1">
									<label><?php echo app('translator')->getFromJson('search/general.duoi'); ?> 150.000 đ</label>
									<span class="pull-right" id="day1"><?php echo e($kq_timkiem['days']['day1']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="days" value="2">
									<label>60.000 - 80.000 đ</label>
									<span class="pull-right" id="day2"><?php echo e($kq_timkiem['days']['day2']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="days" value="3">
									<label>80.000 - 100.000 đ</label>
									<span class="pull-right" id="day3"><?php echo e($kq_timkiem['days']['day3']); ?></span>
								</li>
							</ul>
							<ul>
								<li>
									<input type="checkbox" name="days" value="4">
									<label>100.000 - 150.000 đ</label>
									<span class="pull-right" id="day4"><?php echo e($kq_timkiem['days']['day4']); ?></span>
								</li>
							</ul>
						</div>
						<div class="form-find-fast">
							<h2><?php echo app('translator')->getFromJson('search/general.khoangcach'); ?></h2>
							<div class="form-location">
								<select class="form-control" id="place_selection">
									<option value="<?php echo e($toado[0].'-'.$toado[1]); ?>"><?php echo app('translator')->getFromJson('search/general.vitricuaban'); ?></option>
									<option value="22.0031177-106.82014079999999"><?php echo app('translator')->getFromJson('search/general.trungtamhanoi'); ?></option>
									<option value="21.0031177-105.82014079999999"><?php echo app('translator')->getFromJson('search/general.vanmieu'); ?> </option>
									<option value="21.0031177-105.82014079999999"><?php echo app('translator')->getFromJson('search/general.hoguom'); ?></option>
									<option value="21.0031177-105.82014079999999"><?php echo app('translator')->getFromJson('search/general.langbac'); ?></option>
								</select>
							</div>
							<div class="form-distance row" >
								<?php echo app('translator')->getFromJson('search/general.toida'); ?>
								<span id="range">3</span>
								km
							</div>
							<div class="form-distance-value">
								<p class="pull-left">0.5 km</p>
								<p class="pull-right">10 km</p>
								<input id="distance" type="range" min="0.5" max="10" value="3" step="0.5" onchange="showValue(this.value)" />
							</div>
						</div>
						<div class="form-find-fast">
							<h2><?php echo app('translator')->getFromJson('search/general.dichvu'); ?></h2>
							<?php foreach ($ten_dichvu as $key => $value): ?>
								<ul>
									<li>
										<input type="checkbox" name="services" value="<?php echo e($key); ?>">
										<label><?php echo e($value); ?></label>
									</li>
								</ul>
							<?php endforeach ?>
						</div>
					</div>
					<div class="col-xs-12 col-sm-9 right-content">
						<div class="row">
							<form id="search_form" method="POST">
								<?php echo e(csrf_field()); ?>

								<div class="col-xs-12 col-sm-12 form-search ">
									<div class="col-xs-9 col-sm-5">
										<div class="form-input">
										<input type="text" id="address" name="address" class="form-control form-box" placeholder="Tên, vị trí,...">
										<i class="map-maker"></i>
										</div>
									</div>
									<input type="hidden" name="lat" id="lat" value="">
									<input type="hidden" name="lng" id="lng" value="">
									<div class="col-sm-2 hidden-xs">
										<div class="form-input">
											<input type="text" class="form-control form-box" name="from_time" id="from_time" placeholder="">
											<i class="calender-o"></i>
										</div>
									</div>
									<div class="col-sm-2 hidden-xs">
										<div class="form-input">
											<input type="text" class="form-control form-box" name="to_time" id="to_time" placeholder="">
											<i class="calender-o"></i>
										</div>
									</div>
									<div class="col-sm-2 hidden-xs">
										<input type="text" value="" class="form-control" placeholder="1 ngày" />
									</div>
									<div class="col-xs-3 col-sm-1">
										<a href="#" class="hidden-xs">
											<img src="<?php echo e(asset('images/search.jpg')); ?>" alt="" id="search">
										</a>
										<a href="#" class="hidden-lg">
											<img src="<?php echo e(asset('images/search-xs.jpg')); ?>" alt="">
										</a>
									</div>
								</div>
							</form>
							<div class="col-xs-12 col-sm-12 list-hotel">
								<div class="col-xs-12 col-sm-6 title-xs-12">
									<h1><span class="glyphicon glyphicon-home hidden-lg"></span> <?php echo app('translator')->getFromJson('search/general.nntaikhuvuc'); ?>: <span id="search-location"></span></h1>
									<p class="hidden-xs"><span class="glyphicon glyphicon-home"></span> <?php echo app('translator')->getFromJson('search/general.ngay'); ?> <span id="date"><?php echo e($ngay); ?></span> <?php echo app('translator')->getFromJson('search/general.taidayco'); ?> <span class="results"><?php echo e($data->total()); ?></span> <?php echo app('translator')->getFromJson('search/general.nnconphong'); ?></p>
								</div>
								<div class="col-sm-6 hidden-xs">
									<div class="form-map">
										<a class="view-map" id="view-map" href="#collapseExample">
											<?php echo app('translator')->getFromJson('search/general.xembando'); ?>
										</a>
									</div>
								</div>
								<div class="col-sm-12 list-hotel-detail container hidden-xs">
									<ul class="nav nav-pills " id="sort">
										<li class="active" id="sortByPopular">
											<a href="#"> <?php echo app('translator')->getFromJson('search/general.phobiennhat'); ?> </a>
										</li>
										<li id="sortByPrice">
											<a href="#"><?php echo app('translator')->getFromJson('search/general.giathapnhat'); ?></a>
										</li>
										<li id="sortByDistance">
											<a href="#" id=""><?php echo app('translator')->getFromJson('search/general.vitrigannhat'); ?></a>
										</li>
										<li>
											<a href="#"><?php echo app('translator')->getFromJson('search/general.khuyenmai'); ?></a>
										</li>
									</ul>
								</div>
								<div class="col-xs-12 hidden-lg xs-find-fast">
									<ul class="nav nav-pills">
										<li class="active">
											<a href="">200 nhà nghỉ</a>
										</li>
										<li >
											<a href="">Phổ biến nhất</a>
										</li>
										<li >
											<a href="">Giá rẻ</a>
										</li>
										<li class="map">
											<a href="">Map</a>
										</li>
									</ul>
								</div>
								<div id="hotel-data">
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
												<a href="<?php echo e(route('detailHotel')); ?>?hotel_id=<?php echo e($value->nn_id); ?>"><?php echo e($value->ten); ?></a>
												<p><span class="glyphicon glyphicon-flag"></span> <?php echo e($value->diachi); ?></p>
												<p class="hidden-lg"><span class="glyphicon glyphicon-usd"></span> <?php echo app('translator')->getFromJson('search/general.giodau'); ?> <?php echo e($value->phongdon_motgio); ?> k/h, <?php echo app('translator')->getFromJson('search/general.quadem'); ?> <?php echo e($value->phongdon_quadem); ?>, <?php echo e($value->phongdon_nhieungay); ?>k/<?php echo app('translator')->getFromJson('search/general.ngay'); ?></p>
												<p class="hidden-xs"><span class="glyphicon glyphicon-map-marker"></span> <?php echo app('translator')->getFromJson('search/general.khoangcach'); ?>: <?php echo e($value->khoangcach); ?>km <?php echo app('translator')->getFromJson('search/general.taivitricuaban'); ?> <a href="<?php echo e(route('viewMap',['id'=>$value->nn_id])); ?>" class="view-map map-location">( <?php echo app('translator')->getFromJson('search/general.xembando'); ?> )</a></p>
												
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
											<?php echo e($data->links()); ?>

										</nav>
									</div>
									<!-- Nav page Next-Prev -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Modal map view-->
	<div id="viewMapModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">
					</h4>
				</div>
				<div class="modal-body">
					<div id="map-canvas-modal"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</body>
<!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<script src="<?php echo e(asset('fontend/js/jquery-latest.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/style2.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUtVPgnRKR8TwzcKdUkjkFpD6Aerf68ZY&sensor=true&libraries=places&language=vi"></script>
<script src ="<?php echo e(asset('js/jquery.datetimepicker.js')); ?>" type="text/javascript" ></script>
<script type="text/javascript">
	//Date time
	$('#from_time').datetimepicker({
		format:'d/m/Y H:i'
	});
	$('#to_time').datetimepicker({
		format:'d/m/Y H:i'
	});

	$('#from_time').on('change',function() {
		var from_time = $('#from_time').val();
		if (from_time != '') {
			from_time = from_time.split(' ');
			var date = from_time[0].split('/');
			var time = from_time[1].split(':');
			var date = new Date(date[2],date[1]-1,date[0],time[0],time[1]);
			$('#to_time').datetimepicker({
				minDate : date,
				minTime : date,
			});
		}
	});

	$('#to_time').on('change',function() {
		var to_time = $('#to_time').val();
		if (to_time != '') {
			to_time = to_time.split(' ');
			var date = to_time[0].split('/');
			var time = to_time[1].split(':');
			var date = new Date(date[2],date[1]-1,date[0],time[0],time[1]);
			$('#from_time').datetimepicker({
				maxDate : date,
				maxTime : date,
			});
		}
	});
	//Search by distance
	function showValue(newValue)
	{
		document.getElementById("distance").innerHTML=newValue;
		map_lat = <?php echo e($toado[0]); ?>;
		map_lng = <?php echo e($toado[1]); ?>;
		coordinate = map_lat+'-'+map_lng;
		var range = newValue;
		$('#range').text(range);
		search('findByRange',range);
		$('#sort li').removeClass('active');
		$('#sortByPopular').addClass('active');
	}

	$('#place_selection').on('change',function() {
		var coordinate = $('#place_selection').val();
		var range = $('#distance').val();
		$.ajax({
			url:"<?php echo e(route('searchHotel')); ?>"+"/"+coordinate+"/"+range,
		}).done(function(data) {
			$('#hotel-data').empty();
			$('#hotel-data').append(data);
		});
	});
	//Address of a hotel;
	var view_map = null;
	$('.map-location').on('click',function(event) {
		event.preventDefault();
		var url = $(this).attr('href');
		$.ajax({
			url:url,
		}).done(function(data) {
			temp = data[0];
			view_map = new google.maps.Map(document.getElementById('map-canvas-modal'),
			{
				center : {lat:temp.toado_lat,lng:temp.toado_lng},
				zoom : 13,
			});
			var url_img = "<?php echo e(asset('')); ?>";
			url_img += temp.url_hinhanh;
			var gia = '<strong><?php echo app('translator')->getFromJson("search/general.giagiodau"); ?></strong>: '+temp.phongdon_motgio+'đ</br><strong><?php echo app('translator')->getFromJson("search/general.giotieptheo"); ?></strong>: '+temp.phongdon_giotieptheo+'đ/<?php echo app('translator')->getFromJson("search/general.gio"); ?></br><strong><?php echo app('translator')->getFromJson("search/general.giaquadem"); ?></strong>: '+temp.phongdon_quadem+'đ/<?php echo app('translator')->getFromJson("search/general.dem"); ?></br><strong><?php echo app('translator')->getFromJson("search/general.giangaydem"); ?></strong>: '+temp.phongdon_nhieungay+'đ/<?php echo app('translator')->getFromJson("search/general.ngay"); ?>';
			var url = "<?php echo e(route('detailHotel')); ?>?hotel_id="+temp.nn_id;
			var content = '<div class="row" style="padding-left:20px;"><div><h4>Nhà nghỉ: '+temp.ten+'</h4><h5>Địa chỉ: '+temp.diachi+'</h5></div><div class="col-md-3"><img src="'+url_img+'" height="100px" width="100px"></img></div><div class="col-md-9" style="padding-left:50px">'+gia+'<hr><a href="'+url+'" target="_blank" class="btn btn-danger book-room" style="margin-top:-20px"><?php echo app('translator')->getFromJson("search/general.datphongngay"); ?></a><a href="'+url+'" class="btn btn-primary" target="_blank" style="float:right;margin-top:-18px"><?php echo app('translator')->getFromJson("search/general.xemchitiet"); ?></a></div></div>';
			var infowindow = new google.maps.InfoWindow({
				content: content
			});
			var marker = new google.maps.Marker({
				position : {lat:temp.toado_lat,lng:temp.toado_lng},
				title : temp.ten,
				map : view_map,
			});
			marker.addListener('click', function() {
			 	infowindow.open(view_map, marker);
			});
			var title = temp.ten;
			$('.modal-title').text(title);
			$('#viewMapModal').modal('show');
		});
	});
	$('#viewMapModal').on('shown.bs.modal', function(e) {
		var centerPoint = view_map.getCenter();
        google.maps.event.trigger(view_map, "resize");
		view_map.setCenter(centerPoint);
    });
	//Google map
	map = null;
	isLoadMap = 0;
	markers = [];
// 	$('#view-map').on('click',function(event){
// 		event.preventDefault();
// 		$('#collapseExample').collapse('toggle');
// 		var map_lat = <?php echo e($toado[0]); ?>;
// 		var map_lng = <?php echo e($toado[1]); ?>;
// 		map = new google.maps.Map(document.getElementById('map-canvas'), {
// 			center: {lat: map_lat, lng: map_lng},
// 			zoom: 13
// 		});
// 		isLoadMap=0;
// 		markers=[];
// 		if (isLoadMap == 0) {
// 			var length = <?php echo e($data->count()); ?>;
// 			var infos = [];
// 			var infowindow = new google.maps.InfoWindow({
// 			});
// 			<?php foreach ($data as $key => $value): ?>
// 			var marker = new google.maps.Marker({
// 				position : {lat: <?php echo e($value->toado_lat); ?>, lng: <?php echo e($value->toado_lng); ?>},
// 				title:'<?php echo e($value->ten); ?>',
// 			});
// 			markers.push(marker);
// 			var url_img = "<?php echo e(asset($value->url_hinhanh)); ?>";
// 			var mota = "123";
// 			var url = "<?php echo e(route('detailHotel')); ?>?hotel_id="+<?php echo e($value->nn_id); ?>;
// 			var content = '<div class="row" style="padding:20px"><div><h4>Nhà nghỉ: <?php echo e($value->ten); ?></h4><h5>Địa chỉ: <?php echo e($value->diachi); ?></h5></div><div class="col-md-3"><img src="'+url_img+'" height="100px" width="100px"></img></div><div class="col-md-9"><strong>Mô tả về nhà nghỉ: </strong><p>'+mota+'</p></br><a href="'+url+'" class="btn btn-primary" style="float:right">Xem chi tiết về nhà nghỉ</a></div></div>';
// 			infowindow.setContent(content);
// 			infos.push(infowindow);
// 		<?php endforeach ?>
// 		console.log(infowindow);
// 		for (var i = markers.length - 1; i >= 0; i--) {
// 			markers[i].setMap(map);
// 			marker.addListener('click', function() {
// 				infowindow.open(map, markers[i]);
// 			});
// 		}
// 		isLoadMap++;
// 	}
// });
$('#view-map').on('click',function(event){
		event.preventDefault();
		$('#collapseExample').collapse('toggle');
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
			var contents = [];
			var titles = [];
			var infowindow = new google.maps.InfoWindow();
			<?php foreach ($data as $key => $value): ?>
			var marker = new google.maps.Marker({
				position : {lat: <?php echo e($value->toado_lat); ?>, lng: <?php echo e($value->toado_lng); ?>},
				title:'<?php echo e($value->ten); ?>',
			});
			markers.push(marker);
			var url_img = "<?php echo e(asset($value->url_hinhanh)); ?>";
			var gia = '<strong><?php echo app('translator')->getFromJson("search/general.giagiodau"); ?></strong>: <?php echo e($value->phongdon_motgio); ?>đ</br><strong><?php echo app('translator')->getFromJson("search/general.giotieptheo"); ?></strong>: <?php echo e($value->phongdon_nhieungay); ?>đ/<?php echo app('translator')->getFromJson("search/general.gio"); ?></br><strong><?php echo app('translator')->getFromJson("search/general.giaquadem"); ?></strong>: <?php echo e($value->phongdon_quadem); ?>đ/<?php echo app('translator')->getFromJson("search/general.dem"); ?></br><strong><?php echo app('translator')->getFromJson("search/general.giangaydem"); ?></strong>: <?php echo e($value->phongdon_nhieungay); ?>đ/<?php echo app('translator')->getFromJson("search/general.ngay"); ?>'; 
			var url = "<?php echo e(route('detailHotel')); ?>?hotel_id="+<?php echo e($value->nn_id); ?>;
			var content = '<div class="row" style="margin-left:20px"><div><h4>Nhà nghỉ: <?php echo e($value->ten); ?></h4><h5>Địa chỉ: <?php echo e($value->diachi); ?></h5></div><div class="col-md-3"><img src="'+url_img+'" height="100px" width="100px"></img></div><div class="col-md-9" style="padding-left:50px">'+gia+'<hr><a href="'+url+'"target="_blank" class="btn btn-danger book-room" style="margin-top:-20px"><?php echo app('translator')->getFromJson("search/general.datphongngay"); ?></a><a href="'+url+'" class="btn btn-primary" "target="_blank" style="float:right;margin-top:-18px"><?php echo app('translator')->getFromJson("search/general.xemchitiet"); ?></a></div></div>';
			contents.push(content);
			titles.push(marker.title);
		<?php endforeach ?>
		for (var i = markers.length - 1; i >= 0; i--) {
			markers[i].setMap(map);
			markers[i].addListener('click', function() {
				var index = titles.indexOf(this.title);
				infowindow.setContent(contents[index]);				
				infowindow.open(map,this);
			});
		}
		isLoadMap++;
	}
});
	//Check place google map
	var check_place = 0;
	var input = document.getElementById('address');
	var searchBox = new google.maps.places.SearchBox(input);
	google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		if(places[0].geometry != null){
			var bounds = new google.maps.LatLngBounds();
			$('#lat').val(places[0].geometry.location.lat());
			$('#lng').val(places[0].geometry.location.lng());
			check_place = 1;
		}else{
			alert('<?php echo e(Lang::get('val.sai_dia_chi')); ?>');
			check_place = 0;
		}
	});
	var geocoder = new google.maps.Geocoder;
	var latlng = {lat:<?php echo e($toado[0]); ?>, lng:<?php echo e($toado[1]); ?>};
	geocoder.geocode({'location': latlng}, function(results, status) {
		if (status === 'OK') {
			if (results[1]) {
				console.log(results[1].formatted_address);
				$('#search-location').text(results[1].formatted_address);
			} else {
				window.alert('No results found');
			}
		} else {
			window.alert('Geocoder failed due to: ' + status);
		}
	});
	//Search button
	$('#search').on('click',function() {
		var address = $('#address').val();
		if (address === '' || address === null || check_place != 1) {
			alert('<?php echo e(Lang::get('val.wrong_address')); ?>');
			return false;
		}
		var lat = $('#lat').val();
		var lng = $('#lng').val();
		jQuery.noConflict();
		// var url = "<?php echo e(route('searchHotel')); ?>" + "/" + lat + "-" + lng;
		// window.location = url;
		var url = "<?php echo e(route('searchHotel')); ?>" + "/" + lat + "-" + lng;
		$("#search_form").attr('action',url);
		$('#search_form').submit();
	});
	//Pagination
	$('.pagination a').on('click',function(event) {
		event.preventDefault();
		var url = $(this).attr('href');
		$('#hotel-data').empty();
		isLoadMap=0;
		for (var i = markers.length - 1; i >= 0; i--) {
			markers[i].setMap(null);
		}
		markers=[];
		$.ajax({
			url:url,
		}).done(function(data) {
			$('#hotel-data').append(data);
			$('#collapseExample').collapse('hide');
		});
	});

	$('input[type=checkbox]').click(function() {
		var range = $('#distance').val();
		search('findByCheckbox',range);
	});

	function search(search_type,range) {
		var firstHour = $('input[name="firstHour"]:checked');
		var overNight = $('input[name="overNight"]:checked');
		var days = $('input[name="days"]:checked');
		var services = $('input[name="services"]:checked');
		var firstHour_data ='';
		var overNight_data = '';
		var days_data = '';
		var services_data = '';
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
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
			},
			url:"<?php echo e(route('searchHotel')); ?>"+"/"+coordinate+"/"+range,
			data:{
				firstHour:firstHour_data,
				overNight:overNight_data,
				days:days_data,
				services:services_data,
				search_type:search_type,
			},
			type:"POST",
		}).done(function(data) {
			$('#hotel-data').empty();
			$('#hotel-data').append(data);
		});
	}

	$('#sortByPopular a').on('click',function(e) {
		e.preventDefault();
		$('#sort li').removeClass('active');
		$(this).parent().addClass('active');
		var range = $('#distance').val();
		search('sortByPopular',range);
	});

	$('#sortByDistance a').on('click',function(e) {
		e.preventDefault();
		$('#sort li').removeClass('active');
		$(this).parent().addClass('active');
		var range = $('#distance').val();
		search('sortByDistance',range);
	});

	$('#sortByPrice a').on('click',function(e) {
		e.preventDefault();
		$('#sort li').removeClass('active');
		$(this).parent().addClass('active');
		var range = $('#distance').val();
		search('sortByPrice',range);
	});

	$('#search_form').validate({
		rules : {
			address : "required",
			from_time : "required",
			to_time : "required",
		},
		messages : {
			address : "<?php echo e(Lang::get('val.message')); ?>",
			from_time : "<?php echo e(Lang::get('val.message')); ?>",
			to_time : "<?php echo e(Lang::get('val.message')); ?>",
		}
	});
</script>
</html>