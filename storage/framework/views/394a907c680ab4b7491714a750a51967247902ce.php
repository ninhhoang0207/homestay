<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('hotel/general.tieude'); ?>
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
                <h3><?php echo app('translator')->getFromJson('hotel/general.tieude'); ?><small></small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo app('translator')->getFromJson('hotel/general.danhmuc'); ?> <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo app('translator')->getFromJson('hotel/general.id'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.ten'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.diachi'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.sdt'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.ngay_dk'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.thoihan_dk'); ?></th>
                          <th><?php echo app('translator')->getFromJson('hotel/general.chucnang'); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value): ?>
                          <?php if($value->nguoi_dk_id == Auth::getUser()->id || Auth::getUser()->role == 'admin'): ?>
                            <tr>
                            <td><?php echo e($key+1); ?></td>
                            <td><?php echo e($value->ten); ?></td>
                            <td><?php echo e($value->diachi); ?></td>
                            <td><?php echo e($value->sdt); ?></td>
                            <td><?php echo e($value->thoigian_dk); ?></td>
                            <td><?php echo e($value->thoihan_dk); ?></td>
                            <td width="15%">
                                <a href="<?php echo e(route('hotel.edit',$value->id)); ?>" >
                                    <i class="glyphicon glyphicon-edit"></i> <?php echo app('translator')->getFromJson('general.sua'); ?>
                                </a>
                                <a href="<?php echo e(route('hotel.confirm.delete',$value->id)); ?>" data-toggle="modal" data-target = "#delete_confirm">
                                    <i class="glyphicon glyphicon-remove"></i> <?php echo app('translator')->getFromJson('general.xoa'); ?>
                                </a>
                                <br>
                                <a href="<?php echo e(route('hotel.bookroomList',$value->id)); ?>" >
                                    <i class="glyphicon glyphicon-th-list"></i> <?php echo app('translator')->getFromJson('hotel/general.dondatphong.tieude'); ?>
                                </a>
                            </td>
                            </tr>
                          <?php endif; ?>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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


<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>