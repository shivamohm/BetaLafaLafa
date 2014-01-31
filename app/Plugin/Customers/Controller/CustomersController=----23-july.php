<?php
/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('CustomersAppController', 'Customers.Controller');

/**
 * Customers Customers Controller
 *
 * @package       Customers
 * @subpackage    Customers.Controller
 * @property	  AuthComponent $Auth
 * @property	  CookieComponent $Cookie
 * @property	  PaginatorComponent $Paginator
 * @property	  SecurityComponent $Security
 * @property	  SessionComponent $Session
 * @property	  Customer $Customer
 * @property	  RememberMeComponent $RememberMe
 */
class CustomersController extends CustomersAppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Customers';

/**
 * If the controller is a plugin controller set the plugin name
 *
 * @var mixed
 */
	public $plugin = null;

/**
 * Helpers
 *
 * @var array
 */
	#public $helpers = array('Html', 'Form', 'Session', 	'Time', 'Text','Facebook.Facebook' );
	public $helpers = array('Html', 'Form', 'Session', 	'Time', 'Text', 'Facebook.Facebook');

/**
 * Components
 *
 * @var array
 */
	#public $components = array( 'Auth', 'Session', 'Cookie', 'Paginator', 'Security', 'Search.Prg', 'Customers.RememberMe', 'Facebook.Connect');
	public $components = array( 'Auth','Facebook.Connect', 'Session', 'Cookie', 'Paginator', 'Security', 'Search.Prg', 'Customers.RememberMe');

/**
 * Preset vars
 *
 * @var array $presetVars
 * @link https://github.com/CakeDC/search
 */
	public $presetVars = true;

/**
 * Constructor
 *
 * @param CakeRequest $request Request object for this controller. Can be null for testing,
 *  but expect that features that use the request parameters will not work.
 * @param CakeResponse $response Response object for this controller.
 */
	public function __construct($request, $response) {
		$this->_setupComponents();
		parent::__construct($request, $response);
		$this->_reInitControllerName();
	}

/**
 * Providing backward compatibility to a fix that was just made recently to the core
 * for users that want to upgrade the plugin but not the core
 *
 * @link http://cakephp.lighthouseapp.com/projects/42648-cakephp/tickets/3550-inherited-controllers-get-wrong-property-names
 * @return void
 */
	protected function _reInitControllerName() {
		$name = substr(get_class($this), 0, -10);
		if ($this->name === null) {
			$this->name = $name;
		} elseif ($name !== $this->name) {
			$this->name = $name;
		}
	}

/**
 * Returns $this->plugin with a dot, used for plugin loading using the dot notation
 *
 * @return mixed string|null
 */
	protected function _pluginDot() {
		if (is_string($this->plugin)) {
			return $this->plugin . '.';
		}
		return $this->plugin;
	}

/**
 * Wrapper for CakePlugin::loaded()
 *
 * @param string $plugin
 * @return boolean
 */
	protected function _pluginLoaded($plugin, $exception = true) {
		$result = CakePlugin::loaded($plugin);
		if ($exception === true && $result === false) {
			throw new MissingPluginException(array('plugin' => $plugin));
		}
		return $result;
	}

/**
 * Setup components based on plugin availability
 *
 * @return void
 * @link https://github.com/CakeDC/search
 */
	protected function _setupComponents() {
		if ($this->_pluginLoaded('Search', false)) {
			$this->components[] = 'Search.Prg';
		}
	}

/**
 * beforeFilter callback
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		 #$this->Auth->allow('logout');
		 $this->Auth->allow('add','login','logout');
		$this->_setupAuth();
		
		
		$this->_setupPagination();
		
        
		$this->set('model', $this->modelClass);
		$this->Auth->loginRedirect = array('action' => 'index');        
		$this->Auth->logoutRedirect = array('action' => 'login');
        $this->layout='facebook'; 
        
        #if ($this->Auth->user()){
		#	pr($this->Auth->user());
			#  $this->set('facebookUser', $this->Connect->user());
				//retrieve only the id from the facebook user
			#	$this->set('facebook_id', $this->Connect->user('id'));
		 
				//retrieve only the email from the facebook user
			#	$this->set('facebook_email', $this->Connect->user('email'));
		# }

       
  
         
		if (!Configure::read('App.defaultEmail')) {
			Configure::write('App.defaultEmail', 'noreply@' . env('HTTP_HOST'));
		}
	}

/**
 * Sets the default pagination settings up
 *
 * Override this method or the index action directly if you want to change
 * pagination settings.
 *
 * @return void
 */
	protected function _setupPagination() {
		$this->Paginator->settings = array(
			'limit' => 12,
			'conditions' => array(
				$this->modelClass . '.active' => 1,
				$this->modelClass . '.email_verified' => 1
			)
		);
	}

/**
 * Sets the default pagination settings up
 *
 * Override this method or the index() action directly if you want to change
 * pagination settings. admin_index()
 *
 * @return void
 */
	protected function _setupAdminPagination() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array(
				$this->modelClass . '.created' => 'desc'
			)
		);
	}

/**
 * Setup Authentication Component
 *
 * @return void
 */
	protected function _setupAuth() {
		if (Configure::read('Customers.disableDefaultAuth') === true) {
			return;
		}

		$this->Auth->allow('add', 'reset', 'verify', 'logout', 'view', 'reset_password', 'login', 'resend_verification');

		if (!is_null(Configure::read('Customers.allowRegistration')) && !Configure::read('Customers.allowRegistration')) {
			$this->Auth->deny('add');
		}
		
		if( ($this->request->action == 'admin_index') OR ($this->request->action == 'admin_edit')OR ($this->request->action == 'admin_add')OR ($this->request->action == 'admin_view')OR ($this->request->action == 'admin_delete')){
			$this->Components->disable('Auth');
		}
		
		if ($this->request->action == 'register') {
			$this->Components->disable('Auth');
		}

		$this->Auth->authenticate = array(
			'Form' => array(
				'fields' => array(
					'username' => 'email',
					'password' => 'password'),
				'userModel' => $this->_pluginDot() . $this->modelClass,
				'scope' => array(
					$this->modelClass . '.active' => 1,
					$this->modelClass . '.email_verified' => 1)));

		$this->Auth->loginRedirect = '/';
		$this->Auth->logoutRedirect = array('plugin' => Inflector::underscore($this->plugin), 'controller' => 'customers', 'action' => 'login');
		$this->Auth->loginAction = array('admin' => false, 'plugin' => Inflector::underscore($this->plugin), 'controller' => 'customers', 'action' => 'login');
	}

/**
 * Simple listing of all users
 *
 * @return void
 */
	public function index() {
		$slug	=	$this->Auth->user('id');
		$slug	=	$this->Auth->user('slug');
		#$this->set('customers', $this->Paginator->paginate($this->modelClass));
		$this->set('customers', $this->{$this->modelClass}->view($slug));
	}

/**
 * The homepage of a users giving him an overview about everything
 *
 * @return void
 */
	public function dashboard() {
		$user = $this->{$this->modelClass}->read(null, $this->Auth->user('id'));
		$this->set('customer', $user);
	}

/**
 * Shows a users profile
 *
 * @param string $slug Customer Slug
 * @return void
 */
	public function view($slug = null) {
		try {
			$slug	=	$this->Auth->user('id');
			$this->set('customer', $this->{$this->modelClass}->view($slug));
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/customers');
		}
	}

/**
 * Edit
 *
 * @param string $id Customer ID
 * @return void
 */
 public function edit() {
		
		$userId	=	$this->Auth->user('id');
		
		
		
		if ($this->request->is('post')) {
            
			$this->request->data[$this->modelClass]['id'] = $this->Auth->user('id');
			if ($this->{$this->modelClass}->saveAccount($userId,$this->request->data)) {
				return $this->redirect(array('action' => 'index'));
			}
		}
		$this->set('customer', $this->{$this->modelClass}->dataDisplay($userId));
	}


 /*
	public function edit() {
		
		try {
			$result = $this->{$this->modelClass}->edit($userId, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__d('customers', 'Customer saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->{$this->modelClass}->read(null, $userId);
		}
		$this->set('roles', Configure::read('Customers.roles'));
	}*/

/**
 * Admin Index
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		unset($this->{$this->modelClass}->validate['username']);
		unset($this->{$this->modelClass}->validate['email']);
		$this->{$this->modelClass}->data[$this->modelClass] = $this->passedArgs;

		if ($this->{$this->modelClass}->Behaviors->loaded('Searchable')) {
			$parsedConditions = $this->{$this->modelClass}->parseCriteria($this->passedArgs);
		} else {
			$parsedConditions = array();
		}

		$this->_setupAdminPagination();
		$this->Paginator->settings[$this->modelClass]['conditions'] = $parsedConditions;
		$this->set('customers', $this->Paginator->paginate());
	}

/**
 * Admin view
 *
 * @param string $id Customer ID
 * @return void
 */
	public function admin_view($id = null) {
		try {
			$user = $this->{$this->modelClass}->view($id, 'slug');
		} catch (NotFoundException $e) {
			$this->Session->setFlash(__d('customers', 'Invalid customers.'));
			$this->redirect(array('action' => 'index'));
		}

		$this->set('customer', $user);
	}

/**
 * Admin add
 *
 * @return void
 */
	public function admin_add() {
		if (!empty($this->request->data)) {
			$this->request->data[$this->modelClass]['tos'] = true;
			$this->request->data[$this->modelClass]['email_verified'] = true;

			if ($this->{$this->modelClass}->add($this->request->data)) {
				$this->Session->setFlash(__d('customers', 'The Customer has been saved'));
				$this->redirect(array('action' => 'index'));
			}
		}
		$this->set('roles', Configure::read('Customers.roles'));
	}

/**
 * Admin edit
 *
 * @param null $userId
 * @return void
 */
	public function admin_edit($userId = null) {
		try {
			$result = $this->{$this->modelClass}->edit($userId, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__d('customers', 'Customer saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->request->data)) {
			$this->request->data = $this->{$this->modelClass}->read(null, $userId);
		}
		$this->set('roles', Configure::read('Customers.roles'));
	}

/**
 * Delete a user account
 *
 * @param string $userId Customer ID
 * @return void
 */
	public function admin_delete($userId = null) {
		if ($this->{$this->modelClass}->delete($userId)) {
			$this->Session->setFlash(__d('customers', 'Customer deleted'));
		} else {
			$this->Session->setFlash(__d('customers', 'Invalid Customer'));
		}

		$this->redirect(array('action' => 'index'));
	}

/**
 * Search for a user
 *
 * @return void
 */
	public function admin_search() {
		$this->search();
	}

/**
 * Customer register action
 *
 * @return void
 */
	public function add() {
		session_destroy();
		if ($this->Auth->user()) {
			$this->Session->setFlash(__d('customers', 'You are already registered and logged in!'));
			$this->redirect('/');
		}

		if (!empty($this->request->data)) {
			$user = $this->{$this->modelClass}->register($this->request->data);
			if ($user !== false) {
				$Event = new CakeEvent(
					'Customers.Controller.Customers.afterRegistration',
					$this,
					array(
						'data' => $this->request->data,
					)
				);
				$this->getEventManager()->dispatch($Event);
				if ($Event->isStopped()) {
					$this->redirect(array('action' => 'login'));
				}
			
				$this->_sendVerificationEmail($this->{$this->modelClass}->data);
				#$this->Session->setFlash(__d('customers', 'Your account has been created. You should receive an e-mail shortly to authenticate your account. Once validated you will be able to login.'));
				$this->Session->setFlash(__d('customers', 'Your account has been created. You will be able to login.'));
				$this->redirect(array('action' => 'login'));
			} else {
				unset($this->request->data[$this->modelClass]['password']);
				unset($this->request->data[$this->modelClass]['temppassword']);
				$this->Session->setFlash(__d('customers', 'Your account could not be created. Please, try again.'), 'default', array('class' => 'message warning'));
			}
		}
	}

/**
 * Common login action
 *
 * @return void
 */
	public function login() {
		
		
		$Event = new CakeEvent(
			'Customers.Controller.Customer.beforeLogin',
			$this,
			array(
				'data' => $this->request->data,
			)
		);

		$this->getEventManager()->dispatch($Event);

		if ($Event->isStopped()) {
			return;
		}
		
		if ($this->Auth->user()){
			$this->redirect(array('action' => 'dashboard'));
		 }

		if ($this->request->is('post')) {
		
			if ($this->Auth->login()) {
				$Event = new CakeEvent(	'Customers.Controller.Customers.afterLogin', $this, array('data' => $this->request->data, 'isFirstLogin' => !$this->Auth->user('last_login')) );
				
				$this->getEventManager()->dispatch($Event);

				$this->{$this->modelClass}->id = $this->Auth->user('id');
				$this->{$this->modelClass}->saveField('last_login', date('Y-m-d H:i:s'));

				if ($this->here == $this->Auth->loginRedirect) {
					$this->Auth->loginRedirect = '/customers';
				}
				$this->Session->setFlash(sprintf(__d('customers', '%s you have successfully logged in'), $this->Auth->user('username')));
				if (!empty($this->request->data)) {
					$data = $this->request->data[$this->modelClass];
					if (empty($this->request->data[$this->modelClass]['remember_me'])) {
						$this->RememberMe->destroyCookie();
					} else {
						$this->_setCookie();
					}
				}

				if (empty($data[$this->modelClass]['return_to'])) {
					$data[$this->modelClass]['return_to'] = null;
				}

				// Checking for 2.3 but keeping a fallback for older versions
				if (method_exists($this->Auth, 'redirectUrl')) {
					$this->redirect($this->Auth->redirectUrl($data[$this->modelClass]['return_to']));
				} else {
					$this->redirect($this->Auth->redirect($data[$this->modelClass]['return_to']));
				}
			} else {
				$this->Auth->flash(__d('customers', 'Invalid e-mail / password combination.  Please try again'));
			}
		}
		if (isset($this->request->params['named']['return_to'])) {
			$this->set('return_to', urldecode($this->request->params['named']['return_to']));
		} else {
			$this->set('return_to', false);
		}
		$allowRegistration = Configure::read('Customers.allowRegistration');
		$this->set('allowRegistration', (is_null($allowRegistration) ? true : $allowRegistration));
	}

/**
 * Search - Requires the CakeDC Search plugin to work
 *
 * @throws MissingPluginException
 * @return void
 * @link https://github.com/CakeDC/search
 */
	public function search() {
		$this->_pluginLoaded('Search');

		$searchTerm = '';
		$this->Prg->commonProcess($this->modelClass);

		$by = null;
		if (!empty($this->request->params['named']['search'])) {
			$searchTerm = $this->request->params['named']['search'];
			$by = 'any';
		}
		if (!empty($this->request->params['named']['username'])) {
			$searchTerm = $this->request->params['named']['username'];
			$by = 'username';
		}
		if (!empty($this->request->params['named']['email'])) {
			$searchTerm = $this->request->params['named']['email'];
			$by = 'email';
		}
		$this->request->data[$this->modelClass]['search'] = $searchTerm;

		$this->Paginator->settings = array(
			'search',
			'limit' => 12,
			'by' => $by,
			'search' => $searchTerm,
			'conditions' => array(
					'AND' => array(
						$this->modelClass . '.active' => 1,
						$this->modelClass . '.email_verified' => 1)));

		$this->set('customers', $this->Paginator->paginate($this->modelClass));
		$this->set('searchTerm', $searchTerm);
	}

/**
 * Common logout action
 *
 * @return void
 */
	public function logout() {
		
		
		$user = $this->Auth->user();
		unset($user);
		$this->Session->destroy();
		$this->Cookie->destroy();
		if (isset($_COOKIE[$this->Cookie->name])) {
		$this->Cookie->destroy();
		
		#$this->Session->read('Auth.User.id');
		}
		$this->Cookie->destroy();
		$this->Session->delete('FB.Me');
		$this->Session->destroy('FB.Me');
		
		#exit;
		setcookie('fbsr_586035074814973', '', time()-3600, '/', '.'.$_SERVER['SERVER_NAME']);
		setcookie('fbm_586035074814973', '', time()-3600, '/', '.http://laz-lin-gen-1.cloudapp.net/');
		$this->RememberMe->destroyCookie();
		
		
		$this->Session->setFlash(sprintf(__d('customers', '%s you have successfully logged out'), $user[$this->{$this->modelClass}->displayField]));
		$this->redirect($this->Auth->logout());
	}

/**
 * Checks if an email is already verified and if not renews the expiration time
 *
 * @return void
 */
	public function resend_verification() {
		if ($this->request->is('post')) {
			try {
				if ($this->{$this->modelClass}->checkEmailVerification($this->request->data)) {
					$this->_sendVerificationEmail($this->{$this->modelClass}->data);
					$this->Session->setFlash(__d('customers', 'The email was resent. Please check your inbox.'));
					$this->redirect('login');
				} else {
					$this->Session->setFlash(__d('customers', 'The email could not be sent. Please check errors.'));
				}
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
	}

/**
 * Confirm email action
 *
 * @param string $type Type, deprecated, will be removed. Its just still there for a smooth transistion.
 * @param string $token Token
 * @return void
 */
	public function verify($type = 'email', $token = null) {
		if ($type == 'reset') {
			// Backward compatiblity
			$this->request_new_password($token);
		}

		try {
			$this->{$this->modelClass}->verifyEmail($token);
			$this->Session->setFlash(__d('customers', 'Your e-mail has been validated!'));
			return $this->redirect(array('action' => 'login'));
		} catch (RuntimeException $e) {
			$this->Session->setFlash($e->getMessage());
			return $this->redirect('/');
		}
	}

/**
 * This method will send a new password to the user
 *
 * @param string $token Token
 * @throws NotFoundException
 * @return void
 */
	public function request_new_password($token = null) {
		if (Configure::read('Customers.sendPassword') !== true) {
			throw new NotFoundException();
		}

		$data = $this->{$this->modelClass}->verifyEmail($token);

		if (!$data) {
			$this->Session->setFlash(__d('customers', 'The url you accessed is not longer valid'));
			return $this->redirect('/');
		}

		if ($this->{$this->modelClass}->save($data, array('validate' => false))) {
			$this->_sendNewPassword($data);
			$this->Session->setFlash(__d('customers', 'Your password was sent to your registered email account'));
			$this->redirect(array('action' => 'login'));
		}

		$this->Session->setFlash(__d('customers', 'There was an error verifying your account. Please check the email you were sent, and retry the verification link.'));
		$this->redirect('/');
	}

/**
 * Sends the password reset email
 *
 * @param array
 * @return void
 */
	protected function _sendNewPassword($userData) {
		$Email = $this->_getMailInstance();
		$Email->from(Configure::read('App.defaultEmail'))
			->to($userData[$this->modelClass]['email'])
			->replyTo(Configure::read('App.defaultEmail'))
			->return(Configure::read('App.defaultEmail'))
			->subject(env('HTTP_HOST') . ' ' . __d('customers', 'Password Reset'))
			->template($this->_pluginDot() . 'new_password')
			->viewVars(array(
				'model' => $this->modelClass,
				'customerData' => $userData))
			->send();
	}

/**
 * Allows the user to enter a new password, it needs to be confirmed by entering the old password
 *
 * @return void
 */
	public function change_password() {
		if ($this->request->is('post')) {
			$this->request->data[$this->modelClass]['id'] = $this->Auth->user('id');
			if ($this->{$this->modelClass}->changePassword($this->request->data)) {
				$this->Session->setFlash(__d('customers', 'Password changed.'));
				// we don't want to keep the cookie with the old password around
				$this->RememberMe->destroyCookie();
				$this->redirect('/');
			}
		}
	}

/**
 * Reset Password Action
 *
 * Handles the trigger of the reset, also takes the token, validates it and let the user enter
 * a new password.
 *
 * @param string $token Token
 * @param string $user Customer Data
 * @return void
 */
	public function reset_password($token = null, $user = null) {
		if (empty($token)) {
			$admin = false;
			if ($user) {
				$this->request->data = $user;
				$admin = true;
			}
			$this->_sendPasswordReset($admin);
			#$this->_sendNewPassword($admin);
		} else {
			$this->_resetPassword($token);
		}
	}

/**
 * Sets a list of languages to the view which can be used in selects
 *
 * @deprecated No fallback provided, use the Utils plugin in your app directly
 * @param string $viewVar View variable name, default is languages
 * @throws MissingPluginException
 * @return void
 * @link https://github.com/CakeDC/utils
 */
	protected function _setLanguages($viewVar = 'languages') {
		$this->_pluginLoaded('Utils'); #shivam

		$Languages = new Languages();
		$this->set($viewVar, $Languages->lists('locale'));
	}

/**
 * Sends the verification email
 *
 * This method is protected and not private so that classes that inherit this
 * controller can override this method to change the varification mail sending
 * in any possible way.
 *
 * @param string $to Receiver email address
 * @param array $options EmailComponent options
 * @return void
 */
	protected function _sendVerificationEmail($userData, $options = array()) {
		
		$defaults = array(
			'from' => Configure::read('App.defaultEmail'),
			#'subject' => __d('customers', 'LafaLafa Account verification'),
			'subject' => __d('customers', 'Welcome to LaFaLaFa.com! Smartest way to shop online'),
			#'template' => $this->_pluginDot() . 'account_verification',
			'template' => $this->_pluginDot() . 'account_thanku',
			'layout' => 'default',
			'emailFormat' => CakeEmail::MESSAGE_TEXT
		);
	
	
		$options = array_merge($defaults, $options);
		
		
		$Email = $this->_getMailInstance();
		$Email->to($userData[$this->modelClass]['email'])
			->from($options['from'])
			->emailFormat($options['emailFormat'])
			->subject($options['subject'])
			->template($options['template'], $options['layout'])
			->viewVars(array(
			'model' => $this->modelClass,
				'customers' => $userData
			))
			->send();
			#pr($Email); Regis Email by shivam
	}

/**
 * Checks if the email is in the system and authenticated, if yes create the token
 * save it and send the user an email
 *
 * @param boolean $admin Admin boolean
 * @param array $options Options
 * @return void
 */
	protected function _sendPasswordReset($admin = null, $options = array()) {
		$defaults = array(
			'from' => Configure::read('App.defaultEmail'),
			'subject' => __d('customers', 'Your reset LaFaLaFa.com password'),
			'template' => $this->_pluginDot() . 'password_reset_request',
			'emailFormat' => CakeEmail::MESSAGE_TEXT,
			'layout' => 'default'
		);

		$options = array_merge($defaults, $options);

		if (!empty($this->request->data)) {
			$user = $this->{$this->modelClass}->passwordReset($this->request->data);

			if (!empty($user)) {

				$Email = $this->_getMailInstance();
				$Email->to($user[$this->modelClass]['email'])
					->from($options['from'])
					->emailFormat($options['emailFormat'])
					->subject($options['subject'])
					->template($options['template'], $options['layout'])
					->viewVars(array(
					'model' => $this->modelClass,
					'customers' => $this->{$this->modelClass}->data,
						'token' => $this->{$this->modelClass}->data[$this->modelClass]['password_token']))
					->send();

				if ($admin) {
					$this->Session->setFlash(sprintf(
						__d('customers', '%s has been sent an email with instruction to reset their password.'),
						$user[$this->modelClass]['email']));
					$this->redirect(array('action' => 'index', 'admin' => true));
				} else {
					$this->Session->setFlash(__d('customers', 'You should receive an email with further instructions shortly'));
					$this->redirect(array('action' => 'login'));
				}
			} else {
				$this->Session->setFlash(__d('customers', 'No user was found with that email.'));
				$this->redirect($this->referer('/'));
			}
		}
		$this->render('request_password_change');
	}

/**
 * Sets the cookie to remember the user
 *
 * @param array RememberMe (Cookie) component properties as array, like array('domain' => 'yourdomain.com')
 * @param string Cookie data keyname for the userdata, its default is "Customer". This is set to Customer and NOT using the model alias to make sure it works with different apps with different user models across different (sub)domains.
 * @return void
 * @link http://book.cakephp.org/2.0/en/core-libraries/components/cookie.html
 */
	protected function _setCookie($options = array(), $cookieKey = 'rememberMe') {
		$this->RememberMe->settings['cookieKey'] = $cookieKey;
		$this->RememberMe->configureCookie($options);
		$this->RememberMe->setCookie();
	}

/**
 * This method allows the user to change his password if the reset token is correct
 *
 * @param string $token Token
 * @return void
 */
	protected function _resetPassword($token) {
		$user = $this->{$this->modelClass}->checkPasswordToken($token);
		if (empty($user)) {
			$this->Session->setFlash(__d('customers', 'Invalid password reset token, try again.'));
			$this->redirect(array('action' => 'reset_password'));
		}

		if (!empty($this->request->data) && $this->{$this->modelClass}->resetPassword(Set::merge($user, $this->request->data))) {
			if ($this->RememberMe->cookieIsSet()) {
				$this->Session->setFlash(__d('customers', 'Password changed.'));
				$this->_setCookie();
			} else {
				$this->Session->setFlash(__d('customers', 'Password changed, you can now login with your new password.'));
				$this->redirect($this->Auth->loginAction);
			}
		}

		$this->set('token', $token);
	}

/**
 * Returns a CakeEmail object
 *
 * @return object CakeEmail instance
 * @link http://book.cakephp.org/2.0/en/core-utility-libraries/email.html
 */
	protected function _getMailInstance() {
		$emailConfig = Configure::read('Customers.emailConfig');
		if ($emailConfig) {
			return new CakeEmail($emailConfig);
		} else {
			return new CakeEmail('default');
		}
	}

/**
 * Default isAuthorized method
 *
 * This is called to see if a user (when logged in) is able to access an action
 *
 * @param array $user
 * @return boolean True if allowed
 * @link http://book.cakephp.org/2.0/en/core-libraries/components/authentication.html#using-controllerauthorize
 */
	public function isAuthorized($user = null) {
		return parent::isAuthorized($user);
	}
	
	public function payment() {
		
		#$PaymentObj	=	ClassRegistry::init('Payment');
		$this->loadModel('Payment');
        #$payments	=	$PaymentObj->find('first', array('conditions' => array('Payment.customer_id' => $this->Auth->user('id')), 'recursive' => -1 ));
        $payments	=	$this->Payment->find('first', array('conditions' => array('Payment.customer_id' => $this->Auth->user('id')), 'recursive' => -1 ));
        
		$this->set('title_for_layout','My Title');
        $this->set('description_for_layout','My page description');
        $this->set('keywords_for_layout','Keyword1,Keyword2,Keyword3');  //here you can load keywords dynamically
        
		if (!empty($this->request->data)) {
			
			$this->request->data['Payment']['customer_id']		=	$this->Auth->user('id');
			$this->request->data['Payment']['slug']				=	$this->Auth->user('slug');
			$this->request->data['Payment']['id']				=	$this->request->data['Payment']['id'];
			
			if($this->Payment->save($this->request->data, array('validates'=>true)) ) {
				$this->Session->setFlash('Your Bank details has been saved.');
                $this->redirect(array('action' => 'payment'));
            } else {
				
			if(!array_key_exists("Payment",$payments)){
				
				$payments['Payment']['customer_id']		=   "";
				$payments['Payment']['id']				=	"";
				$payments['Payment']['bank_account']	=	"";
				$payments['Payment']['bank_name']		=	"";
				$payments['Payment']['branch_name']		=	"";
				$payments['Payment']['acc_no']			=	"";
				$payments['Payment']['ifsc_code']		=	"";
				$payments['Payment']['name_on_address']	=	"";
				$payments['Payment']['address']			=	"";
				$payments['Payment']['city']			=	"";
				$payments['Payment']['state']			=	"";
				$payments['Payment']['pincode']			=	"";
				$payments['Payment']['mobile']			=	"";
			}
			$this->set(compact('payments'));
			$this->Session->setFlash(__('The Bank details could not be saved. Please, try again.'));
            }
		}
		if (!$this->request->data) {
			
			if(count($payments) == 0){
				$payments['Payment']['customer_id']		=   "";
				$payments['Payment']['id']				=	"";
				
				$payments['Payment']['bank_account']	=	"";
				$payments['Payment']['bank_name']		=	"";
				$payments['Payment']['branch_name']		=	"";
				$payments['Payment']['acc_no']			=	"";
				$payments['Payment']['ifsc_code']		=	"";
				$payments['Payment']['name_on_address']	=	"";
				$payments['Payment']['address']			=	"";
				$payments['Payment']['city']				=	"";
				$payments['Payment']['state']			=	"";
				$payments['Payment']['pincode']			=	"";
				$payments['Payment']['mobile']			=	"";
				
			}
			$this->request->data	=	$payments;
		}
		$this->set(compact('payments'));
	}

}
