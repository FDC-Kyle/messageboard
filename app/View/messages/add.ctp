

<!-- app/View/Messages/add.ctp -->

<div class="users index">
    <h2><?php echo __('Create Message'); ?></h2>
<form id="messageForm">
   
    <?php
    
echo $this->Form->input('user_id', array(
    'class' => 'dropdown',
    'style' => 'width: 220px;' // This should match the class in your script
));

    echo $this->Form->input('message', array('type'=>'text'));
    echo $this->Form->input('recipient_id', array(
        'type' => 'hidden',
        'value' => isset($loggedInUserId) ? $loggedInUserId : ''
    ));
    echo $this->Form->button(__('Send Message'), array('type' => 'button', 'onclick' => 'sendMessage()'));
    ?>
</form>

<div id="response"></div>


</div>
<div class="actions">
	    <h3><?php echo __('Actions'); ?></h3>
            <ul>
                <?php if ($isLoggedIn): ?>
                <p>Welcome, <?php echo h($userSpecificData['User']['username']); ?>!</p>
                
                <li>
                <?php
                    echo $this->HTML->link('Message Board', array('controller'=>'messages', 'action'=>'index1'));
                ?>
                </li>
                <li>
                <?php
                    echo $this->HTML->link('Create Message', array('controller'=>'messages', 'action'=>'add'));
                ?>
                </li>
                <li>
                <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'edit', $userSpecificData['User']['id'])); ?>
                <?php else: ?>
                <p>You are not logged in.</p>
                <?php endif; ?>
                </li>
                <li>
                <?php
                    echo $this->HTML->link('Logout', array('controller'=>'users', 'action'=>'logout'));
                ?>
                </li>
           
            </ul>
            </div>
    

