@extends('layouts.blank')
@section('title')
@lang('user/general.thong-tin-nguoi-dung')
@endsection

@section('header')
<!-- NProgress -->
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-wysiwyg -->
<link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
<!-- Select2 -->
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="../build/css/custom.min.css" rel="stylesheet">

@endsection
@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>@lang('user/general.thong-tin-nguoi-dung')<small></small></h2>
        
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left input_mask" method="post" action="{{route('userUpdate')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('user/general.ho')</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="@lang('user/general.ho')" value="{{$user->last_name}}">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
              </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('user/general.ten')</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="@lang('user/general.ten')" value="{{$user->first_name}}">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
              </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('user/general.email')</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="email" name = "email" placeholder="@lang('user/general.email')" value="{{$user->email}}">
                            <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('user/general.sdt')</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="phone" name="phone" placeholder="@lang('user/general.sdt')" value="{{$user->phone}}">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
             
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('user/general.diachi')</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="address" name="address" placeholder="@lang('user/general.diachi')" value="{{$user->address}}">
                            <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                        <button type="button" class="btn btn-primary">@lang('general.huy')</button>
                        <button type="submit" class="btn btn-success">@lang('general.capnhat')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')

<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="../vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<!-- <script src="../vendors/parsleyjs/dist/parsley.min.js"></script> -->
<!-- Autosize -->
<script src="../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
@endpush

@endsection