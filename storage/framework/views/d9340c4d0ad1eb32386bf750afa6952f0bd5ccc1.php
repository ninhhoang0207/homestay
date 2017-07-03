<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> <?php echo $__env->yieldContent('title'); ?> | <?php echo app('translator')->getFromJson("general.tieude"); ?></title>

        <?php echo $__env->yieldContent('header'); ?>
        <!-- Bootstrap -->
        <link href="<?php echo e(asset("css/bootstrap.min.css")); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo e(asset("css/font-awesome.min.css")); ?>" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="<?php echo e(asset("css/gentelella.min.css")); ?>" rel="stylesheet">

       <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <?php echo $__env->yieldPushContent('stylesheets'); ?>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                <?php echo $__env->make('includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('includes/topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="right_col" role="main" style="min-height: 3742px;">
                    <?php echo $__env->make('includes/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo e(asset("js/bootstrap.min.js")); ?>"></script>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo e(asset("js/gentelella.min.js")); ?>"></script>

        <script src="<?php echo e(asset("vendors/moment/moment.js")); ?>"></script>


        <?php echo $__env->yieldPushContent('scripts'); ?>

    </body>
</html>