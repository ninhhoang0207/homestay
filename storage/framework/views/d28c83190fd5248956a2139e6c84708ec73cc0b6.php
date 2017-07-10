<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('hotel/general.dangkynhanghi'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
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
<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<link href="<?php echo e(asset("css/jquery.datetimepicker.min.css")); ?>" rel="stylesheet">
<style type="text/css">
    #map-canvas{
        width: 350;
        height: 250px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<form class="form-horizontal form-label-left input_mask" method="post" enctype="multipart/form-data" action="hotel-create" id="register-form">
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2><?php echo app('translator')->getFromJson('hotel/general.dangkynhanghi'); ?><small></small></h2>
        
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="-1">
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.ten'); ?> * </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" id="name" placeholder="<?php echo app('translator')->getFromJson('hotel/general.ten'); ?>" name="name">
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.sophongdon'); ?> *</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="singleroom_number" id="singleroom_number">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.dientich'); ?> *</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="singleroom_square" id="singleroom_square">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.sophongdoi'); ?> *</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="doubleroom_number" id="doubleroom_number" >
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.dientich'); ?> *</label>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="doubleroom_square" id="doubleroom_square" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.sophongkhac'); ?> *</label>
                        <div class="ccol-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="otherroom_number" id="otherroom_number">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-6"><?php echo app('translator')->getFromJson('hotel/general.dientich'); ?> *</label>
                        <div class="ccol-md-3 col-sm-3 col-xs-6">
                            <input class="form-control" type="number" min="0" name="otherroom_square" id="otherroom_square">
                        </div>
                    </div>
                </div>
               
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.sdt'); ?> *</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" class="form-control " name="phone" 
                              placeholder="<?php echo app('translator')->getFromJson('user/general.sdt'); ?>">
                        </div>
                    </div>
                </div>

              <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.email'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo app('translator')->getFromJson('hotel/general.email'); ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.sotang'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" class="form-control" name="floor_numb" id="floor_numb" placeholder="<?php echo app('translator')->getFromJson('hotel/general.sotang'); ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.thoihan_dk'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" id="single_cal3" placeholder="<?php echo app('translator')->getFromJson('hotel/general.thoihan_dk'); ?>" aria-describedby="inputSuccess2Status" name="end_date" data>
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- x_content -->
        </div>
        <!-- x_panel -->
        <div class="x_panel">
            <div class="x_content">
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.dichvu'); ?> *</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id="service">
                            <?php foreach ($services as $key => $value): ?>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                <label ><?php echo e($value->ten_dv); ?></label>
                                <input class="flat" type="checkbox" value="<?php echo e($value->id); ?>" name="services[]">
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id="services_validate"></div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 form-group ">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.banggia'); ?> *</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <table class="table">
                            <thead>
                                <th style="width: 20%;"><?php echo app('translator')->getFromJson('hotel/general.banggia'); ?> </th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.phongdon'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.phongdoi'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.phongkhac'); ?></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo app('translator')->getFromJson('hotel/general.giodau'); ?></td>
                                    <td><input class="form-control" type="number" min="0" name="singleroom_price[0]" ></td>
                                    <td><input class="form-control" type="number" min="0" name="doubleroom_price[0]"></td>
                                    <td><input class="form-control" type="number" min="0" name="otherroom_price[0]"></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->getFromJson('hotel/general.giotieptheo'); ?></td>
                                    <td><input class="form-control" type="number" min="0" name="singleroom_price[1]"></td>
                                    <td><input class="form-control" type="number" min="0" name="doubleroom_price[1]"></td>
                                    <td><input class="form-control" type="number" min="0" name="otherroom_price[1]"></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->getFromJson('hotel/general.quadem'); ?></td>
                                    <td><input class="form-control" type="number" min="0" name="singleroom_price[2]"></td>
                                    <td><input class="form-control" type="number" min="0" name="doubleroom_price[2]"></td>
                                    <td><input class="form-control" type="number" min="0" name="otherroom_price[2]"></td>
                                </tr>
                                <tr>
                                    <td><?php echo app('translator')->getFromJson('hotel/general.nhieungay'); ?></td>
                                    <td><input class="form-control" type="number" min="0" name="singleroom_price[3]"></td>
                                    <td><input class="form-control" type="number" min="0" name="doubleroom_price[3]"></td>
                                    <td><input class="form-control" type="number" min="0" name="otherroom_price[3]"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Thoi gian quy dinh -->
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.thoigianquydinh'); ?>*</label>
                    <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                        <label class="col-md-2"><?php echo app('translator')->getFromJson('hotel/general.theogio'); ?>: </label>
                        <label class="col-md-1"><?php echo app('translator')->getFromJson('hotel/general.tu'); ?></label>
                        <input class="col-md-2" id="fromtime_hour" name="fromtime_hour">
                        <label class="col-md-1"><?php echo app('translator')->getFromJson('hotel/general.den'); ?> </label>
                        <input class="col-md-2" id="totime_hour" name="totime_hour">
                        <!-- <label class="col-md-2">Cùng ngày</label> -->
                        <div class="col-md-2">
                        	<select id="hour" name="hour">
                        		<option value="0"><?php echo app('translator')->getFromJson('hotel/general.homnay'); ?></option>
                        		<option value="1"><?php echo app('translator')->getFromJson('hotel/general.homsau'); ?></option>
                        	</select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                        <label class="col-md-2"><?php echo app('translator')->getFromJson('hotel/general.quadem'); ?>: </label>
                        <label class="col-md-1"><?php echo app('translator')->getFromJson('hotel/general.tu'); ?></label>
                        <input class="col-md-2" id="fromtime_night" name="fromtime_night">
                        <label class="col-md-1"><?php echo app('translator')->getFromJson('hotel/general.den'); ?> </label>
                        <input class="col-md-2" id="totime_night" name="totime_night">
                        <div class="col-md-2">
                        	<select id="overnight" name="overnight">
                        		<option value="0"><?php echo app('translator')->getFromJson('hotel/general.homnay'); ?></option>
                        		<option value="1"><?php echo app('translator')->getFromJson('hotel/general.homsau'); ?></option>
                        	</select>
                        </div>
                    </div>

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.ghichu'); ?> </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea class="form-control" rows="5" name="note" id="note"></textarea>
                    </div>
                </div>
            </div><!-- x_content -->
        </div><!-- x_panel -->

        <div class="x_panel">
            <div class="x_content">
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo app('translator')->getFromJson('hotel/general.diachi'); ?> *</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" name="address" id="address" value="Hà Nội, Việt Nam" placeholder="" >
                            <input type="hidden" name="lat" id="lat" value="21.0031177">
                            <input type="hidden" name="lng" id="lng" value="105.82014079999999">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div id="address_validate" class="col-md-9 col-sm-9 col-xs-12"></div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                        <div id="map-canvas"></div>
                    </div>
                </div>
            </div><!-- x_content -->
        </div><!-- x_panel -->

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-12">
                        <label><?php echo app('translator')->getFromJson('hotel/general.mota'); ?>:</label>
                        <!-- <textarea class="ckeditor" id="editor1" name="description">
                            
                        </textarea> -->
                        <textarea class="form-control" rows="5" cols="5" name="description">
                            
                        </textarea>
                    </div>
                </div>
                <!-- Hotel Images dropzone -->
                <div class="form-group">
                    <div class="col-md-12">
                        <label><?php echo app('translator')->getFromJson('hotel/general.hinhanh_nhanghi'); ?></label>
                        <div class="dropzone" id="dz">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single room images dropzone -->
                <div class="form-group">
                    <div class="col-md-12">
                        <label><?php echo app('translator')->getFromJson('hotel/general.hinhanh_phongdon'); ?></label>
                        <div class="dropzone" id="dz1">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Double room images dropzone -->
                <div class="form-group">
                    <div class="col-md-12">
                        <label><?php echo app('translator')->getFromJson('hotel/general.hinhanh_phongdoi'); ?></label>
                        <div class="dropzone" id="dz2">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other room images dropzone -->
                <div class="form-group">
                    <div class="col-md-12">
                        <label><?php echo app('translator')->getFromJson('hotel/general.hinhanh_phongkhac'); ?></label>
                        <div class="dropzone" id="dz3">
                            <div class="fallback">
                                <input name="file" type="file" multiple />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- X-content -->
        </div> <!-- x_panel -->

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                        <button type="button" class="btn btn-primary"><?php echo app('translator')->getFromJson('general.huy'); ?></button>
                        <!-- <button class="btn btn-primary" type="reset">Reset</button> -->
                        <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('general.dangky'); ?></button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
<?php $__env->startPush('scripts'); ?>

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
<!-- ckeditor -->
<script type="text/javascript" src="<?php echo e(asset('js/ckeditor/ckeditor.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/ckeditor/config.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/ckfinder/ckfinder.js')); ?>"></script>
    <!-- Dropzone.js -->
<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?php echo e(asset('js/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUtVPgnRKR8TwzcKdUkjkFpD6Aerf68ZY&sensor=true&libraries=places&language=vi"></script>

<script src ="<?php echo e(asset('js/jquery.datetimepicker.js')); ?>" type="text/javascript" ></script>
<script type="text/javascript">

$('#fromtime_hour').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 1,
});
$('#totime_hour').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 1,
});
$('#fromtime_night').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 1,
});
$('#totime_night').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 1,
});
function setMinTime(thoigianden,loaithoigian,loai){
	var type = $(loai).val();
	if(type == 0 && thoigianden != ''){
		thoigianden = thoigianden.split(':');
		var date = new Date();
		date.setHours(thoigianden[0]);
		date.setMinutes(thoigianden[1]);
		date.setSeconds(00);
		$(loaithoigian).datetimepicker({
			minTime : date,
		});
	}else{
		$(loaithoigian).datetimepicker({
			minTime : false,
		});
	}
}

function setMaxTime(thoigiantra,loaithoigian,loai){
	var type = $(loai).val();
	if(type == 0 && thoigiantra != ''){
		thoigiantra = thoigiantra.split(':');
		var date = new Date();
		date.setHours(thoigiantra[0]);
		date.setMinutes(thoigiantra[1]);
		date.setSeconds(00);
		$(loaithoigian).datetimepicker({
			maxTime : date,
		});
	}else{
		$(loaithoigian).datetimepicker({
			maxTime : false,
		});
	}
}
$('#fromtime_hour').on('change',function(){
	var thoigianden = $('#fromtime_hour').val();
	setMinTime(thoigianden,'#totime_hour','#hour');
});
$('#fromtime_night').on('change',function(){
	var thoigianden = $('#fromtime_night').val();
	setMinTime(thoigianden,'#totime_night','#overnight');
});
$('#totime_hour').on('change',function(){
	var thoigiantra = $('#totime_hour').val();
	setMaxTime(thoigiantra,'#fromtime_hour','#hour');
});
$('#totime_night').on('change',function(){
	var thoigiantra = $('#totime_night').val();
	setMaxTime(thoigiantra,'#fromtime_night','#overnight');
});
$('#hour').on('change',function(){
	$('#fromtime_hour').val('');
	$('#totime_hour').val('');

	var type = $('#hour').val();
	if(type == 1){
		var date = new Date();
		date.setHours(12);
		date.setMinutes(01);
		date.setSeconds(00);
		$('#totime_hour').datetimepicker({
			minTime : false,
			maxTime : date,
		});
        
	}else{
		$('#totime_hour').datetimepicker({
			minTime : false,
			maxTime : false,
		});
	}
    $('#fromtime_hour').datetimepicker({
        minTime : false,
        maxTime : false,
    });
});
$('#overnight').on('change',function(){
	$('#fromtime_night').val('');
	$('#totime_night').val('');

	var type = $('#overnight').val();
	if(type == 1){
		var date = new Date();
		date.setHours(12);
		date.setMinutes(01);
		date.setSeconds(00);
		$('#totime_night').datetimepicker({
			minTime : false,
		   	maxTime : date,
		});
	}else{
		$('#totime_night').datetimepicker({
		   	minTime : false,
		   	maxTime : false,
		});
	}
    $('#fromtime_night').datetimepicker({
        minTime : false,
        maxTime : false,
    });
});

var map;
check_place = 1; //Nếu = 0 thì không tìm thấy địa chỉ không cho lưu.
map = new google.maps.Map(document.getElementById('map-canvas'), {
  center: {lat: 21.0031177, lng: 105.82014079999999},
  zoom: 15
});
var marker = new google.maps.Marker({
    position : {lat: 21.0031177, lng: 105.82014079999999},
    // draggable : true,
    map:map,
});
//Check address when change input address
$('#address').on('input',function(){
    check_place = -1;
    $('#address_validate').empty();
});

var input = document.getElementById('address');
var searchBox = new google.maps.places.SearchBox(input);
google.maps.event.addListener(searchBox,'places_changed',function(){
    $('#address_validate').empty();
    var places = searchBox.getPlaces();
    if(places[0].geometry != null){
        var bounds = new google.maps.LatLngBounds();
        bounds.extend(places[0].geometry.location);
        console.log(places[0].geometry.location.lat()+":"+places[0].geometry.location.lng());
        marker.setPosition(places[0].geometry.location);
        map.fitBounds(bounds);
        map.setZoom(15);
        check_place = 1;
    }else{
        check_place = 0;
    }
});

google.maps.event.addListener(marker,'position_changed',function(){
    $('#address_validate').empty();
    var lat = marker.position.lat();
    var lng = marker.position.lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
});


//Form validate
$('#register-form').validate({
    ignore: [],
    rules: {
        name : "required",
        phone : "required",
        singleroom_number : "required",
        doubleroom_number : "required",
        otherroom_number  : "required",

        'singleroom_price[0]' : "required",
        'doubleroom_price[0]' : "required",
        'otherroom_price[0]' : "required",
        
        'singleroom_price[1]' : "required",
        'doubleroom_price[1]' : "required",
        'otherroom_price[1]' : "required",


        'singleroom_price[2]' : "required",
        'doubleroom_price[2]' : "required",
        'otherroom_price[2]' : "required",


        'singleroom_price[3]' : "required",
        'doubleroom_price[3]' : "required",
        'otherroom_price[3]' : "required",

        fromtime_hour : "required",
        fromtime_night : "required",
        totime_hour : "required",
        totime_night : "required",
    },

    messages: {
        name : "<?php echo e(Lang::get('val.message')); ?>",
        address : "<?php echo e(Lang::get('val.message')); ?>",
        room_numb : "<?php echo e(Lang::get('val.message')); ?>",
        phone : "<?php echo e(Lang::get('val.message')); ?>",
        singleroom_number : "<?php echo e(Lang::get('val.message')); ?>",
        doubleroom_number : "<?php echo e(Lang::get('val.message')); ?>",
        otherroom_number  : "<?php echo e(Lang::get('val.message')); ?>",

        'singleroom_price[0]' : "<?php echo e(Lang::get('val.message')); ?>",
        'doubleroom_price[0]' : "<?php echo e(Lang::get('val.message')); ?>",
        'otherroom_price[0]' : "<?php echo e(Lang::get('val.message')); ?>",

        'singleroom_price[1]' : "<?php echo e(Lang::get('val.message')); ?>",
        'doubleroom_price[1]' : "<?php echo e(Lang::get('val.message')); ?>",
        'otherroom_price[1]' : "<?php echo e(Lang::get('val.message')); ?>",

        'singleroom_price[2]' : "<?php echo e(Lang::get('val.message')); ?>",
        'doubleroom_price[2]' : "<?php echo e(Lang::get('val.message')); ?>",
        'otherroom_price[2]' : "<?php echo e(Lang::get('val.message')); ?>",

        'singleroom_price[3]' : "<?php echo e(Lang::get('val.message')); ?>",
        'doubleroom_price[3]' : "<?php echo e(Lang::get('val.message')); ?>",
        'otherroom_price[3]' : "<?php echo e(Lang::get('val.message')); ?>",
        
        fromtime_hour : "<?php echo e(Lang::get('val.message')); ?>",
        fromtime_night : "<?php echo e(Lang::get('val.message')); ?>",
        totime_hour : "<?php echo e(Lang::get('val.message')); ?>",
        totime_night : "<?php echo e(Lang::get('val.message')); ?>",
    }
});


Dropzone.options.dz = {
        url : '<?php echo e(route("hotel.uploadImg",["type"=>0])); ?>',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;

            this.on("removedfile", function(file) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route("hotel.deleteImg")); ?>',
                    data : {
                        id: $('#id').val(), 
                        _token: $('input[name = "_token"]').val(), 
                        name: file.serverFileName,
                        type:0,
                    }
                }).done(function(data){
                    if(data == -1){
                        var index = fileList.indexOf(file);
                        delete fileList[index];
                        var img_info_id = "img_hotel_info"+index;
                        $("#"+img_info_id).val('');
                    }else{
                        var img_info_id = "img_hotel_info"+fileList_count;
                        var hidden_data = '<input name = "img_hotel_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                // Change the name of image
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                // Add a image into list of images
                fileList[++fileList_count] = file;
                // Append a div to save information for saving
                var img_info_id = "img_hotel_info"+fileList_count;
                var hidden_data = '<input name = "img_hotel_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "<?php echo e(csrf_token()); ?>");
            });

        }//Init function
};//Dropzoen

Dropzone.options.dz1 = {
        url : '<?php echo e(route("hotel.uploadImg",["type"=>1])); ?>',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                //Kiem tra xem file anh da xoa da co tu truoc hay chua
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route("hotel.deleteImg")); ?>',
                    // data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                    data : {
                        id: $('#id').val(), 
                        _token: $('input[name = "_token"]').val(), 
                        name: file.serverFileName,
                        type:1,
                    }
                }).done(function(data){
                    if(data == -1){//file nay la file chua duoc luu truoc do
                        var index = fileList.indexOf(file);//tim vi tri file nay luu trong mang fileList
                        delete fileList[index];//Xoa file 
                        var img_info_id = "img_singleroom_info"+index;
                        $("#"+img_info_id).val('');//Xoa gia tri luu tam thoi o form di
                    }else{//Neu la file da duoc luu truoc do thi tao 1 input moi luu gia tri tam thoi
                        var img_info_id = "img_singleroom_info"+fileList_count;
                        var hidden_data = '<input name = "img_singleroom_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                //doi ten anh
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                //Them vao list anh luu
                fileList[++fileList_count] = file;
                //Them the div de luu thong tin anh
                var img_info_id = "img_singleroom_info"+fileList_count;
                var hidden_data = '<input name = "img_singleroom_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "<?php echo e(csrf_token()); ?>");
            });

        }//Init function
};//Dropzoen

Dropzone.options.dz2 = {
        url : '<?php echo e(route("hotel.uploadImg",["type"=>2])); ?>',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                //Kiem tra xem file anh da xoa da co tu truoc hay chua
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route("hotel.deleteImg")); ?>',
                    // data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                    data : {
                        id: $('#id').val(), 
                        _token: $('input[name = "_token"]').val(), 
                        name: file.serverFileName,
                        type:2,
                    }
                }).done(function(data){
                    if(data == -1){//file nay la file chua duoc luu truoc do
                        var index = fileList.indexOf(file);//tim vi tri file nay luu trong mang fileList
                        delete fileList[index];//Xoa file 
                        var img_info_id = "img_doubleroom_info"+index;
                        $("#"+img_info_id).val('');//Xoa gia tri luu tam thoi o form di
                    }else{//Neu la file da duoc luu truoc do thi tao 1 input moi luu gia tri tam thoi
                        var img_info_id = "img_doubleroom_info"+fileList_count;
                        var hidden_data = '<input name = "img_doubleroom_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                //doi ten anh
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                //Them vao list anh luu
                fileList[++fileList_count] = file;
                //Them the div de luu thong tin anh
                var img_info_id = "img_doubleroom_info"+fileList_count;
                var hidden_data = '<input name = "img_doubleroom_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "<?php echo e(csrf_token()); ?>");
            });

        }//Init function
};//Dropzoen

Dropzone.options.dz3 = {
        url : '<?php echo e(route("hotel.uploadImg",["type"=>3])); ?>',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        acceptedFiles : 'image/jpeg, images/jpg, image/png',
        init : function(){
            var fileList = new Array;
            var fileList_count = 0;
            var thisDropzone = this;
            this.on("removedfile", function(file) {
                //Kiem tra xem file anh da xoa da co tu truoc hay chua
                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(route("hotel.deleteImg")); ?>',
                    // data: {name: file.serverFileName, _token: $('input[name = "_token"]').val()},
                    data : {
                        id: $('#id').val(), 
                        _token: $('input[name = "_token"]').val(), 
                        name: file.serverFileName,
                        type:3,
                    }
                }).done(function(data){
                    if(data == -1){//file nay la file chua duoc luu truoc do
                        var index = fileList.indexOf(file);//tim vi tri file nay luu trong mang fileList
                        delete fileList[index];//Xoa file 
                        var img_info_id = "img_otherroom_info"+index;
                        $("#"+img_info_id).val('');//Xoa gia tri luu tam thoi o form di
                    }else{//Neu la file da duoc luu truoc do thi tao 1 input moi luu gia tri tam thoi
                        var img_info_id = "img_otherroom_info"+fileList_count;
                        var hidden_data = '<input name = "img_otherroom_info[]" type="hidden" value="' + (-$('#id').val()) +","+file.serverFileName+'" id="'+img_info_id+'" />';
                        $('#register-form').append(hidden_data);
                    }
                });
            } );
            this.on("success", function(file, serverFileName) {
                //doi ten anh
                var name = file.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = serverFileName;
                name.innerHTML = serverFileName;
                file.serverFileName = serverFileName;
                //Them vao list anh luu
                fileList[++fileList_count] = file;
                //Them the div de luu thong tin anh
                var img_info_id = "img_otherroom_info"+fileList_count;
                var hidden_data = '<input name = "img_otherroom_info[]" type="hidden" value="' + 0 +","+file.serverFileName+'" id="'+img_info_id+'" />';
                $('#register-form').append(hidden_data);
            } );

            this.on("sending", function(file, xhr, formData){
                formData.append("_token", "<?php echo e(csrf_token()); ?>");
            });

        }//Init function
};//Dropzoen

$("#register-form").on("submit",function(){
    if (($("input[name*='services']:checked").length)<=0) {
        var validate = '<div><label>' + "<?php echo e(Lang::get('val.message')); ?>" + '</label></div>';
        $('#services_validate').empty();
        $('#services_validate').append(validate);
        $('html, body').animate({
            scrollTop: $('#service').offset().top
        }, 0);
        return false;
    }
    if(check_place != 1){
        var message = (check_place == -1)? "<?php echo e(Lang::get('val.wrong_address')); ?>":"<?php echo e(Lang::get('val.message')); ?>";
        var validate = '<div><label>' + message + '</label></div>';
        $('#address_validate').empty();
        $('#address_validate').append(validate);
        $('html, body').animate({
            scrollTop: $('#address').offset().top
        }, 0);
        return false;
    }
    return true;
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>