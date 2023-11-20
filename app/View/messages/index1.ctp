<div class="users index">
    <div class="inbox_msg">

        <div class="headind_srch">
            <div class="recent_heading">
                <h4>Conversations</h4>
            </div>
        
        </div>
        
        <div class="inbox_chat">
 
            <?php foreach ($latestMessages as $latestMessage): ?>

            <div class="chat_list">
                    <div class="chat_people">
                        <div class="chat_img">  <?php
                            // Display user's image or placeholder image
                            $imageUrl = !empty($latestMessage['User']['image']) ? '/img/upload/' . $latestMessage['User']['image'] : '/img/upload/default-placeholder-image.jpg';
                            echo $this->Html->image($imageUrl);
                            ?>
                        </div>
                        <div class="chat_ib">
                            <h5><?php echo $latestMessage['User']['username'];?> <span class="chat_date">Dec 25</span>
                            </h5>
                           
                            <?php echo $this->HTML->link('Check conversation?', array('controller' => 'messages', 'action' => 'index', $latestMessage['User']['id']));?>
                            <a href="#" class="delete-convo" data-id="<?php echo $latestMessage['User']['id']; ?>">Delete Convo?</a>
                           
                        </div>
                    </div>
                
            </div>
            <?php endforeach; ?>

            
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

