<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Change Password'); ?></legend>
	<?php
		echo $this->Form->input('password', array('label'=>'New password'));
		echo $this->Form->input('password_confirmation', array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('change password')); ?>