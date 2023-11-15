<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */

	public function index() {
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


		
	
	public function thanks() {

	

		
		
	}

	public function message() {
		$users = $this->User->find('list', array(
			'fields' => array('User.id', 'User.username') // Assuming 'id' and 'username' are your User model fields
		));
	
		// Pass the users to the view
		$this->set('users', $users);
	}

	public function login() {

		if($this->request->is('post')){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirectUrl());
			} else{
				$this->Session->setFlash('invalid email or Password!');
			}
		}
	
	}
	public function blank() {


		
		

	}
	public function change_pass() {
		// Check authentication status
		$isLoggedIn = $this->Auth->user() ? true : false;
	
		// Get user data if logged in
		$userData = $this->Auth->user();
	
		// Retrieve data specific to the logged-in user
		$email = $userData['email'];
		$userSpecificData = $this->User->find('first', array(
			'conditions' => array(
				'User.email' => $email
			)
		));
	   
		// Pass the user-specific data to the view
		$this->set(compact('isLoggedIn', 'userData', 'userSpecificData'));

		if ($this->request->is('post')) {
		if (Security::hash($this->request->data['User']['password'], null, true) === $userSpecificData['User']['password']) {
			$this->Flash->success(__('Old password matched!'));

			return $this->redirect(['controller' => 'users', 'action' => 'password_match']);

		} else {
			$this->Flash->error(__('The passwords dont matched!'));
		}
	}

	}
	public function password_match($id = null) {
		if ($this->request->is(array('post', 'put'))) {
			if ($this->request->data['User']['password'] === $this->request->data['User']['password_confirmation']) {
				$id = $this->Auth->user('id'); // Get the id of the logged-in user
	
				// Set the user id in the data
				$this->request->data['User']['id'] = $id;
	
				$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
	
				if ($this->User->save($this->request->data)) {
					return $this->redirect(['controller' => 'users', 'action' => 'index']);
					$this->Flash->success(__('Password has been changed.'));
				} else {
					$this->Flash->error(__('User not saved!'));
				}
			} else {
				$this->Flash->error(__('Passwords don\'t match!'));
			}
		}
	}
	
	

	public function logout() {

		$this->Auth->logout();
		$this->redirect('/users/index');
	
	}
	public function beforeFilter() {

		$this->Auth->allow('add');

	
	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
public function add() {
    if ($this->request->is('post')) {
        $existingUser = $this->User->findByEmail($this->request->data['User']['email']);
        
        if ($existingUser) {
            $this->Flash->error(__('Email address already exists. Please use a different email address.'));
        } elseif ($this->request->data['User']['password'] === $this->request->data['User']['password_confirmation']) {
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

            $this->User->create();

            if ($this->User->save($this->request->data)) {
				$credentials = [
				
					'email' => $this->request->data['User']['email'], // or 'username' if using username as authentication field
					'password' => $this->request->data['User']['password']
				];
				
                $this->Flash->success(__('The user has been saved.'));
                // Redirect to the thank you page
				if($this->Auth->login($credentials)){

					

					

					return $this->redirect(['controller' => 'users', 'action' => 'thanks']);

				}
				
                
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->Flash->error(__('Passwords do not match. Please, try again.'));
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

	  

    if (!$this->User->exists($id)) {
        throw new NotFoundException(__('Invalid user'));
    }

    // ...

	if ($this->request->is(array('post', 'put'))) {
		// Check if a new image file is being uploaded
		if (!empty($this->request->data['User']['image']['name'])) {
			$file = $this->request->data['User']['image']; // Creating a variable to handle upload
			$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)); // Get the extension

			// Allowed file extensions
			$allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');

			// Check if the file extension is valid
			if (in_array($ext, $allowedExtensions)) {
				// Delete the old image if it exists
				if (!empty($userSpecificData['User']['image'])) {
					$oldImagePath = WWW_ROOT . 'img/upload/' . $userSpecificData['User']['image'];
					if (file_exists($oldImagePath)) {
						unlink($oldImagePath);
					}
				}

				// Generate a unique filename
				$uniqueFilename = uniqid() . '_' . bin2hex(random_bytes(8)) . '.' . $ext;

				// Upload the file to the desired location with the unique filename
				move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload/' . $uniqueFilename);

				// Update the data array with the new unique file name
				$this->request->data['User']['image'] = $uniqueFilename;
			} else {
				$this->Flash->error(__('Invalid file format. Please upload a JPG, JPEG, GIF, or PNG image.'));
				return $this->redirect($this->referer());
			}
		} elseif (!empty($userSpecificData['User']['image'])) {
			// If no new image is uploaded, use the existing image from the database
			$this->request->data['User']['image'] = $userSpecificData['User']['image'];
		} else {
			// No new image is uploaded and no existing image in the database, set image field to null or whatever default value you prefer
			$this->request->data['User']['image'] = null; // Set to null or default image path
		}

		// Attempt to save the user data
		if ($this->User->save($this->request->data)) {
			$this->Flash->success(__('The user has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
	} else {
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->request->data = $this->User->find('first', $options);
	}

// ...

}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete($id)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
