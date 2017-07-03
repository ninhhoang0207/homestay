<?php $__env->startSection('content'); ?>

<header id="header" >
	<div class="top-title">
		<div class="row">
			<div class="">
				
			</div>
		</div>
	</div>
	<div class="header-w">
		<nav class="navbar navbar-default">
			<div class="container-fluid col-xs-10 col-xs-offset-1">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
						<img src="images/img.png" alt="anh1">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class=""><a href="#">Trang chủ <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Nhà nghỉ </a></li>
						<li><a href="#">Ưu đãi </a></li>
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thông tin <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Đánh giá</a></li>
								<li><a href="#">Nhà nghỉ VIP</a></li>
								<li><a href="#">Thông tin về du lịch</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Muôn thứ</a></li>
							</ul>
						</li>
						<li><a href="#">Khuyến mãi lớn</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right drop-top">
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Tài khoản <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Đăng ký</a></li>
								<li><a href="#">Đăng nhập</a></li>
								<li><a href="#">Thông tin cá nhân</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Khác</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div><!--End _ TOp -->
</header><!-- /header -->
<form method="POST" action="<?php echo e(route('bookroom')); ?>" class="form-group" id="dangky_phong">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="col-sm-8 form-book-room">
						<div class="col-sm-12">
							<div class="col-sm-6">
								<h4>Nhập thông tin để đặt phòng</h4>
							</div>
							<div class="col-sm-6">
								<a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Đăng nhập để nhận ưu đãi</a>
							</div>
						</div><!--End col-sm-12-->
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="nn_id" value="60">
						<div class="col-sm-12">
							<div class="col-sm-6">
								<h5>Họ: *</h5>
								<input class="form-control" id="ho" name="ho" placeholder="">
							</div>
							<div class="col-sm-6">
								<h5>Tên: *</h5>
								<input class="form-control" id="ten" name="ten" placeholder="">
							</div>
						</div><!--End col-sm-12-->
						
						<div class="col-sm-12">
							<div class="col-sm-4">
								<h5>Ngày/Giờ tới nhận phòng</h5>
								<input type="text" value="" name="thoigianden" id="thoigianden" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<h5>Ngày/Giờ trả phòng</h5>
								<input type="text" value="" id="thoigiantra" name="thoigiantra" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<h5>Thời gian sử dụng</h5>
								<input type="text" readonly="" value="" id="thoigiansudung" name="thoigiansudung" class="form-control" placeholder="" />
							</div>
						</div><!--End col-sm-12-->

						<div class="col-sm-12">
							<div class="col-sm-4">
								<h5>Số người</h5>
								<input type="number" name="songuoi" min="0" class="form-control">
							</div>
							<div class="col-sm-4">
								<h5>Số phòng</h5>
								<input type="number" value="" name="sophong" min="0" class="form-control" placeholder="" />
							</div>
							<div class="col-sm-4">
								<h5>Loại phòng</h5>
								<select name="loaiphong" class="form-control form-select1 form-box presentation">
									<option disabled="disabled" selected=""> -- Lựa chọn --</option>
									<option value="phongdon">Phòng đơn</option>
									<option value="phongdoi">Phòng đôi</option>
									<option value="phongkhac">Phòng Vip</option>
								</select>
							</div>
						</div><!--End col-sm-12-->

						<div class="col-sm-12">
							<div class="col-sm-8">
								<h5>Số điện thoại: *</h5>
								<input type="text" name="sdt" class="form-control" />
							</div>
							<div class="col-sm-4">
								<h5>Kiểm tra: *</h5>
								<button class="btn btn-default" type="button">Check</button>
							</div>
						</div><!--End col-sm-12-->

						<div class="col-sm-12">
							<div class="col-sm-6">
								<h5>Mã ưu đãi? Nhập ngay!</h5>
								<input name="mauudai" type="text" value="" class="form-control" />
							</div>
							<div class="col-sm-6">
								<h5>Áp dụng: *</h5>
								<button class="btn btn-default" >Áp dụng</button>
							</div>
						</div><!--End col-sm-12-->

						<div class="col-sm-12">
							<hr>
							<div class="col-sm-2 col-sm-offset-5">
								<button class="btn btn-warning" type="submit">Đặt phòng</button>
							</div>
						</div>

						<div class="col-sm-4 form-info">
							Làm sau
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.validate.js')); ?>"></script>
<script type="text/javascript">
	$('#dangky_phong').validate({
		rules : {
			ho : "required",
			ten : "required",
			thoigianden : "required",
			thoigiantra : "required",
			songuoi : "required",
			sophong : "required",
			sdt : "required",
			loaiphong : "required",
		},

		messages : {
			ho : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			ten : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			thoigianden : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			thoigiantra : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			songuoi : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			sophong : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			sdt : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
			loaiphong : "<?php echo e(Lang::get('bookroom/validation.messages')); ?>",
		}
	});
</script>
<script>
	$('#thoigianden').datetimepicker({
		format : 'd/m/Y H',
		minDate : new Date('d/m/Y H'),
	});
	$('#thoigiantra').datetimepicker({
		format : 'd/m/Y H',
		minDate : new Date('d/m/Y H'),
	});

	$('#thoigianden').on('change', function(){
		var thoigianden = $('#thoigianden').val();
		var thoigiantra = $('#thoigiantra').val();
		var giatien = [0,0,0]; // 0 - gio su dung, 1 - thue qua dem, 2 - ngay
		if (thoigiantra != ''){
			var thoigianden_theogio = "<?php echo e($data->thoigianden_theogio); ?>";
			thoigianden_theogio = parseInt(thoigianden_theogio.split(':')[0]);
			var thoigianden_quadem = "<?php echo e($data->thoigianden_quadem); ?>";
			thoigianden_quadem = parseInt(thoigianden_quadem.split(':')[0]);
			var thoigiantra_theogio = "<?php echo e($data->thoigiantra_theogio); ?>";
			thoigiantra_theogio = parseInt(thoigiantra_theogio.split(':')[0]);
			var thoigiantra_quadem = "<?php echo e($data->thoigiantra_quadem); ?>";
			thoigiantra_quadem = parseInt(thoigiantra_quadem.split(':')[0]);
			var loai_thoigiantra_theogio = "<?php echo e($data->loai_thoigiantra_theogio); ?>";
			var loai_thoigiantra_quadem = "<?php echo e($data->loai_thoigiantra_quadem); ?>";
			loai_thoigiantra_theogio = parseInt(loai_thoigiantra_theogio);
			loai_thoigiantra_quadem = parseInt(loai_thoigiantra_quadem);
		
			thoigiantra_theogio += 24*loai_thoigiantra_theogio;
			thoigiantra_quadem += 24*loai_thoigiantra_quadem;
			//Tinh thoi gian den va thoi gian tra phong
			thoigianden = thoigianden.split('/');
			var ngayden = parseInt(thoigianden[0]);
			var gioden = parseInt(thoigianden[2].split(' ')[1]);

			thoigiantra = thoigiantra.split('/');
			var ngaytra = parseInt(thoigiantra[0]);
			var giotra = parseInt(thoigiantra[2].split(' ')[1]);
			giotra = (ngaytra-ngayden)*24 + giotra;
			while(giotra-gioden > 0){
				if(giotra-gioden >=24){
					giotra -= 24;
					giatien[2]++;
					gioden = 12;
				}else{
					if(gioden >= thoigianden_theogio && giotra <= thoigiantra_theogio){
						giatien[0] += giotra-gioden;
					}else if (gioden >= thoigianden_quadem && giotra <= thoigiantra_quadem){
						giatien[1]++;
					}else{
						giatien[2]++;
					}
					break;
				}
			}
			var giatien = "So gio: "+giatien[0]+", Qua dem: "+giatien[1]+" ,ngay: "+giatien[2];
			console.log("So gio: "+giatien[0]+", Qua dem: "+giatien[1]+" ,ngay: "+giatien[2]);
			$('#thoigiansudung').val(giatien);
		}
	});

	$('#thoigiantra').on('change', function(){
		var thoigianden = $('#thoigianden').val();
		var thoigiantra = $('#thoigiantra').val();
		var giatien = [0,0,0]; // 0 - gio su dung, 1 - thue qua dem, 2 - ngay
		if (thoigianden != ''){
			thoigianden_theogio = 6;
			thoigianden_quadem = 22;
			thoigiantra_theogio = 23; 
			thoigiantra_quadem = 12;
			loai_thoigiantra_theogio = 0;
			loai_thoigiantra_quadem = 1;
			thoigiantra_theogio += 24*loai_thoigiantra_theogio;
			thoigiantra_quadem += 24*loai_thoigiantra_quadem;
			//Tinh thoi gian den va thoi gian tra phong
			thoigianden = thoigianden.split('/');
			var ngayden = parseInt(thoigianden[0]);
			var gioden = parseInt(thoigianden[2].split(' ')[1]);

			thoigiantra = thoigiantra.split('/');
			var ngaytra = parseInt(thoigiantra[0]);
			var giotra = parseInt(thoigiantra[2].split(' ')[1]);
			giotra = (ngaytra-ngayden)*24 + giotra;
			while(giotra-gioden > 0){
				if(giotra-gioden >=24){
					giotra -= 24;
					giatien[2]++;
					gioden = 12;
				}else{
					if(gioden >= thoigianden_theogio && giotra <= thoigiantra_theogio){
						giatien[0] += giotra-gioden;
					}else if (gioden >= thoigianden_quadem && giotra <= thoigiantra_quadem){
						giatien[1]++;
					}else{
						giatien[2]++;
					}
					break;
				}
			}
			var giatien = "So gio: "+giatien[0]+", Qua dem: "+giatien[1]+" ,ngay: "+giatien[2];
			console.log("So gio: "+giatien[0]+", Qua dem: "+giatien[1]+" ,ngay: "+giatien[2]);
			$('#thoigiansudung').val(giatien);

		}
	});
</script>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>