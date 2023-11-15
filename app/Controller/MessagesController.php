<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {
	

/**
 * Components
 *
 * @var array
 */

	public $components = array('Paginator','Session');
	
	public $helpers = array('Html', 'Form');

	public $paginate = array(
		'limit' => 10,
		'order' => array('Message.id' => 'desc'), // Adjust as needed
	);


/**
 * index method
 *
 * @return void
 */
	public $uses = array('Message');

	public function index1() {
		$this->loadModel('User');
		$this->get_id();
		$this->set('messages', $this->Message->find('all'));

			// Check authentication status
			$isLoggedIn = $this->Auth->user() ? true : false;

			// Get user data if logged in
			$userData = $this->Auth->user();
	
			
				// Find user data based on the email address
			
		
			// Pass data to the view
			$this->set(compact('isLoggedIn', 'userData'));
		   // $this->User->recursive = 0;
		   // $this->set('users', $this->Paginator->paginate());
		   
		   // Retrieve data specific to the logged-in user
		   $email = $userData['email'];
	
		   $userSpecificData = $this->User->find('first', array(
			'conditions' => array(
			'User.email' => $email
				)
			));
					
	
		   // Pass the user-specific data to the view
		   $this->set('userSpecificData', $userSpecificData);

		   

		if ($this->request->is('ajax')) {
			$this->autoRender = false; // Disable the view rendering for AJAX requests
			$this->layout = 'ajax'; // Set the layout to 'ajax'
	
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				echo json_encode(array('status' => 'success', 'message' => 'The message has been saved.'));
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'The message could not be saved. Please, try again.'));
			}
	
			exit; // End the controller action for AJAX requests
		}
	
		// Continue with the regular non-AJAX request handling
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}
		// First Query to Retrieve Latest Messages for Each User
		$id = $this->Auth->user('id');
		$latestMessages = $this->User->find('all', array(
			'fields' => array(
				'DISTINCT User.id',
				'User.username','User.image'
			),
			'conditions' => array(
				'User.id !=' => $id
			),
			'contain' => array(
				'Message' => array(
					'fields' => array(
						'Message.*',
						'User.*' // Include User data for the sender
					),
					'order' => 'Message.time_sent DESC', // Order messages by time_sent in descending order
					'limit' => 1 // Limit to only the latest message
				)
			),
			'group' => 'User.id',
		));
		
		$this->set('latestMessages', $latestMessages);

	
	

		
	}

	public function get_id(){
		

		 // Get the logged-in user's ID from the Auth component
		 $loggedInUserId = $this->Auth->user('id');

		 // Pass the user's ID to the view
		 $this->set('loggedInUserId', $loggedInUserId);

	}
	
	public function index($id = null) {

		






	

		$this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.username')
    ));

    $this->set('users', $users);
    $this->get_id();



				// Assuming $userData['email'] contains the email address you want to search for
		

	
		// Check authentication status
		$isLoggedIn = $this->Auth->user() ? true : false;

		// Get user data if logged in
		$userData = $this->Auth->user();

		
			// Find user data based on the email address
		
	
		// Pass data to the view
		$this->set(compact('isLoggedIn', 'userData'));
	   // $this->User->recursive = 0;
	   // $this->set('users', $this->Paginator->paginate());
	   
	   // Retrieve data specific to the logged-in user
	   $email = $userData['email'];

	   $userSpecificData = $this->User->find('first', array(
		'conditions' => array(
		'User.email' => $email
			)
		));
				


	   // Pass the user-specific data to the view
	   $this->set('userSpecificData', $userSpecificData);
		// Fetch messages with recipient_id and associated user data
		// $messages = $this->Message->find('all', array(
		// 	'contain' => 'Users', // Assuming 'User' is the association name in your Message model
		// ));
		$id1 = $this->request->params['pass'][0] ?? null;
		$id = $this->Auth->user('id');
		$this->Session->write('UserId', $id1);
		$userId = $this->Session->read('UserId');
		$messages = $this->Message->find('all', array(
			'conditions' => array(
				'AND' => array(
					'OR' => array(
						array(
							'AND' => array(
								'user_id' => array($id1, $id),
								'recipient_id' => array($id1, $id),
							),
						),
						array(
							'AND' => array(
								'recipient_id' => array($id1, $id),
								'user_id' => array($id1, $id),
							),
						),
					),
					'recipient_id != user_id',
				),
			),
			'contain' => array('Users',
		),
		));
		
		
		
		
		 // Set the layout to 'ajax'
		 if ($this->request->is('ajax')) {
			$this->layout = null;
		}
	
		// Pass messages to the view
		$this->set('messages', $messages);

		if ($this->request->is('ajax')) {
			$this->render('your_ajax_view'); // Replace 'your_ajax_view' with the actual view file name
		}

		$this->get_id();

		if ($this->request->is('post')) {

		if ($this->request->is('ajax')) {
			$this->autoRender = false; // Disable the view rendering for AJAX requests
			$this->layout = 'ajax'; // Set the layout to 'ajax'
	
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				echo json_encode(array('status' => 'success', 'message' => 'The message has been saved.'));
			} else {
				echo json_encode(array('status' => 'error', 'message' => 'The message could not be saved. Please, try again.'));
			}
	
			exit; // End the controller action for AJAX requests
		}
	}

	
	


	}
	
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	// app/Controller/MessagesController.php

	public function load_user(){
		$this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.username')
    ));

    $this->set('users', $users);
    $this->get_id();



				// Assuming $userData['email'] contains the email address you want to search for
		

	
		// Check authentication status
		$isLoggedIn = $this->Auth->user() ? true : false;

		// Get user data if logged in
		$userData = $this->Auth->user();

		
			// Find user data based on the email address
		
	
		// Pass data to the view
		$this->set(compact('isLoggedIn', 'userData'));
	   // $this->User->recursive = 0;
	   // $this->set('users', $this->Paginator->paginate());
	   
	   // Retrieve data specific to the logged-in user
	   $email = $userData['email'];

	   $userSpecificData = $this->User->find('first', array(
		'conditions' => array(
		'User.email' => $email
			)
		));
		 // Pass the user-specific data to the view
		 $this->set('userSpecificData', $userSpecificData);
	}
public function add() {
	$userId = $this->Session->read('UserId');

	$this->load_user();
	

    if ($this->request->is('ajax')) {
        $this->autoRender = false; // Disable the view rendering for AJAX requests
        $this->layout = 'ajax'; // Set the layout to 'ajax'

        $this->Message->create();
        if ($this->Message->save($this->request->data)) {
            $this->Flash->success(__('Message Sent!'));
        } else {
            $this->Flash->error(__('Error in sending message, please try again!'));
        }

        exit; // End the controller action for AJAX requests
    }

    // Continue with the regular non-AJAX request handling
    if ($this->request->is('post')) {
        $this->Message->create();
        if ($this->Message->save($this->request->data)) {
            $this->Flash->success(__('The message has been saved.'));
            $this->redirect(array('controller'=>'messages','action' => 'index'));
        } else {
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
    }
}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$users = $this->Message->User->find('list');
		$recipients = $this->Message->Recipient->find('list');
		$this->set(compact('users', 'recipients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->autoRender = false; // Disable view rendering for Ajax requests
		$this->request->allowMethod('post', 'delete');

		if (!$this->Message->exists($id)) {
			$response = ['status' => 'error', 'message' => 'Invalid message'];
		} else {
			if ($this->Message->delete($id)) {
				$this->Flash->success(__('The message has been deleted.'));
			} else {
				$this->Flash->error(__('Error in deleting message'));
			}
		}
		 $userId = $this->Session->read('UserId');

		return $this->redirect(array('action' => 'index', $userId));
	}
}
