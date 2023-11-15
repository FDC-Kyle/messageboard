<div class="users form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-1">
                            <div class="d-flex justify-content-start">
                            <?php
                                echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'change_pass')));
                                
                                echo $this->Form->input('password', array('type' => 'password'));
                                echo $this->Form->submit('Submit');
                                echo $this->Form->end();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Back To Profile'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?></li>
    </ul>
</div>
