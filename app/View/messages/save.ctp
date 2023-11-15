<h1>this is message list</h1>
<ul>
    <li>

    <?php
        echo $this->HTML->link('Create a message', array('controller'=>'messages', 'action'=>'add'));
    ?>

    </li>

    <li>

    <?php
        echo $this->HTML->link('Logout', array('controller'=>'users', 'action'=>'logout'));
    ?>

    </li>
</ul>
<?php foreach ($messages as $message): ?>
    <?php 
    // Check if the message is from the logged-in user
    $isCurrentUserMessage = ($message['Message']['recipient_id'] != $loggedInUserId);
    $alignClass = $isCurrentUserMessage ? 'align-self-end' : '';
    ?>
    <a href="#" class="list-group-item list-group-item-action flex-column mb-2">
    <div class="d-flex w-100 justify-content-between <?php echo $isCurrentUserMessage  ? 'flex-row-reverse' : ''; ?>">
            <div class="<?php echo $alignClass; ?>">
            <?php echo($loggedInUserId);
            echo($message['User']['id']); 
            echo($message['Message']['recipient_id']);?>
                <h5 class="mb-1"><?php echo $message['Message']['recipient_id']; ?></h5>
                <small class="text-muted"><?php echo $message['Message']['time_sent']; ?></small>
            </div>
            <?php
            // Display user's image or placeholder image
            $imageUrl = !empty($message['User']['image']) ? '/img/upload/' . $message['User']['image'] : '/img/upload/default-placeholder-image.jpg';
            echo $this->Html->image($imageUrl, array('width' => '100', 'height' => '100', 'class' => 'rounded-circle'));
            ?>
        </div>
        
        <div class="d-flex w-100 justify-content-between <?php echo $alignClass; ?>">
            <h1 class="mb-1"><?php echo $message['Message']['message']; ?></h1>
            <small class="text-muted">
                <?php
                // Display the username corresponding to recipient_id
                echo isset($message['User']['username']) ? $message['User']['username'] : 'Unknown User';
                ?>
            </small>
        </div>
    </a>
<?php endforeach; ?>
<?php unset($message); ?>



