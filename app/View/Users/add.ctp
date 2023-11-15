<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Registration'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type'=>'password'));
		// echo $this->Form->input('full_name');
		// echo $this->Form->input('gender');
		// echo $this->Form->input('birthdate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Register')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Already have an account?'), array('action' => 'login')); ?></li>
		
		<!-- <li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index1')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
