<?php $__env->startSection('content'); ?>
<form class="form-horizontal form-label-left input_mask" method="post" enctype="multipart/form-data" action="hotel-create" id="register-form">
    <?php echo e(csrf_field()); ?>

    <div id="wizard" class="form_wizard wizard_horizontal">
        <ul class="wizard_steps">
            <li>
                <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                        Step 1<br />
                        <small>Step 1 description</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                        Step 2<br />
                        <small>Step 2 description</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                        Step 3<br />
                        <small>Step 3 description</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-4">
                    <span class="step_no">4</span>
                    <span class="step_descr">
                        Step 4<br />
                        <small>Step 4 description</small>
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">

        </div>
        <div id="step-2">
        </div>
        <div id="step-3">
        </div>
        <div id="step-4">
        </div>

    </div>
</form>
<?php $__env->startPush('scripts'); ?>
<!-- jQuery Smart Wizard -->
<script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>