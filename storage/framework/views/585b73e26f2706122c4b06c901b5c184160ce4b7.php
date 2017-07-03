<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo app('translator')->getFromJson("auth/general.dangky"); ?> | <?php echo app('translator')->getFromJson("general.tieude"); ?> </title>
    <!-- Bootstrap -->
    <link href="<?php echo e(asset("css/bootstrap.min.css")); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset("css/font-awesome.min.css")); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset("css/gentelella.min.css")); ?>" rel="stylesheet">

</head>

<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="<?php echo e(url('/register')); ?>">
                    <?php echo csrf_field(); ?>


                    <h1><?php echo app('translator')->getFromJson('auth/general.dangky'); ?></h1>

                    <div class="form-group has-feedback">
                        <input type="text" name="phone" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth/general.dienthoai'); ?>">
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <select class="form-control">
                            <option>-- Chọn --</option>
                            <option>Chủ nhà nghỉ</option>
                            <option>Khách hàng</option>
                        </select>
                    </div>
                    <div>
                    <button class="btn btn-default submit" ><?php echo app('translator')->getFromJson('general.xacnhan'); ?></button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link"><?php echo app('translator')->getFromJson('auth/general.dacotk'); ?>
                            <a href="<?php echo e(url('/login')); ?>" class="to_register"> <?php echo app('translator')->getFromJson('auth/general.dangnhap'); ?> </a>
                        </p>
                    </div> 
                </form>
            </section>
        </div>
    </div>
</body>
</html>