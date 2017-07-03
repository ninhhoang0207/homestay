@extends('layouts.blank')
@section('title')
@lang('user/general.tieude')
@endsection

@section('header')
 <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
 <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>@lang('user/general.tieude')<small></small></h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@lang('user/general.danhmuc') <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>@lang('user/general.id')</th>
                          <th>@lang('user/general.ten')</th>
                          <th>@lang('user/general.sdt')</th>
                          <th>@lang('user/general.ngay_dk')</th>
                          <th>@lang('user/general.chucnang')</th>

                        </tr>
                      </thead>

                      <tbody>
                    @foreach($users as $key => $value)
                    @if(Auth::user()->role == 'admin')
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{Carbon\Carbon::parse($value->created_at)->format('d/m/Y')}}</td>
                        <td>
                            <a href={{" user-edit/".$value->id }}>
                                <i class="glyphicon glyphicon-edit"></i>  @lang('general.sua')
                            </a>
                            <a href={{"user-del/".$value->id }}>
                                <i class="glyphicon glyphicon-remove"></i>  @lang('general.xoa')
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
@push('scripts')
    <script src="../build/js/custom.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
@endpush
@endsection