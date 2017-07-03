<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo app('translator')->getFromJson("general.tieude"); ?></title>

    <?php echo $__env->yieldContent('header'); ?>
    <!-- Bootstrap -->
    <link href="<?php echo e(asset("css/bootstrap.min.css")); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset("css/font-awesome.min.css")); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!-- <link href="<?php echo e(asset("css/gentelella.min.css")); ?>" rel="stylesheet"> -->

    <link href="<?php echo e(asset("css/jquery.datetimepicker.min.css")); ?>" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href= "<?php echo e(asset('fontend/css/style.css')); ?>">
    <link href="<?php echo e(asset("css/jquery.datetimepicker.min.css")); ?>" rel="stylesheet">

    <?php echo $__env->yieldPushContent('stylesheets'); ?>

</head>

<body>
    <?php echo $__env->make('includes/fontend_topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes/fontend_search', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container body">
        <div class="main_container">
        <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
<script type="text/javascript">
(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="//static.zotabox.com/1/2/12d0042224d138223d645298fd7b3215/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));
</script>
</body>

<!-- jQuery -->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo e(asset("js/bootstrap.min.js")); ?>"></script>
<!-- Custom Theme Scripts -->
<!-- <script src="<?php echo e(asset("js/gentelella.min.js")); ?>"></script> -->

<script src="<?php echo e(asset('js/jssor.slider.mini.js')); ?>" type="text/javascript"></script>

<script src ="<?php echo e(asset('js/jquery.datetimepicker.js')); ?>" type="text/javascript" ></script>

<script src="<?php echo e(asset('js/jquery.validate.js')); ?>"></script>

<script src="<?php echo e(asset('vendors/moment/moment.js')); ?>"></script>

<script src="<?php echo e(asset('fontend/js/jquery-latest.js')); ?>"></script>
<script src="<?php echo e(asset('fontend/js/style1.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('fontend/js/jssor.slider-23.0.0.mini.js')); ?>"></script> -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>