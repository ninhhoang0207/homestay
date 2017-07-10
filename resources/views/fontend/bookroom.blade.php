<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Trang chủ</title>
  <link href="{{ asset("css/style-info.css") }}" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
  <!-- Custom Theme Style -->
  <!-- <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet"> -->
  <link href="{{ asset("css/jquery.datetimepicker.min.css") }}" rel="stylesheet">

</head>
<body>
	@include('includes/fontend_topmenu')
  <div class="col-sm-10 col-sm-offset-1 address-title hidden-xs">
    <div class="col-sm-6">
      <a href="#"> Trang chủ
        <span class="glyphicon glyphicon-play"> </span>
      </a>
      <a href="#"> Đặt phòng
        <span class="glyphicon glyphicon-play"> </span>
      </a>
      <a href="">{{$data->ten}}</a>
    </div>
    <div class="col-sm-6 form-facebook">
      <div class="col-sm-2">
        <button class="form-item form-like">
          <span class="glyphicon glyphicon-thumbs-up"></span>
          <span> @lang('search/general.thich')</span>
        </button>
      </div>
      <div class="col-sm-2">
        <button class="form-item form-share">
          <span> @lang('search/general.chiase')</span>
        </button>
      </div>
      <div class="col-sm-8 text-info">
        <p> @lang('search/general.uudai')</p>
      </div>
    </div>
  </div>
  <section>
    <div class="container form-tax">
      <div class="row">
        <form id="bookroom_form" method="POST">
          {{csrf_field()}}
          <div class="col-sm-8 form-book-room">
            <div class="col-sm-12">
              <div class="col-sm-6 info-address-title">
                <div class="info-address">
                  <h1>{{$data->ten}}</h1>
                  <h2><span class="glyphicon glyphicon-map-marker"></span>{{$data->diachi}}</h2>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="col-sm-6">
                <h4>Nhập thông tin để đặt phòng</h4>
              </div>
              @if (Auth::guest())
              <div class="col-sm-6">
                <a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Đăng nhập để nhận ưu đãi</a>
              </div>
              @endif
            </div><!--End col-sm-12-->
            <div class="col-sm-12">
              <div class="col-sm-6">
                <h5>Họ: *</h5>
                <input type="name" class="form-control" id="last_name" name="last_name" placeholder="">
              </div>
              <div class="col-sm-6">
                <h5>Tên: *</h5>
                <input type="name" class="form-control" id="first_name" name="first_name" placeholder="">
              </div>
            </div><!--End col-sm-12-->
            <div class="col-sm-12">
              <div class="col-sm-4">
                <h5>Thời gian nhận phòng</h5>
                <div class="form-input">
                  <input type="text" class="form-control form-box" placeholder="Chọn thời gian nhận phòng" id="from_time" name="from_time">
                  <i class="calender-o"></i>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Thời gian trả phòng</h5>
                <div class="form-input">
                  <input type="text" class="form-control form-box" placeholder="Chọn thời gian trả phòng" id="to_time" name="to_time">
                  <i class="calender-o"></i>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Sử dụng</h5>
                <input type="text" value="" class="form-control" placeholder="1 giờ/ngày/đêm" />
              </div>
            </div><!--End col-sm-12-->
            <div class="col-sm-12">
              <div class="col-sm-4">
                <h5>Số người</h5>
                <select class="form-control form-select1 form-box presentation" id="guest_quantity" name="guest_quantity">
                  <option selected disabled="disabled">-- Số người --</option>
                  <option value="1">1 người</option>
                  <option value="2">2 người</option>
                  <option value="3">3 người</option>
                </select>
              </div>
              <div class="col-sm-4">
                <h5>Loại phòng</h5>
                <select class="form-control form-select1 form-box presentation" id="room_type" name="room_type">
                  <option selected=""  disabled="disabled">-- Loại phòng --</option>
                  <option value="phongdon">Phòng đơn</option>
                  <option value="phongdoi">Phòng đôi</option>
                  <option value="phongkhac">Phòng Vip</option>
                </select>
              </div>
              <div class="col-sm-4">
                <h5>Số phòng</h5>
                <input type="number" value="0" class="form-control" placeholder="1" id="room_quantity" name="room_quantity" />
              </div>
            </div><!--End col-sm-12-->
            <div class="col-sm-12">
              <div class="col-sm-8">
                <h5>Số điện thoại: *</h5>
                <input type="number" value="" class="form-control" id="phone" name="phone" />
              </div>
              <div class="col-sm-4">
                <h5>Kiểm tra: *</h5>
                <button class="btn btn-default" type="submit">Check</button>
              </div>
            </div><!--End col-sm-12-->
            <div class="col-sm-12">
              <div class="col-sm-6">
                <h5>Mã ưu đãi? Nhập ngay!</h5>
                <input type="text" value="" class="form-control" />
              </div>
              <div class="col-sm-6">
                <h5>Áp dụng: *</h5>
                <button class="btn btn-default" type="submit">Áp dụng</button>
              </div>
            </div><!--End col-sm-12-->

            <div class="col-sm-12">
              <hr>
              <div class="col-sm-2 col-sm-offset-5">
                <button class="btn btn-warning" type="submit">Đặt phòng</button>
              </div>
            </div>
          </div>
        </form>
        <div class="col-sm-4 form-info">
          Làm sau
        </div>
      </div>
    </div>
  </section>
</body>
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src ="{{ asset('js/jquery.datetimepicker.js') }}" type="text/javascript" ></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{ asset('vendors/moment/moment.js') }}"></script>
<script>
  // Date time
  $('#from_time').datetimepicker({
    step:10,
    format:'d/m/Y H:i',
    minDate : new Date(),
    minTime : new Date(),
  });
  $('#to_time').datetimepicker({
    step:10,
    format:'d/m/Y H:i',
    minDate : new Date(),
  });
  $('#from_time').on('change',function() {
    var from_time = $('#from_time').val();
    if (from_time != '') {
      from_time = from_time.split(' ');
      var date = from_time[0].split('/');
      var time = from_time[1].split(':');
      var date = new Date(date[2],date[1]-1,date[0],time[0],time[1]);
      // console.log(moment(date).format('D/M/Y H:m'));
      $('#to_time').datetimepicker({
        minDate : date,
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

  $('#bookroom_form').validate({
   rules : {
    first_name : 'required',
    last_name : 'required',
    from_time : 'required',
    to_time : 'required',
    phone : 'required',
    room_type : 'required',
    guest_quantity : 'required',
    room_quantity : {
      required : true,
      min : 1,
    },
  }
  });
</script>
</html>