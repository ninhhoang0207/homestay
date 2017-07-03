<?php $__env->startSection('title'); ?>
<?php echo app('translator')->getFromJson('user/general.thong-tin-nguoi-dung'); ?>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2><?php echo app('translator')->getFromJson('user/general.thong-tin-nguoi-dung'); ?><small></small></h2>
        
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left input_mask" method="post" action="<?php echo e(route('userUpdate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php echo app('translator')->getFromJson('user/general.ho'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo app('translator')->getFromJson('user/general.ho'); ?>" value="<?php echo e($user->last_name); ?>">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
              </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php echo app('translator')->getFromJson('user/general.ten'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="<?php echo app('translator')->getFromJson('user/general.ten'); ?>" value="<?php echo e($user->first_name); ?>">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
              </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php echo app('translator')->getFromJson('user/general.email'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="email" name = "email" placeholder="<?php echo app('translator')->getFromJson('user/general.email'); ?>" value="<?php echo e($user->email); ?>">
                            <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php echo app('translator')->getFromJson('user/general.sdt'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="phone" name="phone" placeholder="<?php echo app('translator')->getFromJson('user/general.sdt'); ?>" value="<?php echo e($user->phone); ?>">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
             
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3"><?php echo app('translator')->getFromJson('user/general.diachi'); ?></label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control has-feedback-right" id="address" name="address" placeholder="<?php echo app('translator')->getFromJson('user/general.diachi'); ?>" value="<?php echo e($user->address); ?>">
                            <span class="fa fa-map-marker form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
                        <button type="button" class="btn btn-primary"><?php echo app('translator')->getFromJson('general.huy'); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('general.capnhat'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>