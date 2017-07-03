<section>
    <!--++++++++Slider++++++++++++++-->
   <div class="slider-img-content hidden-xs">
      <div id="jssor_1">
         <div class="slider-w" data-u="slides">
            <div>
               <img data-u="image" src="fontend/img/nen1.jpg" alt="imgshow1" />
               <div class="slider-caption" data-u="caption" data-t="0" >
                  <img class="slider-img1" src="<?php echo e(asset('fontend/img/c-phone.png')); ?>" alt="imgshow-phone">
                  <img class="slider-img2" data-u="caption" data-t="1"  src="<?php echo e(asset('fontend/img/c-jssor-slider.png')); ?>" alt="imgshow-phone"/>
                  <img class="slider-img3" data-u="caption" data-t="2" src="<?php echo e(asset('fontend/img/c-text.png')); ?>" alt="imgshow-phone" />
                  <img class="slider-img4" data-u="caption" data-t="3" src="<?php echo e(asset('fontend/img/c-fruit.png')); ?>" alt="imgshow-phone" />
                  <img class="slider-img5" data-u="caption" data-t="4" src="<?php echo e(asset('fontend/img/c-navigator.png')); ?>" alt="imgshow-phone" />
               </div>
               <div class="slider-caption2" data-u="caption" data-t="5" >
                  <img class="slider-img" src="<?php echo e(asset('fontend/img/c-phone-horizontal.png')); ?>" alt="imgshow-phone"/>
                  <div  class="slider-next-img" >
                     <img class="slider-img6" data-u="caption" data-t="6" src="<?php echo e(asset('fontend/img/c-slide-1.jpg')); ?>" alt="imgshow-phone" />
                     <img class="slider-img7" data-u="caption" data-t="7" src="<?php echo e(asset('fontend/img/c-slide-3.jpg')); ?>" alt="imgshow-phone"/>
                   </div>
                  <img class="slider-img8" src="<?php echo e(asset('fontend/img/c-navigator-horizontal.png')); ?>" alt="imgshow-phone"/>
                  <img class="slider-img9" data-u="caption" data-t="8" src="<?php echo e(asset('fontend/img/c-finger-pointing.png')); ?>" alt="imgshow-phone" />
               </div>
            </div>
            <div>
               <img data-u="image" src="<?php echo e(asset('fontend/img/fslide02.jpg')); ?>" alt="imgshow-phone"/>
            </div>
            <div>
               <img data-u="image" src="<?php echo e(asset('fontend/img/nen2.jpg')); ?>" alt="imgshow-phone"/>
            </div>
         </div>
          <!-- Bullet Navigator -->
         <div data-u="navigator" class="jssorb05" data-autocenter="1">
              <!-- bullet navigator item prototype -->
            <div class="jssorb05-w" data-u="prototype" ></div>
         </div>
          <!-- Arrow Navigator -->
         <span data-u="arrowleft" class="jssora22l" data-autocenter="2"></span>
         <span data-u="arrowright" class="jssora22r" data-autocenter="2"></span>
      </div>
   </div>
    <!--++++++++END    Slider++++++++++++++-->



   <div id="carousel-example-generic" class="carousel slide hidden-lg" data-ride="carousel">
      
      <!-- Indicators -->
      <ol class="carousel-indicators">
         <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
         <li data-target="#carousel-example-generic" data-slide-to="1"></li>
         <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
         <div class="item active">
            <img src="<?php echo e(asset('fontend/img/hnen1.jpg')); ?>" alt="slide-image">
            <div class="carousel-caption">
               <p>Hội An</p>
            </div>
         </div>
         <div class="item">
            <img src="<?php echo e(asset('fontend/img/hnen1.jpg')); ?>" alt="slide-image">
            <div class="carousel-caption">
               <p>Ha noi</p>
            </div>
         </div>
         ...
      </div>
      <!-- Controls -->
   </div>


   <form class="form-search container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 ">
            <div class="col-xs-12 col-sm-4 col-sm-offset-4 ">
               <h1><?php echo app('translator')->getFromJson('hotel/general.trangchu.timkiemnhanghi'); ?></h1>
            </div><!--End col-sm-12 -->
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
               <div class="col-xs-12 col-sm-5">
                  <h5><?php echo app('translator')->getFromJson('hotel/general.trangchu.noitimkiem'); ?></h5>
                  <div class="form-input">
                     <input id="address" name="address" type="text" class="form-control form-box" placeholder="<?php echo app('translator')->getFromJson('hotel/general.trangchu.tenvitri'); ?>...">
                     <i class="map-maker"></i>
                     <input type="hidden" name="lat" id="lat" value="21.0031177">
                     <input type="hidden" name="lng" id="lng" value="105.82014079999999">
                  </div>
               </div><!--END col-sm-4-->
               <div class="col-xs-6 col-sm-2">
                  <h5><?php echo app('translator')->getFromJson('hotel/general.trangchu.thoigiannhan'); ?></h5>
                  <div class="form-input">
                     <input type="text" class="form-control form-box" id="from_time" placeholder="">
                     <i class="calender-o"></i>
                  </div>
               </div> <!--End col-sm-2 -->
               <div class="col-xs-6 col-sm-2">
                  <h5><?php echo app('translator')->getFromJson('hotel/general.trangchu.thoigiantra'); ?></h5>
                  <div class="form-input">
                     <input type="text" class="form-control form-box" id="to_time" placeholder="">
                     <i class="calender-o"></i>
                  </div>
               </div> <!--End col-sm-2 -->
               <div class="col-xs-2 col-sm-1 hidden-xs">
                  <h5><?php echo app('translator')->getFromJson('hotel/general.trangchu.thoigian'); ?></h5>
                  <input type="text" value="" class="form-control" placeholder="1 ngày" />
               </div><!--End col-sm-1 -->
               <div class="col-xs-12 col-sm-2">
                  <button type="button" class="btn_search" onclick="search()"><span class="glyphicon glyphicon-search"></span> <?php echo app('translator')->getFromJson('hotel/general.trangchu.timkiem'); ?></button>
               </div><!--End col-sm-2 -->
               <div class="col-sm-3 features hidden-xs">
                  <img src="<?php echo e(asset('fontend/images/iconcard.png')); ?>" alt="">
                  <div class="feature"><?php echo app('translator')->getFromJson('hotel/general.trangchu.quangcao1'); ?></div>
               </div>
               <div class="col-sm-3 features hidden-xs">
                  <img src="<?php echo e(asset('fontend/images/iconcash.png')); ?>" alt="">
                  <div class="feature"><?php echo app('translator')->getFromJson('hotel/general.trangchu.quangcao2'); ?></div>
               </div>
               <div class="col-sm-3 features hidden-xs">
                  <img src="<?php echo e(asset('fontend/images/iconcup.png')); ?>" alt="">
                  <div class="feature"><?php echo app('translator')->getFromJson('hotel/general.trangchu.quangcao3'); ?></div>
               </div>
               <div class="col-sm-3 features hidden-xs">
                  <img src="<?php echo e(asset('fontend/images/iconcash.png')); ?>" alt="">
                  <div class="feature"><?php echo app('translator')->getFromJson('hotel/general.trangchu.quangcao4'); ?></div>
               </div>
            </div><!--End col-sm-offset-8 -->
         </div><!--End col-sm-12 -->
      </div><!--End Row-->
   </form>
   <!--++++++++END    FORM ++++++++++++++-->
</section>

<?php $__env->startPush('scripts'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUtVPgnRKR8TwzcKdUkjkFpD6Aerf68ZY&sensor=true&libraries=places&language=vi"></script>
<script src ="<?php echo e(asset('js/jquery.datetimepicker.js')); ?>" type="text/javascript" ></script>
<script type="text/javascript">

//Check place google map
var check_place = 1;
$('#address').on('input',function(){
    check_place = -1;
});
var input = document.getElementById('address');
var searchBox = new google.maps.places.SearchBox(input);
google.maps.event.addListener(searchBox,'places_changed',function(){
    var places = searchBox.getPlaces();
    if (places[0].geometry != null) {
    	console.log(places[0].geometry.location.lat()+":"+places[0].geometry.location.lng());
    	$('#lat').val(places[0].geometry.location.lat());
    	$('#lng').val(places[0].geometry.location.lng());
        check_place = 1;
    } else {
        alert('<?php echo e(Lang::get('val.wrong_address')); ?>');
        check_place = 0;
    }
});

function search(){
    var address = $('#address').val();
    if (address === '' || address === null || check_place != 1) {
        alert('<?php echo e(Lang::get('val.wrong_address')); ?>');
        return false;
    }
    var lat = $('#lat').val();
    var lng = $('#lng').val();
    jQuery.noConflict();
    var url = "<?php echo e(route('searchHotel')); ?>" + "/" + lat + "-" + lng;
    window.location = url;
}

// Date time
$('#from_time').datetimepicker({
        format:'d/m/Y H:i'
    });
    $('#to_time').datetimepicker({
        format:'d/m/Y H:i'
    });

    $('#from_time').on('change',function() {
        var from_time = $('#from_time').val();
        if (from_time != '') {
        	from_time = from_time.split(' ');
        	var date = from_time[0].split('/');
        	var time = from_time[1].split(':');
        	var date = new Date(date[2],date[1]-1,date[0],time[0],time[1]);
        	$('#to_time').datetimepicker({
        		minDate : date,
            	minTime : date,
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

</script>
<?php $__env->stopPush(); ?>