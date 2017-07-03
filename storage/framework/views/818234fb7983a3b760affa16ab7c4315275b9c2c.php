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

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo e($hotel_name); ?> <small></small></h2>
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
                                <td>
                                <a href="<?php echo e(route('hotel.confirm.delete',$value->id)); ?>" data-toggle="modal" data-target = "#details">
                                        <i class="glyphicon glyphicon-remove"></i> <?php echo app('translator')->getFromJson('general.xoa'); ?>
                                    </a>
                                </td>
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
    var dt = $('#datatables').DataTable({
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>