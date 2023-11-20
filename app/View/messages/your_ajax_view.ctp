
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
                            $imageUrl = !empty($message['Recipient']['image']) ? '/img/upload/' . $message['Recipient']['image'] : '/img/upload/default-placeholder-image.jpg';
                              
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
    ?>
            </span>
        </div>
    </div>
    <?php endif; ?>

    <?php endforeach; ?>

</div>



