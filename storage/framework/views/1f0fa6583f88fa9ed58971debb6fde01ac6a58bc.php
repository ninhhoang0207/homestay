<div class="form-group" style="padding-top: 20px">
<?php if(session('success')): ?>
		<div class="alert alert-success">
			<label><?php echo e(session('success')); ?></label>
		</div>
<?php endif; ?>

<?php if(session('error')): ?>
		<div class="alert alert-danger">
			<label><?php echo e(session('error')); ?></label>
		</div>
<?php endif; ?>
</div>