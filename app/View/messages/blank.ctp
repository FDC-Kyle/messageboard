<!-- 
<div class="users index">
    <h2><?php echo __('Message Board'); ?></h2>
<div class="container">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<form id="messageForm">
    <?php
    echo $this->Form->input('user_id', array(
        'class' => 's-example-basic-single',
        'options' => $users,
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

<script>
function sendMessage() {
    var formData = $('#messageForm').serialize(); // Serialize the form data
    var baseUrl = '<?php echo $this->Html->url('/'); ?>';

    $.ajax({
        type: 'POST',
        url: baseUrl + '/messages/add',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Append the new message to the message container
                appendMessage(response.message);
                $('#response').html(response.message);
            } else {
                $('#response').html(response.message);
            }
        },
        error: function() {
            $('#response').html('Error sending message.');
        }
    });
}

function appendMessage(message) {
    // Append the new message to the message container
    var messageContainer = $('.msg_history');
    messageContainer.append(message);
    
    // Scroll to the bottom to show the latest message
    messageContainer.scrollTop(messageContainer[0].scrollHeight);
}
</script>
 
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar" placeholder="Search">
                                <span class="input-group-addon">
                                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="inbox_chat">
                    
                    <?php foreach ($latestMessages as $latestMessage): ?>
                       
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="chat_ib">
                                    <h5><?php echo $latestMessage['User']['username'];?> <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                    <?php foreach ($messages as $message): ?>
                        <?php 
                        // Check if the message is from the logged-in user
                        $isCurrentUserMessage = ($message['Message']['recipient_id'] != $loggedInUserId);
                        $alignClass = $isCurrentUserMessage ? 'align-self-end' : '';
                        ?>
                        <div class="incoming_msg">
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

                        </div>
                        
                        <?php endforeach; ?>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o"
                                    aria-hidden="true"></i></button>
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
		<?php if ($isLoggedIn): ?>
		<p>Welcome, <?php echo h($userSpecificData['User']['username']); ?>!</p>
		
		<li>
		<?php
			echo $this->HTML->link('Message Board', array('controller'=>'messages', 'action'=>'index'));
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
		<!-- <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics'), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li> -->

	</ul>
</div>
 -->
