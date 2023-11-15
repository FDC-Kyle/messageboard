<div class="users index">
    <h2><?php echo __('Your Profile'); ?></h2>
	

    
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
								<?php
									if (!empty($userSpecificData['User']['image'])) {
										// Display the user's uploaded image with specific width, height, and class
										echo $this->Html->image(
											'/img/upload/' . h($userSpecificData['User']['image']),
											array('class' => 'img-thumbnail', 'width' => 150, 'height' => 150)
										);
									} else {
										// Display a default placeholder image with specific width, height, and class
										echo $this->Html->image(
											'/img/upload/default-placeholder-image.jpg',
											array('class' => 'img-thumbnail', 'width' => 150, 'height' => 150)
										);
									}
								?>
                                </div>
								<div class="userData ml-3">
									<div class="mt-3">
										<a class="mt-4"href="javascript:void(0)">Hobby:</a>
									</div>
								<h6 class="d-block mt-3">
									<?php echo h($userSpecificData['User']['hobby']); ?>
								</h6>

                                    
                                </div>
                             
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<?php echo h($userSpecificData['User']['username']);?>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Birth Date</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<?php echo h($userSpecificData['User']['birthdate']);?>
                                            </div>
                                        </div>
                                        <hr />
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Gender</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<?php
											 if(h($userSpecificData['User']['gender']) == 1){
												echo"Male";

												}else{
												echo"Female";
												} ?>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Joined</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<?php echo h($userSpecificData['User']['created']); ?>
                                            </div>
                                        </div>
										<hr />
										<div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Last Login</label>
                                            </div>
                                            <div class="col-md-8 col-6">
											<?php echo h($userSpecificData['User']['created']); ?>
                                            </div>
                                        </div>
                                        <hr />
                                    </div>
                                 
                                </div>
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
		<?php
			echo $this->HTML->link('Change Password', array('controller'=>'users', 'action'=>'change_pass'));
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


