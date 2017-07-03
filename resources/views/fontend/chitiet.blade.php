<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Thông tin nhà nghỉ | Đặt phòng online</title>
	<link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
	<link href="{{ asset("css/style-info.css") }}" rel="stylesheet">
	<link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	@include('includes/fontend_topmenu')
	<!--INFO HOTEL-->

	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
	<script>
        //Reference http://www.jssor.com/development/slider-with-slideshow-no-jquery.html
        //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html
        jssor_slider1_starter = function (containerId) {

        	var _SlideshowTransitions = [
            //Fade in L
            {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade out R
            , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade in R
            , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade out L
            , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }

            //Fade in T
            , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade out B
            , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade in B
            , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade out T
            , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }

            //Fade in LR
            , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade out LR
            , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade in TB
            , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade out TB
            , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }

            //Fade in LR Chess
            , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade out LR Chess
            , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade in TB Chess
            , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade out TB Chess
            , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }

            //Fade in Corners
            , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }
            //Fade out Corners
            , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Outside: true }

            //Fade Clip in H
            , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade Clip out H
            , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade Clip in V
            , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            //Fade Clip out V
            , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $Jease$.$OutCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 }
            ];

            var options = {
                $AutoPlay: 1,                                    //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,                    //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                 //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                 },

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                 },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $Cols: 10,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 360                           //[Optional] The offset position to park thumbnail
                 }
              };

              var jssor_slider1 = new $JssorSlider$(containerId, options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
            	var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            	if (parentWidth)
            		jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 660), 150));
            	else
            		$Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
         };
      </script>
      <section>
      	<div class="col-sm-10 col-sm-offset-1 address-title hidden-xs">
      		<div class="col-sm-6">
      			<a href="#">@lang('detail/general.trangchu')
      				<span class="glyphicon glyphicon-play"></span>
      			</a>
      			<a href="#"> @lang('detail/general.thongtinnhanghi')
      				<span class="glyphicon glyphicon-play"></span>
      			</a>
      			<a href="#"> {{$data->ten}}</span></a>
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
      				<p>@lang('detail/general.uudai')</p>
      			</div>
      		</div>
      	</div>
      	<div class="col-xs-12 col-sm-10 col-sm-offset-1 info-address-title">
      		<div class="col-xs-12  col-sm-8 info-address">
      			<h1>{{$data->ten}}</h1>
      			<h2><span class="glyphicon glyphicon-map-marker"></span>{{$data->diachi}}</h2>
      		</div>
      		<div class="col-xs-12 col-sm-4 btn-book-room"> 
      			<a href="" class="btn  book-room">@lang('detail/general.datphongngay') <span class="glyphicon glyphicon-hand-up"></span></a>
      		</div>
      	</div>
      	<!--Left content-->
      	<div class="col-xs-12 col-sm-7">
      		<div class="img-info-hotel" id="slider1_container" >
      			<!-- Loading Screen -->
      			<div u="loading" style="position: absolute; top: 0px; left: 0px;">
      				<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
      				background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
      			</div>
      			<div style="position: absolute; display: block; background: url('{{asset('images/loading.gif')}}') no-repeat center center;
      			top: 0px; left: 0px;width: 100%;height:100%;">
      		</div>
      	</div>

      	<!-- Slides Container -->
      	<div u="slides" class="img-show" >
      			
      		<?php foreach ($imgs as $key => $value): ?>
      		<div>
      			<img u="image" src="{{$value->url_hinhanh}}" />
      			<img u="thumb" src="{{$value->url_hinhanh}}" height="72px" width="72px" />
      		</div>
      		<?php endforeach ?>

      	</div>
      	
      	<!--#region Arrow Navigator Skin Begin -->
      	
      	<!-- Arrow Left -->
      	<span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;">
      	</span>
      	<!-- Arrow Right -->
      	<span u="arrowright" class="jssora05r" style="top: 158px; right: 8px">
      	</span>
      	<!--#endregion Arrow Navigator Skin End -->
      	<!--#region Thumbnail Navigator Skin Begin -->
      	<!-- Help: http://www.jssor.com/development/slider-with-thumbnail-navigator-no-jquery.html -->

      	<!-- thumbnail navigator container -->
      	<div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
      		<!-- Thumbnail Item Skin Begin -->
      		<div u="slides" style="cursor: default;">
      			<div u="prototype" class="p">
      				<div class=w><div u="thumbnailtemplate" class="t"></div></div>
      				<div class=c></div>
      			</div>
      		</div>
      		<!-- Thumbnail Item Skin End -->
      	</div>
      	<!--#endregion Thumbnail Navigator Skin End -->
      	<!-- Trigger -->
      	<script>
      		jssor_slider1_starter('slider1_container');
      	</script>
      </div>
      <div class="form-find-fast-left hidden-xs">
      	<h2>@lang('detail/general.diadiemnendi') ?</h2>
      	<div class="form-suggest" >
      		<!-- info 1-->
      		<div class="col-sm-12 form-info-suggest">
      			<div class="col-sm-2">
      				<img src="images/39_big.jpg" alt="img1">
      			</div>
      			<div class="col-sm-10">
      				<h4>Đền ngọc sơn</h4>
      				<p>
      					Khách Sạn Diamond Sea tọa lạc tại số 232 Võ Nguyên Giáp, Quận Sơn Trà, thành phố Đà Nẵng, con đường đẹp nhất Thành phố Đà Nẵng
      				</p>
      			</div>
      		</div>
      	</div>
      </div>
   </div>


   <!--Right content-->
   <div class="col-xs-12 col-sm-5 form-xs-12">
   	<div class="form-find-fast">
   		<h2>@lang('detail/general.gioithieunhanghi')</h2>
   		<p>
   			{{$data->mota}}
   		</p>
   	</div>
   	<div class="info-hotel-price">
   		<table class="table table-bordered">
   			<thead>
   				<tr>
   					<th>@lang('detail/general.banggia')</th>
   					<th>@lang('detail/general.phongdon')</th>
   					<th>@lang('detail/general.phongdoi')</th>
   					<th>@lang('detail/general.phongkhac')</th>
   				</tr>
   			</thead>
   			<tbody>
   				<tr>
   					<td>@lang('detail/general.giodau')</td>
   					<td>{{$data->phongdon_motgio}} đ</td>
   					<td>{{$data->phongdoi_motgio}} đ</td>
   					<td>{{$data->phongkhac_motgio}} đ</td>
   				</tr>
   				<tr>
   					<td>@lang('detail/general.giotieptheo')</td>
   					<td>{{$data->phongdon_giotieptheo}} đ</td>
   					<td>{{$data->phongdoi_giotieptheo}} đ</td>
   					<td>{{$data->phongkhac_giotieptheo}} đ</td>
   				</tr>
   				<tr>
   					<td>@lang('detail/general.quadem')</td>
   					<td>{{$data->phongdon_quadem}} đ</td>
   					<td>{{$data->phongdoi_quadem}} đ</td>
   					<td>{{$data->phongkhac_quadem}} đ</td>
   				</tr>
   				<tr>
   					<td>@lang('detail/general.motngay')</td>
   					<td>{{$data->phongdon_nhieungay}} đ</td>
   					<td>{{$data->phongdoi_nhieungay}} đ</td>
   					<td>{{$data->phongkhac_nhieungay}} đ</td>
   				</tr>
   			</tbody>
   		</table>
   	</div>
   	<div class="form-find-fast form-info-promotion">
   		<h2>@lang('detail/general.khuyenmai')</h2>
   		<a href=""><span class="glyphicon glyphicon-gift"></span> @lang('detail/general.kmlentoi'): <strong>10%</strong></a>
   		<p>@lang('detail/general.hankhuyenmai'): 
   			<span>10</span> - 
   			<span>10</span> - 
   			<span>2017</span>
   		</p>
   	</div>
   	<div class="form-find-fast form-service">
   		<h2>@lang('detail/general.dichvu')</h2>
   		<?php foreach ($data->dichvu as $key => $value): ?>
   		<div class="col-xs-6 col-sm-4">
   			<a href=""><span class="glyphicon glyphicon-check "></span> {{$ten_dichvu[$value]}}</a>
   		</div>
   		<?php endforeach ?>
   	</div>
   	<div class="form-find-fast form-info-add-text">
   		<h2>@lang('detail/general.thongtin')</h2>
   		<div class="form-info-add">
   			<a href="" class="form-a">@lang('detail/general.tongsophong'): <span>{{$data->so_phongdon+$data->so_phongdoi+$data->so_phongkhac}} @lang('detail/general.phong')</span></a></br>
   			<a href="" class="form-a">Phòng Đơn: <span>{{$data->so_phongdon}} @lang('detail/general.phong')</span></a>
   			<a href="" >, @lang('detail/general.dientich') <span>{{$data->dientich_phongdon}} m<sup>2</sup></span></a></br>
   			<a href="" class="form-a">@lang('detail/general.phongdoi'): <span>{{$data->so_phongdoi}} @lang('detail/general.phong')</span></a>
   			<a href="" >, @lang('detail/general.dientich') <span>{{$data->dientich_phongdoi}} m<sup>2</sup></span></a><br>
   			<a href="" class="form-a">@lang('detail/general.phongkhac'): <span>{{$data->so_phongkhac}} @lang('detail/general.phong')</span></a>
   			<a href="" >, @lang('detail/general.dientich') <span>{{$data->dientich_phongkhac}} m<sup>2</sup></span></a><br>
   		</div>
   	</div>
   	<div class="form-find-fast">
   		<h2>@lang('detail/general.ghichu')</h2>
   		<p>
   		@if ($data->ghichu == '')
   		Không có ghi chú nào.
   		@else
   		{{$data->ghichu}}
   		@endif
   		</p>
   	</div>
   	<div class="col-xs-12 col-sm-12 btn-book-room1"> 
   		<a href="" class="btn  book-room">@lang('detail/general.datphongngay') <span class="glyphicon glyphicon-hand-up"></span></a>
   	</div>
   	<!--end form-find-fast-->
   </div>
   <div class="col-xs-12 col-sm-12 form-comment ">
   	<div class="form-info-com">
   		<h2>@lang('detail/general.danhgiann')</h2>
   		<!-- All rate comment-->
   		<div class="col-xs-12 col-sm-12 form-rate">
   			<div class="col-xs-12 col-sm-4 ">
   				<div class="col-xs-5 col-sm-5 all-rate">
   					<span>1000</span>
   					<br>
   					<span>@lang('detail/general.danhgia')</span>
   				</div>
   				<div class=" col-xs-7 col-sm-7 result-rate">
   					<span class="rate">8,6</span>
   					<br>
   					<span class="text">Rất tốt</span>
   				</div>
   			</div>
   			<div class="col-xs-12 col-sm-8 box-col-xs-12-rate">
   				<!--item rate 1-->
   				<div class="col-xs-12 col-sm-12 form-info-rate">
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.gia')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 80%;"></div>
   						</div>
   					</div>
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.khoangcach')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 48%;"></div>
   						</div>
   					</div>
   				</div>
   				<!--item rate 2-->
   				<div class="col-xs-12 col-sm-12 form-info-rate">
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.sachse')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 48%;"></div>
   						</div>
   					</div>
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.phucvu')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 48%;"></div>
   						</div>
   					</div>
   				</div>
   				<!--item rate 3-->
   				<div class="col-xs-12 col-sm-12 form-info-rate">
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.tienich')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 48%;"></div>
   						</div>
   					</div>
   					<div class="col-xs-12 col-sm-6 ">
   						<div class="rate-title">
   							<span class="price">@lang('detail/general.dichvu')</span>
   							<span class="number">7.5</span>
   						</div>
   						<div class="score_bar">
   							<div class="score_bar_value" data-score="48" style="width: 48%;"></div>
   						</div>
   					</div>
   				</div>
   			</div>
   		</div>
   		<!--END All rate comment-->

   		<!--All comment-->
   		<div class="colxs-12 col-sm-12 form-all-comment">
   			<!--Item 1-->
   			<div class="col-xs-12 col-sm-10 col-sm-offset-1 form-comment-people">
   				<div class="col-xs-12 col-sm-3 info-people">
   					<strong>Nguyễn Văn An</strong>
   					<hr>
   					<span>26/7/2017</span>
   				</div>
   				<div class="col-xs-12 col-sm-9 box-rate-people">
   					<div>
   						<span class="box-rate">9.0</span>
   						<span class="box-title">"Rất tốt"</span>
   					</div>
   					<div class="box-review">
   						<small>“Giá cả cũng tương đối phù hợp. Nhân viên khách sạn họ có cung cách phục vụ khách hàng tốt. Phòng ốchất cơ bản đầy đủ, điều hòa trong phòng tôi lúc nghỉ ngơi hơi bị nóng</small>
   					</div>
   				</div>
   			</div>
   			<!--Item 1-->
   			<div class="col-xs-12 col-sm-10 col-sm-offset-1 form-comment-people">
   				<div class="col-xs-12 col-sm-3 info-people">
   					<strong>Nguyễn Văn An</strong>
   					<hr>
   					<span>26/7/2017</span>
   				</div>
   				<div class="col-xs-12 col-sm-9 box-rate-people">
   					<div>
   						<span class="box-rate">9.0</span>
   						<span class="box-title">"Rất tốt"</span>
   					</div>
   					<div class="box-review">
   						<small>“Giá cả cũng tương đối phù hợp. Nhân viên khách sạn họ có cung cách phục vụ khách hàng tốt. Phòng ốchất cơ bản đầy đủ, điều hòa trong phòng tôi lúc nghỉ ngơi hơi bị nóng</small>
   					</div>
   				</div>
   			</div>
   			<!--Item 1-->
   			<div class="col-xs-12 col-sm-10 col-sm-offset-1 form-comment-people">
   				<div class="col-xs-12 col-sm-3 info-people">
   					<strong>Nguyễn Văn An</strong>
   					<hr>
   					<span>26/7/2017</span>
   				</div>
   				<div class="col-xs-12 col-sm-9 box-rate-people">
   					<div>
   						<span class="box-rate">9.0</span>
   						<span class="box-title">"Rất tốt"</span>
   					</div>
   					<div class="box-review">
   						<small>“Giá cả cũng tương đối phù hợp. Nhân viên khách sạn họ có cung cách phục vụ khách hàng tốt. Phòng ốchất cơ bản đầy đủ, điều hòa trong phòng tôi lúc nghỉ ngơi hơi bị nóng</small>
   					</div>
   				</div>
   			</div>


   		</div>
   		<!--END All comment-->
   	</div>
   </div>
</section>
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/style_detail.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jssor.slider.min.js') }}"></script>

</html>