<!DOCTYPE html>
<html>
<head>
	<title> @lang('user/general.lichsudatphong') | @lang('general.tieude') </title>
	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
	<link href="{{ asset("vendors/datatables/css/dataTables.min.css") }}" rel="stylesheet">
	<link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
	<link href="{{ asset("css/style3_1.css") }}" rel="stylesheet">
</head>
<body>
	@include('includes/fontend_topmenu')
	<div class="container">
		<div class="col-sm-10 col-sm-offset-1 address-title hidden-xs">
			<div class="col-sm-6">
				<a href="#">@lang('general.trangchu')
					<span class="glyphicon glyphicon-play"></span>
				</a>
				<a href="#"> @lang('general.thongtinnguoidung')
					<span class="glyphicon glyphicon-play"></span>
				</a>
				<a href="#"><span> {{Auth::user()->name}}</span></a>
			</div>
			<div class="col-sm-6 form-facebook">
				<div class="col-sm-2">
					<button class="form-item form-like">
						<span class="glyphicon glyphicon-thumbs-up"></span>
						<span> @lang('detail/general.thich')</span>
					</button>
				</div>
				<div class="col-sm-2">
					<button class="form-item form-share">
						<span> @lang('detail/general.chiase')</span>
					</button>
				</div>
				<div class="col-sm-8 text-info">
					<p> @lang('detail/general.uudai')</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>@lang('user/general.lichsudatphong')</h4>
			</div>
			<div class="panel-body">
				<table id="table_history" class="table table-bordered table-hover">
					<thead>
						<th>@lang('user/general.stt')</th>
						<th>@lang('user/general.nhanghi')</th>
						<th>@lang('user/general.thoigiandangky')</th>
						<th>@lang('user/general.thoigiansudung')</th>
						<th>@lang('user/general.loaiphong')</th>
						<th>@lang('user/general.chiphi')</th>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
<script src="{{ asset('fontend/js/jquery-latest.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendors/datatables/js/dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/moment/moment.js') }}"></script>
<script type="text/javascript">
	$('#table_history').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": "{{route('user.getDataBookroomHistory')}}",
		"columns" : [
			{"data":null,
				"render" : function (data, type, full, meta) {
					return meta.row+1; 
				},
				 "searchable": false,
				  "orderable": false 
			},
			{"data":"ten"},
			{"data":"thoigiandangky",
				"render" : function (data, type, full, meta) {
					var temp = moment(data,'YYYY/MM/DD HH:mm').format('DD/MM/YYYY HH:mm');
					return temp;
				}
			},
			{"data":"thoigiansudung",
				"render"	: function (data, type, full, meta) {
						var using_time_str = '';
					if (data == null || data == '') {
						return "";
					}
					var temp = data.split('-');
					using_time_str += (temp[2] != 0)?temp[2]+' @lang("general.ngay") - ':'';
					using_time_str += (temp[1] != 0)?temp[1]+' @lang("general.dem") - ':'';
					using_time_str += (temp[0] != 0)?temp[0]+' @lang("general.gio") - ':'';

					if (using_time_str != '') 
						using_time_str = using_time_str.substring(0,using_time_str.length-2);
					return using_time_str;
				}
			},
			{"data":"loaiphong",
				"render"	: function (data, type, full, meta) {
					<?php foreach ($loaiphong as $key => $value): ?>
						if ("{{$key}}" == data) {
							return "{{$value}}";
						}
					<?php endforeach ?>
				}
			},
			{"data":"giatien"},
		]
	});
</script>
</html>