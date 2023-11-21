<div class="users index">
    <h2><?php echo __('Message Board'); ?></h2>

    <form id="messageForm1">
        <?php
        $id1 = $this->request->params['pass'][0] ?? null;
    echo $this->Form->input('user_id', array(
        'type' => 'hidden',
     
        'value' => $id1,
        
    ));
    echo $this->Form->input('message', array('type'=>'text'));
    echo $this->Form->input('recipient_id', array(
        'type' => 'hidden',
        'value' => isset($loggedInUserId) ? $loggedInUserId : ''
    ));
    echo $this->Form->button(__('Send Message'), array('type' => 'button', 'onclick' => 'sendMessage1()'));
    ?>
    </form>

    <div id="response1"></div>
    <div style="float:right;" class="srch_bar">
    <form class="search-form">
        <div class="stylish-input-group">
            <input type="text" class="search-bar" placeholder="Search">
            <span class="input-group-addon">
                <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </span>
        </div>
    </form>
</div>
    <div class="inbox_msg">
        <div id="chat-container">


            <?php foreach ($messages as $message): ?>

            <?php 
                // Check if the message is from the logged-in user
                $isCurrentUserMessage = ($message['Message']['recipient_id'] != $loggedInUserId);
            
                  ?>
            <?php if ($isCurrentUserMessage): ?>
            <div class="incoming_msg_img">
                <?php
                            $imageUrl = !empty($message['Recipient']['image']) ? '/img/upload/' . $message['Recipient']['image'] : '/img/upload/default-placeholder-image.jpg';

                            // Assuming you want to link to a user profile page, adjust the URL accordingly
                         
                            
                            
                            echo 
                            $this->Html->link(
                            $this->Html->image($imageUrl), array('controller'=>'users', 'action'=>'profile', $message['Message']['recipient_id']),array('escape' => false)
                            );
                           
                                
                            
                            ?>
                            
            </div>
            <div class="received_msg">
                <div class="received_withd_msg">
                    <p class="message-content"><?php echo $message['Message']['message']; ?></p>
                    <span class="time_date"><?php echo $message['Message']['time_sent'];?>-><?php
                            echo $this->Form->postLink(
                                $this->Html->tag('i', '', ['class' => 'fa fa-trash', 'aria-hidden' => 'true']),
                                ['controller' => 'messages', 'action' => 'delete', $message['Message']['id']],
                                [
                                    'confirm' => 'Are you sure you want to delete this conversation?',
                                    'escape' => false, // Allow HTML content in the link
                                    'class' => 'delete-link', // Add a class for identifying the link in JavaScript
                                    'data' => ['message-id' => $message['Message']['id']], // Store the message ID in data attribute
                                ]
                            );
                            ?> </span>
                </div>
            </div>
            <?php else: ?>
            <div class="outgoing_msg">
            <div style="float: right;" class="incoming_msg_img">
                <?php
                            $imageUrl = !empty($message['Recipient']['image']) ? '/img/upload/' . $message['Recipient']['image'] : '/img/upload/default-placeholder-image.jpg';

                            // Assuming you want to link to a user profile page, adjust the URL accordingly
                         
                            
                           
                            echo 
                            $this->Html->link(
                            $this->Html->image($imageUrl), array('controller'=>'users', 'action'=>'index'),array('escape' => false)
                            );
                           
                                
                            
                            ?>
                            
            </div>
                <div class="sent_msg">
                    
                    
                    <p class="message-content"><?php echo $message['Message']['message']; ?></p>

                    <span class="time_date"><?php echo $message['Message']['time_sent'];?>-><?php
                        echo $this->Form->postLink(
                            $this->Html->tag('i', '', ['class' => 'fa fa-trash', 'aria-hidden' => 'true']),
                            ['controller' => 'messages', 'action' => 'delete', $message['Message']['id']],
                            [
                                'confirm' => 'Are you sure you want to delete this conversation?',
                                'escape' => false, // Allow HTML content in the link
                                'class' => 'delete-link', // Add a class for identifying the link in JavaScript
                                'data' => ['message-id' => $message['Message']['id']], // Store the message ID in data attribute
                            ]
                        );
                ?> </span>
                </div>
            </div>
            <?php endif; ?>

            <?php endforeach; ?>
            <div>
            </div>
        </div>

    </div>
    <div id="pagination-container">
    <?php echo $this->Form->button('Show more', array('class' => 'increment-btn', 'id' => 'myButton', 'value' => 0)); ?>
    <?php 
       echo $this->Form->create('message', array('url' => array('controller' => 'message', 'action' => 'update_limit')));
       echo $this->Form->button('Show less', array('id' => 'showLessButton'));
       echo $this->Form->end();
     ?>
    </div>

    
    

</div>


<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul class="list-group">
        <?php if ($isLoggedIn): ?>
        <p>Welcome, <?php echo h($userSpecificData['User']['username']); ?>!</p>

        <li class="list-group-item">
            <?php
                    echo $this->HTML->link('Message Board', array('controller'=>'messages', 'action'=>'index1'));
                ?>
        </li>
        <li class="list-group-item">
            <?php
                    echo $this->HTML->link('Create Message', array('controller'=>'messages', 'action'=>'add'));
                ?>
        </li>
        <li class="list-group-item">
            <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'edit', $userSpecificData['User']['id'])); ?>
            <?php else: ?>
            <p>You are not logged in.</p>
            <?php endif; ?>
        </li>
        <li class="list-group-item">
            <?php
                    echo $this->HTML->link('Logout', array('controller'=>'users', 'action'=>'logout'));
                ?>
        </li>
    </ul>
</div>