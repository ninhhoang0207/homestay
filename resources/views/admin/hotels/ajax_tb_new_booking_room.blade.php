<?php foreach ($data as $key => $value): ?>
	<tr>
		<td>{{$key+1}}</td>
		<td>{{$value->ho}}</td>
		<td>{{$value->ten}}</td>
		<td>{{$value->sdt}}</td>
		<td>{{$status[$value->trangthai]}}</td>
		<td>{{$value->thoigianden}}</td>
		<td>{{$value->thoigiantra}}</td>
		<td>{{$value->thoigiandangky}}</td>
		<td>{{$value->sophong}}</td>
		<td>{{$value->loaiphong}}</td>
		<td>{{$value->songuoi}}</td>
		<td>{{$value->giatien}}</td>
		<td>{{$value->mauudai}}</td>
		<td>
			<a href="{{route('hotel.confirm.delete',$value->id)}}" data-toggle="modal" data-target = "#details">
				<i class="glyphicon glyphicon-remove"></i> @lang('general.xoa')
			</a>
		</td>
	</tr>
<?php endforeach ?>