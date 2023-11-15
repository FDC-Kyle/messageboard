<h1>Log in</h1>
<?php

echo $this->Form->create('User');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Login');


?>

<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>" class="button">Register?</a>