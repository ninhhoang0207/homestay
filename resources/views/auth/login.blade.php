<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title> @lang("auth/general.dangnhap") | @lang("general.tieude")</title>
    
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- NProgress -->
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
                        
                        <h1>@lang('auth/general.dangnhap')</h1>
                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('auth/general.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->has('email'))
                            <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                      </div>
                      
                      <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control" placeholder="@lang('auth/general.matkhau')" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                      
                  </div>
                  <div>
                    <input type="submit" class="btn btn-default submit" value="@lang('auth/general.dangnhap')">
                    <input type="reset" class="btn btn-default submit" value="@lang('auth/general.huy')">
                    <!-- <a class="reset_pass" href="{{  url('/password/reset') }}">@lang('auth/general.quentk')</a> -->
                </div>
                
                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">@lang('auth/general.chuacotk')
                        <a href="{{ url('/register') }}" class="to_register"> @lang('auth/general.dangky') </a>
                    </p>
                    <div>
                        <a href="{{route('facebookLogin')}}"><i class="fa fa-facebook-square"></i> @lang('auth/general.dangnhapbangfb')</a>
                    </div>
                    <div>
                        <a href="{{route('googleLogin')}}"><i class="fa fa-google-plus"></i> @lang('auth/general.dangnhapbanggg')</a>
                    </div>
                    <!-- <div
                    class="fb-like"
                    data-share="true"
                    data-width="450"
                    data-show-faces="true"> -->
                </div>
            </div>
        </form>
    </section>
</div>
</div>
</div>
<!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1420574451333200',
      xfbml      : true,
      version    : 'v2.9'
  });
    FB.AppEvents.logPageView();
};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script> -->
</body>
</html>