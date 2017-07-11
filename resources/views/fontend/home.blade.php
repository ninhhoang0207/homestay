@extends('layouts.fontend')
@section('title')
@lang('home/general.tieude')
@endsection
@section('content')
<section>
	<div class="container hidden-xs">
		<h2 class="title text-center">@lang('hotel/general.trangchu.nhanghigiare')</h2>
		<div class="row endless-pagination" data-next-page = "{{$data->nextPageUrl()}}" id="features">
			<!-- <div class="col-sm-12"> -->
			<?php foreach ($data as $key => $value): ?>
			<div class="col-sm-6 feature">
					<div class="panel">
						<div class="col-sm-5">
						<img alt="Hotel" src="{{ asset($value->url_hinhanh) }}" style="max-height:155px; min-height:155px; max-width:220px; min-width:220px;" border="0">
						</div>
						<div class="label label-success price"><span class="glyphicon glyphicon-usd"></span> -10%</div>
						<div class="col-sm-7 feature">
							<h3 class="title-text">
								<a href="{{route('detailHotel')}}?hotel_id={{$value->nn_id}}" target="_blank">{{$value->ten}}</a>
							</h3>
							<h5 class="item-text">
								<a href=""><span class="glyphicon glyphicon-flag"></span> @lang('hotel/general.diachi'): {{$value->diachi}}</a>
							</h5>
							<h5 class="item-text">
								<a href=""><span class="glyphicon glyphicon-usd"></span> @lang('hotel/general.trangchu.gia'): @lang('home/general.giodau') {{$value->phongdon_motgio}}<small> đ</small>, @lang('home/general.quadem') {{$value->phongdon_quadem}}<small> đ</small>, {{$value->phongdon_nhieungay}}<small> đ/@lang('home/general.ngay')</small></a>
							</h5>
							<div class="col-sm-6">
								<a href="{{route('detailHotel')}}?hotel_id={{$value->nn_id}}" target="_blank">
									<input type="button" name="button-view" value="@lang('home/general.xemchitiet')" class="btn btn-danger">
								</a>
							</div>
							<div class="col-sm-6">
								<a href="{{route('bookroom.show',['id'=>$value->nn_id])}}" class="btn btn-success">@lang('home/general.datphongngay')</a>
							</div>
						</div>
					</div><!-- end panel -->
				</div><!-- end feature -->
			<?php endforeach ?>
			<!-- {{$data->links()}} -->
		</div><!-- end features -->
		<div class="col-md-4"></div>
		<div  class="col-md-4" style="text-align: center;">
			<button id="readmore" onclick="loadData()" class="btn-lg btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> @lang('hotel/general.trangchu.xemthem')  </button>
			<img src="{{ asset('images/loading.gif') }}" height="120px" width="282px" id="loading" style="display: none">
		</div>
		</div>
		<div class="col-md-4"></div>
		<hr>
		<!-- <div id="loading" style="text-align: center; display: none" class="col-sm-12"> -->
			
	</div>
</section>
@endsection

@push('scripts')

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

@endpush