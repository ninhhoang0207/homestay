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
    <!-- NProgress -->
    <!-- <link href="<?php echo e(asset("css/nprogress.css")); ?>" rel="stylesheet"> -->
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
                
                <div class="form-group has-feedback<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth/general.ten'); ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                  <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group has-feedback<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->getFromJson('auth/general.email'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    
                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group has-feedback<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                    <input type="password" class="form-control" name="password" placeholder="<?php echo app('translator')->getFromJson('auth/general.matkhau'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                  <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                    <?php endif; ?>
                </div>
                
                <div class="form-group has-feedback<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth/general.xacnhan_mk'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                    <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block">
                  <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </span>
                    <?php endif; ?>
                </div>

                  <div class="form-group has-feedback">
                    <input type="text" name="phone" class="form-control" placeholder="<?php echo app('translator')->getFromJson('auth/general.dienthoai'); ?>">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    
                    <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block">
                  <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                </span>
                    <?php endif; ?>
                </div>

                <div>
                    <button class="btn btn-default submit" ><?php echo app('translator')->getFromJson('auth/general.dangky'); ?></button>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="separator">
                    <p class="change_link"><?php echo app('translator')->getFromJson('auth/general.dacotk'); ?>
                        <a href="<?php echo e(url('/login')); ?>" class="to_register"> <?php echo app('translator')->getFromJson('auth/general.dangnhap'); ?> </a>
                    </p>
                    
                  <!--   <div class="clearfix"></div>
                    <br />
                    
                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                    -->
                </div> 
            </form>
        </section>
    </div>
</div>
</body>
</html>