<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Registration'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Register')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Already have an account?'), array('action' => 'login')); ?></li>
	</ul>
</div>
