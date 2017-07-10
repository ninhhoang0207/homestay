<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('hotel/general.dondatphong.tieude'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="../build/css/custom.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo app('translator')->getFromJson('hotel/general.dondatphong.tieude'); ?><small></small></h3>
        </div>

    </div>

    <div class="clearfix"></div>
    <input type="hidden" name="id" id="id_hotel" value="<?php echo e($id); ?>">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo e($hotel_name); ?> <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_title">
                    <h2 align="center">Đơn đặt phòng mới <small>
                    <span class="<?php echo e($count_new_booking>0?'badge bg-green':"badge"); ?>" style="color: white" id="count_new_booking"><?php echo e($count_new_booking); ?>

                    </span></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('hotel/general.id'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.ho'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.ten'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.sdt'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.trangthai'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigianden'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigiantra'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigiandangky'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.sophong'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.loaiphong'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.songuoi'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.giatien'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.mauudai'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_new_booking as $key => $value): ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($value->ho); ?></td>
                                <td><?php echo e($value->ten); ?></td>
                                <td><?php echo e($value->sdt); ?></td>
                                <td><?php echo e($status[$value->trangthai]); ?></td>
                                <td><?php echo e($value->thoigianden); ?></td>
                                <td><?php echo e($value->thoigiantra); ?></td>
                                <td><?php echo e($value->thoigiandangky); ?></td>
                                <td><?php echo e($value->sophong); ?></td>
                                <td><?php echo e($value->loaiphong); ?></td>
                                <td><?php echo e($value->songuoi); ?></td>
                                <td><?php echo e($value->giatien); ?></td>
                                <td><?php echo e($value->mauudai); ?></td>
                                <td><?php echo e($value->id); ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="x_title">
                    <h2 align="center">Lịch sử đơn đặt phòng </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('hotel/general.id'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.ho'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.ten'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.sdt'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.trangthai'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigianden'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigiantra'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.thoigiandangky'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.sophong'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.loaiphong'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.songuoi'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.giatien'); ?></th>
                                <th><?php echo app('translator')->getFromJson('hotel/general.dondatphong.mauudai'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($value->ho); ?></td>
                                <td><?php echo e($value->ten); ?></td>
                                <td><?php echo e($value->sdt); ?></td>
                                <td><?php echo e($status[$value->trangthai]); ?></td>
                                <td><?php echo e($value->thoigianden); ?></td>
                                <td><?php echo e($value->thoigiantra); ?></td>
                                <td><?php echo e($value->thoigiandangky); ?></td>
                                <td><?php echo e($value->sophong); ?></td>
                                <td><?php echo e($value->loaiphong); ?></td>
                                <td><?php echo e($value->songuoi); ?></td>
                                <td><?php echo e($value->giatien); ?></td>
                                <td><?php echo e($value->mauudai); ?></td>
                                <td><?php echo e($value->id); ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>

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
    var tb_new_booking = $('#datatable').DataTable({
        "columnDefs": [ {
            "targets": 13,
            "render": function ( data, type, full, meta ) {
                return '<a href="<?php echo e(route("bookroom.confirm.delete")); ?>/'+data+'" class="delete-modal"><i class="glyphicon glyphicon-remove"></i> <?php echo app('translator')->getFromJson("general.xoa"); ?></a>';
            }
        } ]
    });
    var tb_overtime_booking = $('#datatable1').DataTable({
        "columnDefs": [ {
            "targets": 13,
            "render": function ( data, type, full, meta ) {
                return '<a href="<?php echo e(route("bookroom.confirm.delete")); ?>/'+data+'"class="delete-modal"><i class="glyphicon glyphicon-remove"></i> <?php echo app('translator')->getFromJson("general.xoa"); ?></a>';
            }
        } ]
    });

    var checking = setInterval(checkNewBooking, 10000);

    function checkNewBooking() {
        var id = $('#id_hotel').val(); 
        $.ajax({
            url : "<?php echo e(route('bookroom.checkNewBooking')); ?>",
            data : {id:id},
            type : "GET",
        }).done(function(data) {
            $('#count_new_booking').text(data.count_new_booking);
            tb_new_booking.clear().draw();
            if (data.count_new_booking > 0) {
                for (var i = data.new_booking.length - 1; i >= 0; i--) {
                    var counter = $('#datatable tr:last td:first').text();
                    counter = parseInt(counter);
                    tb_new_booking.row.add([
                        data.new_booking.length - i,
                        data.new_booking[i].ho,
                        data.new_booking[i].ten,
                        data.new_booking[i].sdt,
                        "<?php echo e($status['choxacnhan']); ?>",
                        data.new_booking[i].thoigianden,
                        data.new_booking[i].thoigiantra,
                        data.new_booking[i].thoigiandangky,
                        data.new_booking[i].sophong,
                        data.new_booking[i].loaiphong,
                        data.new_booking[i].songuoi,
                        data.new_booking[i].giatien,
                        data.new_booking[i].uudai==null?'': data.new_booking[i].uudai,
                        data.new_booking[i].id,
                        ]).draw(false);
                }
                // $('#datatable tbody').append(data.new_booking);
                // $('#datatable').DataTable().draw(true);
            }

            if(data.count_new_booking == 0){
                $('#count_new_booking').removeClass("badge bg-green");
            } else {
                 $('#count_new_booking').addClass("badge bg-green");
            }

            if (data.overtime_booking.length > 0) {
                    var counter = $('#datatable1 tr:last td:first').text();
                    counter = parseInt(counter);
                for (var i = data.overtime_booking.length - 1; i >= 0; i--) {
                    tb_overtime_booking.row.add([
                        ++counter,
                        data.overtime_booking[i].ho,
                        data.overtime_booking[i].ten,
                        data.overtime_booking[i].sdt,
                        data.overtime_booking[i].trangthai,
                        data.overtime_booking[i].thoigianden,
                        data.overtime_booking[i].thoigiantra,
                        data.overtime_booking[i].thoigiandangky,
                        data.overtime_booking[i].sophong,
                        data.overtime_booking[i].loaiphong,
                        data.overtime_booking[i].songuoi,
                        data.overtime_booking[i].giatien,
                        data.overtime_booking[i].uudai==null?'': data.overtime_booking[i].uudai,
                        data.overtime_booking[i].id,
                        ]).draw(false);
                }
            }
        });    
    }
$('.delete-modal').on('click',function(e) {
    e.preventDefault();
    $('#details').modal('toggle');
    var url = $(this).attr('href');
    $.ajax({
        url : url
    }).done(function(data) {
        $('.modal-content').empty();
        $('.modal-content').append(data);
        $('#details').modal('show');
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>