<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('user/general.tieude'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>
 <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php echo app('translator')->getFromJson('user/general.tieude'); ?><small></small></h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo app('translator')->getFromJson('user/general.danhmuc'); ?> <small></small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th><?php echo app('translator')->getFromJson('user/general.id'); ?></th>
                          <th><?php echo app('translator')->getFromJson('user/general.ten'); ?></th>
                          <th><?php echo app('translator')->getFromJson('user/general.sdt'); ?></th>
                          <th><?php echo app('translator')->getFromJson('user/general.ngay_dk'); ?></th>
                          <th><?php echo app('translator')->getFromJson('user/general.chucnang'); ?></th>

                        </tr>
                      </thead>

                      <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::getUser()->role == 'admin'): ?>
                    <tr>
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($value->name); ?></td>
                        <td><?php echo e($value->phone); ?></td>
                        <td><?php echo e(Carbon\Carbon::parse($value->created_at)->format('d/m/Y')); ?></td>
                        <td>
                            <a href=<?php echo e(" user-edit/".$value->id); ?>>
                                <i class="glyphicon glyphicon-edit"></i>  <?php echo app('translator')->getFromJson('general.sua'); ?>
                            </a>
                            <a href=<?php echo e("user-del/".$value->id); ?>>
                                <i class="glyphicon glyphicon-remove"></i>  <?php echo app('translator')->getFromJson('general.xoa'); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
<?php $__env->startPush('scripts'); ?>
    <script src="../build/js/custom.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>