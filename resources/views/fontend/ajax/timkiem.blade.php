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
			<img alt="Hotel" src="{{asset($value->url_hinhanh)}}" class="img-responsive img-hotel">
		</div>
		<div class="label label-success price-fav"><span class="glyphicon glyphicon-usd"></span> -10%</div>
		<div class="col-xs-9 col-sm-5 info-hotel">
			<a href={{route('detailHotel')}}?hotel_id={{$value->nn_id}}"">{{$value->ten}}</a>
			<p><span class="glyphicon glyphicon-flag"></span> {{$value->diachi}}</p>
			<p class="hidden-lg"><span class="glyphicon glyphicon-usd"></span> @lang('search/general.giodau') {{$value->phongdon_motgio}} k/h, @lang('search/general.quadem') {{$value->phongdon_quadem}}, {{$value->phongdon_nhieungay}}k/@lang('search/general.ngay')</p>
			<p class="hidden-xs"><span class="glyphicon glyphicon-map-marker"></span> @lang('search/general.khoangcach'): {{$value->khoangcach}}km @lang('search/general.quadem') <a href="{{route('viewMap',['id'=>$value->nn_id])}}" class="view-map map-location">( @lang('search/general.xembando') )</a></p>
			<?php foreach ($value->dichvu as $key1 => $value1): ?>
				<div class="tooltip-x hidden-xs"> <img src="{{asset('images/'.$value1.'.png')}}" alt="">
					<span class="tooltiptext">{{$ten_dichvu[$value1]}}</span>
				</div>
			<?php endforeach ?>

		</div>
		<div class="col-sm-4 price-hotel hidden-xs">
			<p class="first-item">@lang('search/general.giagiodau'): <strong class="item-price-hotel ">{{$value->phongdon_motgio}} đ</strong></p>
			<p>@lang('search/general.giaquadem'): <strong class="item-price-hotel">{{$value->phongdon_quadem}} đ</strong></p>
			<p>@lang('search/general.giangaydem'): <strong class="item-price-hotel">{{$value->phongdon_nhieungay}} đ</strong></p>
			<a href="" class="btn btn-danger book-room">@lang('search/general.datphongngay') <span class="glyphicon glyphicon-hand-up"></span></a>
		</div>
	</div>
	<!--END item-list-hotel -->
<?php endforeach ?>
<!-- Nav page Next-Prev -->
<div class="col-xs-12 col-sm-4 col-sm-offset-4">
	<nav aria-label="Page navigation">
		<input type="hidden" name="" id="data_type" value="{{$data_type}}">
		{{$data->links()}}
	</nav>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		@if (isset($kq_timkiem)) {
		$('#firstHour1').text({{$kq_timkiem['firstHour']['firstHour1']}});
		$('#firstHour2').text({{$kq_timkiem['firstHour']['firstHour2']}});
		$('#firstHour3').text({{$kq_timkiem['firstHour']['firstHour3']}});
		$('#firstHour4').text({{$kq_timkiem['firstHour']['firstHour4']}});
		$('#overNight1').text({{$kq_timkiem['overNight']['overNight1']}});
		$('#overNight2').text({{$kq_timkiem['overNight']['overNight2']}});
		$('#overNight3').text({{$kq_timkiem['overNight']['overNight3']}});
		$('#overNight4').text({{$kq_timkiem['overNight']['overNight4']}});
		$('#day1').text({{$kq_timkiem['days']['day1']}});
		$('#day2').text({{$kq_timkiem['days']['day2']}});
		$('#day3').text({{$kq_timkiem['days']['day3']}});
		$('#day4').text({{$kq_timkiem['days']['day4']}});
		$('.results').text({{$data->total()}});
		}
		@endif
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

		map_lat = {{$toado[0]}};
		map_lng = {{$toado[1]}}; 
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
	//Adress of a hotel
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
			var url_img = "{{asset('')}}";
			url_img += temp.url_hinhanh;
			// var mota = temp.mota.length>300?temp.mota.substring(0,150)+"...":temp.mota;
			var gia = '<strong>@lang("search/general.giagiodau")</strong>: '+temp.phongdon_motgio+'đ</br><strong>@lang("search/general.giotieptheo")</strong>: '+temp.phongdon_giotieptheo+'đ/@lang("search/general.gio")</br><strong>@lang("search/general.giaquadem")</strong>: '+temp.phongdon_quadem+'đ/@lang("search/general.dem")</br><strong>@lang("search/general.giangaydem")</strong>: '+temp.phongdon_nhieungay+'đ/@lang("search/general.ngay")';
			var url = "{{route('detailHotel')}}?hotel_id="+temp.nn_id;
			var content = '<div class="row" style="padding-left:20px;"><div><h4>Nhà nghỉ: '+temp.ten+'</h4><h5>Địa chỉ: '+temp.diachi+'</h5></div><div class="col-md-3"><img src="'+url_img+'" height="100px" width="100px"></img></div><div class="col-md-9" style="padding-left:50px">'+gia+'<hr><a href="'+url+'" target="_blank" class="btn btn-danger book-room" style="margin-top:-20px">@lang("search/general.datphongngay")</a><a href="'+url+'" class="btn btn-primary" target="_blank" style="float:right;margin-top:-18px">@lang("search/general.xemchitiet")</a></div></div>';
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
	//Address of all hotels
	$('#view-map').on('click',function(event){
		event.preventDefault();
		$('#collapseExample').collapse();
		var map_lat = {{$toado[0]}};
		var map_lng = {{$toado[1]}};
		map = new google.maps.Map(document.getElementById('map-canvas'), {
				center: {lat: map_lat, lng: map_lng},
				zoom: 13
			});
		isLoadMap=0;
		markers=[];
		if (isLoadMap == 0) {
			var length = {{$data->count()}};
			var contents = [];
			var titles = [];
			var infowindow = new google.maps.InfoWindow();
			<?php foreach ($data as $key => $value): ?>
			var marker = new google.maps.Marker({
				position : {lat: {{$value->toado_lat}}, lng: {{$value->toado_lng}}},
				title:'{{$value->ten}}',
			});
			markers.push(marker);
			var url_img = "{{asset($value->url_hinhanh)}}";
			var gia = '<strong>@lang("search/general.giagiodau")</strong>: {{$value->phongdon_motgio}}đ</br><strong>@lang("search/general.giotieptheo")</strong>: {{$value->phongdon_nhieungay}}đ/@lang("search/general.gio")</br><strong>@lang("search/general.giaquadem")</strong>: {{$value->phongdon_quadem}}đ/@lang("search/general.dem")</br><strong>@lang("search/general.giangaydem")</strong>: {{$value->phongdon_nhieungay}}đ/@lang("search/general.ngay")'; 
			var url = "{{route('detailHotel')}}?hotel_id="+{{$value->nn_id}};
			var content = '<div class="row" style="margin-left:20px"><div><h4>Nhà nghỉ: {{$value->ten}}</h4><h5>Địa chỉ: {{$value->diachi}}</h5></div><div class="col-md-3"><img src="'+url_img+'" height="100px" width="100px"></img></div><div class="col-md-9" style="padding-left:50px">'+gia+'<hr><a href="'+url+'"target="_blank" class="btn btn-danger book-room" style="margin-top:-20px">@lang("search/general.datphongngay")</a><a href="'+url+'" class="btn btn-primary" "target="_blank" style="float:right;margin-top:-18px">@lang("search/general.xemchitiet")</a></div></div>';
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
</script>