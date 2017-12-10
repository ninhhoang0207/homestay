<header>
   <div class="menu_bar">
      <a href="#" class="bt-menu container"><span class="glyphicon glyphicon-menu-hamburger"></span>FRES.VN</a>
   </div>
   <nav>
      <ul class="form-menu-bar" id="menu_bar">
         <li class="hidden-xs">
            <img src="{{ asset('fontend/images/img1.png') }}" alt="">
         </li>
         <li class="hidden-lg"><a href="#"><span class="icon-house"></span>@lang('hotel/general.trangchu.')</a></li>
         <li class="active"><a href="#"><span class="icon-suitcase"></span>@lang('hotel/general.trangchu.nhanghi')</a></li>
         <li><a href="#"><span class="icon-suitcase"></span>@lang('hotel/general.trangchu.tour')</a></li>
         <li class="submenu">
            <a href="#"><span class="icon-rocket"></span>@lang('hotel/general.trangchu.thongtin')<span class="caret icon-arrow-down6"></span></a>
            <ul class="children">
            <li><a href="#">@lang('hotel/general.trangchu.nhanghivip')<span class="icon-dot"></span></a></li>
            <li><a href="#">@lang('hotel/general.trangchu.nhanghidanhgiatot')<span class="icon-dot"></span></a></li>
            <li><a href="#">@lang('hotel/general.trangchu.nhanghichatluong') <span class="icon-dot"></span></a></li>
            </ul>
         </li>
         <li><a href="#"><span class="icon-earth"></span>@lang('hotel/general.trangchu.goiydulich')</a></li>
         @if(!Auth::check())
         <li class="hidden-lg"><a href="#"><span class="icon-earth"></span>@lang('hotel/general.trangchu.taikhoan')</a></li>
         <li class="pull-right hidden-xs" id="li_account">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="text-transform: uppercase">
               <span class="glyphicon glyphicon-user"></span> @lang('hotel/general.trangchu.taikhoan')
            </button>
         <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                           <li role="presentation" class="active">
                              <a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('hotel/general.trangchu.dangnhap')</a>
                           </li>
                           <li role="presentation" class="register-text">
                              <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('hotel/general.trangchu.dangky')</a>
                           </li>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="home">
                              <div class="col-sm-12 form-login-fb-g">
                                 <p>@lang('hotel/general.trangchu.dangnhap_tb1')</p>
                                 <div class="col-sm-6">
                                    <button onclick="fb_signin()" class="btn btn-danger form-facebook">
                                       <span class="fa fa-facebook"></span>
                                       <span class="sp-icon">Facebook</span>
                                    </button>
                                 </div>
                                 <div class="col-sm-6">
                                    <button onclick="gg_signin()" class="btn btn-danger form-google">
                                       <span class="fa fa-google-plus"></span>
                                       <span class="sp-icon">Google</span>
                                    </button>
                                 </div>
                              </div>
                              <div class="form-input-login">
                                 <p>@lang('hotel/general.trangchu.dangnhap_tb2')</p>
                                 <input placeholder="@lang('hotel/general.trangchu.email')" id="login-email" class="form-control" type="email">
                                 <input placeholder="@lang('hotel/general.trangchu.matkhau')" id="login-pass" class="form-control" type="password">
                              </div>
                              <div id="validation" class="form-group" align="center">
                              </div>
                              <div class="form-question">
                                 <input id="checkbox1" name="remember"  checked="checked" type="checkbox">
                                 <label for="checkbox1">@lang('hotel/general.trangchu.luumatkhau')?</label>
                              </div>
                              <a href="">@lang('hotel/general.trangchu.quenmatkhau')?</a>
                              <button type="button" id="btn-login-header" onclick="login()" class="btn btn-primary" >@lang('hotel/general.trangchu.dangnhap')</button>
                              <div class="modal-footer" >
                                 <p>@lang('hotel/general.trangchu.chuacotaikhoan')?<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">@lang('hotel/general.trangchu.dangky')</a></p>
                              </div>
                           </div>
                           <div role="tabpanel" class="tab-pane form-register" id="profile">
                              <p>@lang('hotel/general.trangchu.dangky_tb1')</p>
                              <input placeholder="@lang('hotel/general.trangchu.taikhoan'), email" id="register-email" class="form-control" type="email">
                              <input placeholder="@lang('hotel/general.trangchu.matkhau')" id="register-password" class="form-control" type="password">
                              <input placeholder="@lang('hotel/general.trangchu.nhaplaimatkhau')" id="register-repw" class="form-control" type="password">
                              <p class="text-condition">@lang('hotel/general.trangchu.dangky_tb2')</p>
                              <button type="button" id="btn-login-header" class="btn btn-primary">@lang('hotel/general.trangchu.dangky')</button>
                              <div class="modal-footer" >
                                 <p>@lang('hotel/general.trangchu.dacotaikhoan')?<a href=""> @lang('hotel/general.trangchu.dangnhap')</a></p>
                              </div>
                           </div>
                        </div>
                     </div> <!--End Tabs -->
                  </div> <!--End modal-content -->
               </div>
            </div>
         </li>
         @else
         <li class="submenu pull-right hidden-xs">
            <a href="#"><span class="icon-rocket"></span>@lang('hotel/general.trangchu.xinchao'): {{Auth::getUser()->name}}<span class="caret icon-arrow-down6"></span></a>
            <ul class="children">
               <li><a href="#">@lang('hotel/general.trangchu.thongtintaikhoan')<span class="icon-dot"></span></a></li>
               <li><a href="{{route('user.bookroomHistory')}}">@lang('user/general.lichsudatphong')<span class="icon-dot"></span></a></li>
               <li><a href="{{route('logout')}}">@lang('hotel/general.trangchu.thoat') <span class="icon-dot"></span></a></li>
            </ul>
         </li>
         @endif
      </ul>
   </nav>
</header><!-- /header -->

<script type="text/javascript">

   function login(){
      var email = $('#login-email').val();
      var password = $("#login-pass").val();
      var remember = $('#checkbox1').is(':checked');

      if(email == '' || password == ''){
         var validation_string = "{{Lang::get('val.message')}}";
         var append_string = "<label style='color:red'>" + validation_string + "</label>";
         $('#validation').empty();
         $('#validation').append(append_string);
      }else{
         jQuery.noConflict();
         $.ajax({
            headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
           },
           url : "{{route('signin')}}",
           data : {
            email : email,
            password : password,
            remember : remember,
         },
         type : "POST",
      }).done(function(data){
         if(data != -1){
            $('#myModal').modal('hide');
            setTimeout(function(){
               $('#li_account').empty();
               $('#li_account').append(data);
            },350);
            setTimeout(function(){
               $('#myModal').remove();
            },2000);
         }else{
            var validation_string = "{{Lang::get('val.wrong_info')}}";
            var append_string = "<label style='color:red'>" + validation_string + "</label>";
            $('#validation').empty();
            $('#validation').append(append_string);
         }
      });
      }
   }

   function fb_signin(){
      jQuery.noConflict();
      location.href = "{{route('facebookLogin')}}";
   }

   function gg_signin(){
      jQuery.noConflict();
      location.href = "{{route('googleLogin')}}";
   }
</script>