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

App::uses('CustomersController', 'Customers.Controller');
App::uses('Customer', 'Customers.Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CookieComponent', 'Controller/Component');
App::uses('SessionComponent', 'Controller/Component');
App::uses('RememberMeComponent', 'Customers.Controller/Component');
App::uses('Security', 'Utility');
app::uses('CakeEmail', 'Network/Email');

/**
 * TestUsersController
 *
 * @package users
 * @subpackage users.tests.controllers
 */
class TestCustomersController extends CustomersController {

/**
 * Name
 *
 * @var string
 */
	public $name = 'Customers';

/**
 * Models
 *
 * @var array
 */
	public $uses = array('Customers.Customer');

/**
 * beforeFilter Callback
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->authorize = array('Controller');
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
		$this->Auth->loginAction = array('controller' => 'customers', 'action' => 'login', 'plugin' => 'users');
		$this->Auth->loginRedirect = $this->Session->read('Auth.redirect');
		$this->Auth->logoutRedirect = '/';
		$this->Auth->authError = __d('customers', 'Sorry, but you need to login to access this location.');
		$this->Auth->autoRedirect = true;
		$this->Auth->userModel = 'Customer';
		$this->Auth->userScope = array(
			'OR' => array(
				'AND' =>
					array('Customer.active' => 1, 'Customer.email_verified' => 1)));
	}

/**
 * Public interface to _setCookie
 */
	public function setCookie($options = array()) {
		parent::_setCookie($options);
	}
	
/**
 * Public intefface to _getMailInstance 
 */	
	public function getMailInstance() {
		return parent::_getMailInstance();
	}

/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect URL
 *
 * @var mixed
 */
	public $redirectUrl = null;

/**
 * CakeEmail Mock
 *
 * @var object
 */
	public $CakeEmail = null;

/**
 * Override controller method for testing
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}

/**
 * Override controller method for testing
 *
 * @param string
 * @param string
 * @param string
 * @return string
 */
	public function render($action = null, $layout = null, $file = null) {
		$this->renderedView = $action;
	}

/**
 * Overriding the original method to return a mock object
 *
 * @return object CakeEmail instance
 */
	protected function _getMailInstance() {
		return $this->CakeEmail;
	}

	}

/**
 * Email configuration override for testing 
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Debug',
		'from' => 'awasthi.shivam@gmail.com',
	);

	public $another = array(
		'transport' => 'Debug',
		'from' => 'shivam.awasthi@way2online.com',
	);
}
	
	
class CustomersControllerTestCase extends CakeTestCase {

/**
 * Instance of the controller
 *
 * @var mixed
 */
	public $Users = null;

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.customers.customer',
	);

/**
 * Sampletdata used for post data
 *
 * @var array
 */
	public $usersData = array(
		'admin' => array(
			'email' => 'adminuser@cakedc.com',
			'username' => 'adminuser',
			'password' => 'test'),
		'validUser' => array(
			'email' => 'testuser@cakedc.com',
			'username' => 'testuser',
			'password' => 'secretkey',
			'redirect' => '/user/slugname'),
		'invalidUser' => array(
			'email' => 'wronguser@wronguser.com',
			'username' => 'invalidUser',
			'password' => 'invalid-password!'),
	);

/**
 * Start test
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		Configure::write('Config.language', 'eng');
		Configure::write('App.CustomerClass', null);

		$request = new CakeRequest();
		$response = $this->getMock('CakeResponse');

		$this->Users = new TestUsersController($request, $response);
		$this->Users->constructClasses();
		$this->Users->request->params = array(
			'pass' => array(),
			'named' => array(),
			'controller' => 'customers',
			'admin' => false,
			'plugin' => 'customers',
			'url' => array());

		$this->Users->CakeEmail = $this->getMock('CakeEmail');
		$this->Users->CakeEmail->expects($this->any())
			 ->method('to')
			 ->will($this->returnSelf());
		$this->Users->CakeEmail->expects($this->any())
			 ->method('from')
			 ->will($this->returnSelf());
		$this->Users->CakeEmail->expects($this->any())
			 ->method('subject')
			 ->will($this->returnSelf());
		$this->Users->CakeEmail->expects($this->any())
			 ->method('template')
			 ->will($this->returnSelf());
		$this->Users->CakeEmail->expects($this->any())
			 ->method('viewVars')
			 ->will($this->returnSelf());
		$this->Users->CakeEmail->expects($this->any())
			 ->method('emailFormat')
			 ->will($this->returnSelf());

		$this->Users->Components->disable('Security');
	}

/**
 * Test controller instance
 *
 * @return void
 */
	public function testUsersControllerInstance() {
		$this->assertInstanceOf('CustomersController', $this->Users);
	}

/**
 * Test the user login
 *
 * @return void
 */
	public function testUserLogin() {
		$this->Customers->request->params['action'] = 'login';
 		$this->__setPost(array('Customer' => $this->usersData['admin']));
		$this->Customers->request->url = '/customers/customers/login';
 		
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Customers->Auth = $this->getMock('AuthComponent', array('login', 'customer', 'redirect'), array($this->Collection));
		$this->Customers->Auth->expects($this->once())
			->method('login')
			->will($this->returnValue(true));
		$this->Customers->Auth->staticExpects($this->at(0))
			->method('customer')
			->with('last_login')
			->will($this->returnValue(1));
		$this->Customers->Auth->staticExpects($this->at(1))
			->method('customer')
			->with('id')
			->will($this->returnValue(1));
		$this->Customers->Auth->staticExpects($this->at(2))
			->method('customer')
			->with('username')
			->will($this->returnValue('adminuser'));
		$this->Customers->Auth->expects($this->once())
			->method('redirect')
			->with(null)
			->will($this->returnValue(Router::normalize('/')));
		$this->Customers->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Users->Session->expects($this->any())
			->method('setFlash')
			->with(__d('customers', 'adminuser you have successfully logged in'));
		$this->Customers->RememberMe = $this->getMock('RememberMeComponent', array(), array($this->Collection));
		$this->Customers->RememberMe->expects($this->any())
			->method('destroyCookie');

		$this->Customers->login();
		$this->assertEqual(Router::normalize($this->Customers->redirectUrl), Router::normalize(Router::url($this->Customers->Auth->loginRedirect)));
	}
	
/**
 * We should not see any flash message if we GET the login action
 */	
	public function testUserLoginGet() {
		// test with the login action
		$this->Users->request->url = '/customers/customers/login';
		$this->Users->request->params['action'] = 'login';
		$this->__setGet();
 		
		$this->Users->login();
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Users->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Users->Session->expects($this->never())
			->method('setFlash');
	}

/**
 * testFailedUserLogin
 *
 * @return void
 */
	public function testFailedUserLogin() {
		$this->Users->request->params['action'] = 'login';
		$this->__setPost(array('Customer' => $this->usersData['invalidUser']));
 		
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Users->Auth = $this->getMock('AuthComponent', array('flash', 'login'), array($this->Collection));
		$this->Users->Auth->expects($this->once())
			->method('login')
			->will($this->returnValue(false));
		$this->Users->Auth->expects($this->once())
			->method('flash')
			->with(__d('customers', 'Invalid e-mail / password combination.  Please try again'));
		$this->Users->login();
	}

/**
 * Test user registration
 *
 */
	public function testAdd() {
		$this->Users->CakeEmail->expects($this->at(0))
			->method('send');

		$_SERVER['HTTP_HOST'] = 'test.com';
		$this->Users->params['action'] = 'add';
		$this->__setPost(array(
			'Customer' => array(
				'username' => 'newUser',
				'email' => 'newUser@newemail.com',
				'password' => 'password',
				'temppassword' => 'password',
				'tos' => 1)));
		$this->Users->beforeFilter();
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Users->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Users->Session->expects($this->once())
			->method('setFlash')
			->with(__d('customers', 'Your account has been created. You should receive an e-mail shortly to authenticate your account. Once validated you will be able to login.'));

		$this->Users->add();

		$this->__setPost(array(
			'Customer' => array(
				'username' => 'newUser',
				'email' => '',
				'password' => '',
				'temppassword' => '',
				'tos' => 0)));
		$this->Users->beforeFilter();
		$this->Users->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Users->Session->expects($this->once())
			->method('setFlash')
			->with(__d('customers', 'Your account could not be created. Please, try again.'));
		$this->Users->add();
	}

/**
 * Test
 *
 * @return void
 */
	public function testVerify() {
		$this->Customers->beforeFilter();
		$this->Customers->Customer->id = '37ea303a-3bdc-4251-b315-1316c0b300fa';
		$this->Customers->Customer->saveField('email_token_expires', date('Y-m-d H:i:s', strtotime('+1 year')));
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Customers->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Customers->Session->expects($this->once())
			->method('setFlash')
			->with(__d('customers', 'Your e-mail has been validated!'));

		$this->Customers->verify('email', 'testtoken2');

		$this->Customers->beforeFilter();
		$this->Customers->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Customers->Session->expects($this->once())
			->method('setFlash')
			->with(__d('customers', 'Invalid token, please check the email you were sent, and retry the verification link.'));

		$this->Customers->verify('email', 'invalid-token');;
	}

/**
 * Test logout
 *
 * @return void
 */
	public function testLogout() {
		$this->Customers->beforeFilter();
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Customers->Cookie = $this->getMock('CookieComponent', array('destroy'), array($this->Collection));
		$this->Customers->Cookie->expects($this->once())
			->method('destroy');
		$this->Customers->Session = $this->getMock('SessionComponent', array('setFlash'), array($this->Collection));
		$this->Customers->Session->expects($this->once())
			->method('setFlash')
			->with(__d('users', 'testuser you have successfully logged out'));
		$this->Customers->Auth = $this->getMock('AuthComponent', array('logout', 'customer'), array($this->Collection));
		$this->Customers->Auth->expects($this->once())
			->method('logout')
			->will($this->returnValue('/'));
		$this->Customers->Auth->staticExpects($this->at(0))
			->method('user')
			->will($this->returnValue($this->customersData['validCustomer']));
		$this->Customers->RememberMe = $this->getMock('RememberMeComponent', array(), array($this->Collection));
		$this->Customers->RememberMe->expects($this->any())
			->method('destroyCookie');

		$this->Customers->logout();
		$this->assertEqual($this->Customers->redirectUrl, '/');
	}

/**
 * testIndex
 *
 * @return void
 */
	public function testIndex() {
		$this->Customers->passedArgs = array();
 		$this->Customers->index();
		$this->assertTrue(isset($this->Users->viewVars['customer']));
	}

/**
 * testView
 *
 * @return void
 */
	public function testView() {
 		$this->Customers->view('admincustomer');
		$this->assertTrue(isset($this->Customers->viewVars['customer']));

		$this->Customers->view('INVALID-SLUG');
		$this->assertEqual($this->Customers->redirectUrl, '/');
	}

/**
 * change_password
 *
 * @return void
 */
	public function testChangePassword() {
		$this->Collection = $this->getMock('ComponentCollection');
		$this->Customers->Auth = $this->getMock('AuthComponent', array('customer'), array($this->Collection));
		$this->Customers->Auth->staticExpects($this->once())
				->method('customer')
				->with('id')
				->will($this->returnValue(1));
		$this->__setPost(array(
			'Customer' => array(
				'new_password' => 'newpassword',
				'confirm_password' => 'newpassword',
				'old_password' => 'test')));
		$this->Customers->RememberMe = $this->getMock('RememberMeComponent', array(), array($this->Collection));
		$this->Customers->RememberMe->expects($this->any())
			->method('destroyCookie');

		$this->Customers->change_password();
		$this->assertEqual($this->Customers->redirectUrl, '/');
	}

/**
 * testResetPassword
 *
 * @return void
 */
	public function testResetPassword() {
		$this->Customers->CakeEmail->expects($this->at(0))
			->method('send');

		$_SERVER['HTTP_HOST'] = 'test.com';
		$this->Customers->Customer->id = '1';
		$this->Customers->Customer->saveField('email_token_expires', date('Y-m-d H:i:s', strtotime('+1 year')));
		$this->Customers->data = array(
			'Customer' => array(
				'email' => 'adminuser@cakedc.com'));
		$this->Customers->reset_password();
		$this->assertEqual($this->Customers->redirectUrl, array('action' => 'login'));


		$this->Customers->data = array(
			'Customer' => array(
				'new_password' => 'newpassword',
				'confirm_password' => 'newpassword'));
		$this->Customers->reset_password('testtoken');
		$this->assertEqual($this->Customers->redirectUrl, $this->Customers->Auth->loginAction);
	}

/**
 * testAdminIndex
 *
 * @return void
 */
	public function testAdminIndex() {
		$this->Customers->params = array(
			'url' => array(),
			'named' => array(
				'search' => 'admincustomer'));
		$this->Customers->passedArgs = array();
 		$this->Customers->admin_index();
		$this->assertTrue(isset($this->Customers->viewVars['customers']));
	}

/**
 * testAdminView
 *
 * @return void
 */
	public function testAdminView() {
 		$this->Customers->admin_view('1');
		$this->assertTrue(isset($this->Customers->viewVars['customer']));
	}

/**
 * testAdminDelete
 *
 * @return void
 */
	public function testAdminDelete() {
		$this->Customers->Customer->id = '1';
		$this->assertTrue($this->Customers->Customer->exists(true));
		$this->Customers->admin_delete('1');
		$this->assertEqual($this->Customers->redirectUrl, array('action' => 'index'));
		$this->assertFalse($this->Customers->Customer->exists(true));

		$this->Customers->admin_delete('INVALID-ID');
		$this->assertEqual($this->Customers->redirectUrl, array('action' => 'index'));
	}

/**
 * Test setting the cookie
 *
 * @return void
 */
	public function testSetCookie() {
		$this->__setPost(array(
			'Customer' => array(
				'remember_me' => 1,
				'email' => 'testuser@cakedc.com',
				'username' => 'test',
				'password' => 'testtest')));

		$this->Collection = $this->getMock('ComponentCollection');
		$this->Customers->RememberMe = $this->getMock('RememberMeComponent', array(), array($this->Collection));
		$this->Customers->RememberMe->expects($this->once())
			->method('configureCookie')
			->with(array('name' => 'customerTestCookie'));
		$this->Customers->RememberMe->expects($this->once())
			->method('setCookie');

		$this->Customers->setCookie(array(
			'name' => 'customerTestCookie'));

		$this->assertEqual($this->Customers->RememberMe->settings['cookieKey'], 'rememberMe');
	}

/**
 * Test getting default and setted email instance config
 *
 * @return void
 */
	public function testGetMailInstance() {
		$defaultConfig = $this->Users->getMailInstance()->config();
		$this->assertEqual($defaultConfig['from'], 'default@example.com');
		
		Configure::write('Customers.emailConfig', 'another');
		$anotherConfig = $this->Customers->getMailInstance()->config();
		$this->assertEqual($anotherConfig['from'], 'another@example.com');
		
		$this->setExpectedException('ConfigureException');
		Configure::write('Customers.emailConfig', 'doesnotexist');
		$anotherConfig = $this->Customers->getMailInstance()->config();
	}

/**
 * Test
 *
 * @return void
 */
	private function __setPost($data = array()) {
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$this->Customers->request->data = array_merge($data, array('_method' => 'POST'));
	}

/**
 * Test
 *
 * @return void
 */
	private function __setGet() {
		$_SERVER['REQUEST_METHOD'] = 'GET';
	}

/**
 * Test
 *
 * @return void
 */
	public function endTest($method) {
		$this->Customers->Session->destroy();
		unset($this->Customers);
		ClassRegistry::flush();
	}

}
