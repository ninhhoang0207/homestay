
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <h4 class="modal-title"><?php echo app('translator')->getFromJson('general.xacnhan'); ?></h4>
</div>
<div class="modal-body">
  <p><?php echo app('translator')->getFromJson('general.thongbao_xoa'); ?></p>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('general.dong'); ?></button>
  <a href="<?php echo e($confirm_route); ?>" type="button" class="btn btn-danger"><?php echo app('translator')->getFromJson('general.xoa'); ?></a>
</div>
