<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo e(url('/')); ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo app('translator')->getFromJson('sidebar/title.hethong'); ?></span></a>
        </div>
        
        <div class="clearfix"></div>
        
        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="<?php echo e(Gravatar::src(Auth::user()->email)); ?>" alt="Avatar of <?php echo e(Auth::user()->name); ?>" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span><?php echo app('translator')->getFromJson('sidebar/title.xinchao'); ?>,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        
        <br />
        
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <div class="clearfix"></div>
                <ul class="nav side-menu">
                    <?php if(Auth::getUser()->role == 'admin'): ?>
                    <li <?php echo e((Request::is('hotel'))?"class=active":""); ?>> 
                        <a href="<?php echo e(route('userManager')); ?>"><i class="fa fa-users"></i><?php echo app('translator')->getFromJson('sidebar/title.quan-ly-nguoi-dung'); ?></a>
                    </li>
                    <?php endif; ?>
                    <li <?php echo e((Request::is('hotel'))?"class=active":""); ?>> 
                        <a href="<?php echo e(route('hotel')); ?>"><i class="fa fa-building-o"></i><?php echo app('translator')->getFromJson('sidebar/title.quan-ly-nha-nghi'); ?></a>
                    </li>
                </ul>
            </div>
        
        </div>
        <!-- /sidebar menu -->
        
        <!-- /menu footer buttons -->
   <!--      <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo e(url('/logout')); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div> -->
        <!-- /menu footer buttons -->
    </div>
</div>