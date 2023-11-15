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
                            // Display user's image or placeholder image
                            $imageUrl = !empty($message['User']['image']) ? '/img/upload/' . $message['User']['image'] : '/img/upload/default-placeholder-image.jpg';
                            echo $this->Html->image($imageUrl);
                            ?>
                </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <p><?php echo $message['Message']['message']; ?></p>
                        <span class="time_date"><?php echo $message['Message']['time_sent']; ?></span>
                    </div>
                </div>
                <?php else: ?>
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p><?php echo $message['Message']['message']; ?></p>
                        <span class="time_date"><?php echo $message['Message']['time_sent']; ?></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php endforeach; ?>
                <div>
                </div>
            </div>
        
        </div> 

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

        