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

	public function ajaxSearch() {
		$this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.username','User.image')
    ));

    $this->set('users', $users);
    $this->get_id();

	
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
		if ($this->request->is('post')) {
		if ($this->request->is('ajax')) {

			
			
            $newValue = $this->request->data('newValue');
            $this->Session->write('limit', $newValue);

            // You can send a response back if needed
            $this->autoRender = false;
          
        }
	}
	
	
		$id = $this->Auth->user('id');
		
		$userId = $this->Session->read('UserId');
	

		// Get the current limit from the session or use a default value
		$limit = $this->Session->read('limit') ?? 10;
		$this->layout = 'ajax'; // Use a different layout for AJAX requests if needed
		$searchTerm = $this->request->query['term'];
	
		// Perform your search logic and retrieve messages based on the search term
		$messages = $this->Message->find('all', array(
			'conditions' => array(
					'OR' => array(
						array(
							'AND' => array(
								'Message.user_id' => array($id, $userId),
								'Message.recipient_id' => array($id, $userId),
							),
						),
						array(
							'AND' => array(
								'Message.recipient_id' => array($id,$userId),
								'Message.user_id' => array($id, $userId),
							),
						),
					
					),
					'Message.message LIKE' => "%$searchTerm%",
					'Message.recipient_id != Message.user_id',
					
				
			),
			'contain' => array(
				'Sender' => array('fields' => array('image')),
				'Recipient' => array('fields' => array('image')),
			),
			'limit' => $limit,
			'order' => array('time_sent' => 'desc'),
		));
	
		$this->set('messages', $messages);
		$this->render('your_ajax_view', 'ajax');
	}

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
        'fields' => array('User.id', 'User.username','User.image')
    ));

    $this->set('users', $users);
    $this->get_id();



		

	
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
		if ($this->request->is('post')) {
		if ($this->request->is('ajax')) {

			
			
            $newValue = $this->request->data('newValue');
            $this->Session->write('limit', $newValue);

            // You can send a response back if needed
            $this->autoRender = false;
          
        }
	}
	
		$id1 = $this->request->params['pass'][0] ?? null;

		$id = $this->Auth->user('id');
		$this->Session->write('UserId', $id1);
		$userId = $this->Session->read('UserId');
		
		

		// Get the current limit from the session or use a default value
		$limit = $this->Session->read('limit') ?? 10;

		

		$this->Paginator->settings = array(
			'conditions' => array(
				'AND' => array(
					'OR' => array(
						array(
							'AND' => array(
								'Message.user_id' => array($id1, $id),
								'Message.recipient_id' => array($id1, $id),
							),
						),
						array(
							'AND' => array(
								'Message.recipient_id' => array($id1, $id),
								'Message.user_id' => array($id1, $id),
							),
						),
					),
					'Message.recipient_id != Message.user_id',
				),
			),
			'contain' => array(
				'Sender' => array('fields' => array('image')),
				'Recipient' => array('fields' => array('image')),
			),
			'limit' => $limit,
			'order' => array('time_sent' => 'desc'),
		);
		

		$messages = $this->Paginator->paginate('Message');
		$this->set('messages', $messages);


		 // Set the layout to 'ajax'
		 if ($this->request->is('ajax')) {
			$this->layout = null;
		}
	
		

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
/**
 * add method
 *
 * @return void
 */
	// app/Controller/MessagesController.php

	public function load_user(){
		$this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.username', 'User.image')
    ));

    $this->set('users', $users);
    $this->get_id();


	
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
		
		$id = $this->Auth->user('id');

		$this->loadModel('User');
		$users = $this->User->find('all', array(
			'fields' => array('User.id', 'User.username', 'User.image'),
			'conditions' => array('User.id !=' => $id),
		));

		$data = [];
		foreach ($users as $key => $value) {

			array_push($data, [
				'id' => $value['User']['id'],
				'text' => $value['User']['username'],
				'image' => $value['User']['image'],
			]);
			
		}
		$this->set('data', $data);

		
		

		$this->get_id();
		
	
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
			
			// $usId = $this->request->data['Message']['user_id'];
			// $this->Session->write('usId', $usId);
			// debug($usId);
			// exit;
			
		
			if ($this->Message->save($this->request->data)) {
				
				
				
				$this->Flash->success(__('Message Sent!'));
			} else {
				$this->Flash->error(__('Error in sending message, please try again!'));
			}

			exit; // End the controller action for AJAX requests
		}

		

	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


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

	// MessagesController.php

	public function deleteConversation() {
		$this->autoRender = false; // Disable view rendering for Ajax requests
		$this->request->allowMethod('post', 'delete');
		

		$id1 = $this->request->data['id1'] ?? null;
		$id = $this->Auth->user('id');

		$this->Message->deleteAll(
			array(
				'OR' => array(
					array('user_id' => $id1, 'recipient_id' => $id),
					array('user_id' => $id, 'recipient_id' => $id1)
				)
			)
		);

		$this->response->type('json');
		$this->response->body(json_encode(['success' => true]));

		return $this->response;
	}

	public function updateLimit(){
		    // Set the session variable to 10
			$this->Session->write('limit', 10);

			// Respond with success (or any other data you want to send back)
			echo json_encode(['success' => true]);
			exit;
		
	}

}
