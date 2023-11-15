
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
        <div class="sent_msg">
            <p><?php echo $message['Message']['message']; ?></p>
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

