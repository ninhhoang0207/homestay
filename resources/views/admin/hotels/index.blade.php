@extends('layouts.blank')
@section('title')
@lang('hotel/general.tieude')
@endsection

@section('header')
 <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
@endsection

@section('content')
 <!-- page content -->
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@lang('hotel/general.tieude')<small></small></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('hotel/general.danhmuc') <small></small></h2>
                    <div class="nav navbar-right"><a href="{{route('hotel.register')}}" class="btn btn-success">Đăng ký nhà nghỉ <span class="glyphicon glyphicon-pencil" style="color:white"></span></a></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>@lang('hotel/general.id')</th>
                          <th>@lang('hotel/general.ten')</th>
                          <th>@lang('hotel/general.diachi')</th>
                          <th>@lang('hotel/general.sdt')</th>
                          <th>@lang('hotel/general.ngay_dk')</th>
                          <th>@lang('hotel/general.thoihan_dk')</th>
                          <th>@lang('hotel/general.chucnang')</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value): ?>
                          @if($value->nguoi_dk_id == Auth::getUser()->id || Auth::getUser()->role == 'admin')
                            <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$value->ten}}</td>
                            <td>{{$value->diachi}}</td>
                            <td>{{$value->sdt}}</td>
                            <td>{{Carbon\Carbon::parse($value->thoigian_dk)->format('d/m/Y')}}</td>
                            <td>{{Carbon\Carbon::parse($value->thoihan_dk)->format('d/m/Y')}}</td>
                            <td width="15%">
                                <a href="{{route('hotel.edit',$value->id)}}" >
                                    <i class="glyphicon glyphicon-edit"></i> @lang('general.sua')
                                </a>
                                <a href="{{route('hotel.confirm.delete',$value->id)}}" class="delete-modal">
                                    <i class="glyphicon glyphicon-remove"></i> @lang('general.xoa')
                                </a>
                                <br>
                                <a href="{{route('hotel.bookroomList',$value->id)}}" >
                                <i class="glyphicon glyphicon-th-list"></i> @lang('hotel/general.dondatphong.tieude') <span class="{{$value->new_booking>0?'badge bg-green':'badge'}}" style="color: white" id="count_new_booking">{{$value->new_booking}}
                                </span>
                                </a>
                            </td>
                            </tr>
                          @endif
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>  
              </div>
            </div>
        </div>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"></div>
  </div>
</div>
@push('scripts')

    <script src="../build/js/custom.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

    <script type="text/javascript">
      $('.delete-modal').on('click',function(e) {
        e.preventDefault();
        $('#delete_confirm').modal('toggle');
        var url = $(this).attr('href');
        $.ajax({
          url : url
        }).done(function(data) {
          $('.modal-content').empty();
          $('.modal-content').append(data);
          $('#delete_confirm').modal('show');
        });
      });
    </script>
@endpush
@endsection