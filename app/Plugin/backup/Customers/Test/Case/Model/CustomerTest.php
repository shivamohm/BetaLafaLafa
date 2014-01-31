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

/**
 * UserTestCase
 *
 * @package users
 * @subpackage users.tests.cases.models
 */
class CustomerTestCase extends CakeTestCase {

/**
 * User model instance
 *
 * @var mixed
 */
	public $User = null;

/**
 * Plugin name
 *
 * @var string
 */
	public $plugin = 'Customers';

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.customers.customer',
	);

/**
 * startTest
 *
 * @return void
 */
	public function setUp() {
		Configure::write('App.CustomerClass', null);
		$this->User = ClassRegistry::init('Customers.Customer');
	}

/**
 * endTest
 *
 * @return void
 */
	public function tearDown() {
		parent::tearDown();
		unset($this->User);
		ClassRegistry::flush(); 
	}

/**
 * 
 *
 * @return void
 */
	public function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'Customer'));
	}

/**
 * Test to compare the passwords when a user adds
 *
 * @return void
 */
	public function testConfirmPassword() {
		$this->User->data['Customer']['password'] = 'password';
		$result = $this->User->confirmPassword(array('temppassword' => 'password'));
		$this->assertTrue($result);

		$this->User->data['Customer']['password'] = 'different_password';
		$result = $this->User->confirmPassword(array('temppassword' => 'password'));
		$this->assertFalse($result);
	}

/**
 * testValidateEmailConfirmation
 *
 * @return void
 */
	public function testConfirmEmail() {
		$this->User->data['Customer'] = array(
			'email' => 'test@email.com');
		$this->assertFalse($this->User->confirmEmail(array('confirm_email' => 'test@wrong.com')));

		$this->User->data['Customer'] = array(
			'email' => 'test@email.com');
		$this->assertTrue($this->User->confirmEmail(array('confirm_email' => 'test@email.com')));
	}

/**
 * Test if the generated token is a string
 *
 * @return void
 */
	function testGenerateToken() {
		$result = $this->Customer->generateToken();
		$this->assertInternalType('string', $result);
	}

/**
 * testValidateToken
 *
 * @return void
 */
	function testValidateToken() {
		$result = $this->Customer->validateToken('no valid token');
		$this->assertFalse($result);

		$now = strtotime('2008-03-25 02:48:46');
		$result = $this->Customer->validateToken('testtoken2', false, $now);
		$this->assertInternalType('array', $result);

		$now = strtotime('2008-03-29 02:48:46');
		$result = $this->Customer->validateToken('testtoken2', false, $now);
		$this->assertFalse($result);
	}

/**
 * testUpdateLastActivity
 *
 * @return void
 */
	public function testUpdateLastActivity() {
		$id = 1;
		$this->Customer->id = $id;
		$lastDate = $this->Customer->field('last_action');
		$result = $this->Customer->updateLastActivity($id);
		$this->assertTrue(is_array($result));
		$this->Customer->id = $id;
		$newDate = $result['Customer']['last_action'];
		$this->assertTrue($lastDate < $newDate);
		$this->assertFalse($this->Customer->updateLastActivity('invalid-id!'));
	}

/**
 * testResetPassword
 *
 * @return void
 */
	public function testResetPassword() {
		$data = array(
			'Customer' => array(
				'id' => 1,
				'new_password' => '',
				'confirm_password' => 'dsgdsgsdg'));
		$this->assertFalse($this->Customer->resetPassword($data));

		$data = array(
			'Customer' => array(
				'id' => 1,
				'new_password' => '',
				'confirm_password' => ''));
		$this->assertFalse($this->Customer->resetPassword($data));

		$data = array(
			'Customer' => array(
				'id' => 1,
				'new_password' => 'newpassword',
				'confirm_password' => 'newpassword'));
		$this->assertInternalType('array', $this->Customer->resetPassword($data));
	}

/**
 * testCheckPasswordToken
 *
 * @return void
 */
	public function testCheckPasswordToken() {
		$this->Customer->id = '1';
		$this->Customer->saveField('email_token_expires', date('Y-m-d H:i:s', strtotime('+1 year')));
		$this->assertInternalType('array', $this->Customer->checkPasswordToken('testtoken'));
		$this->assertFalse($this->Customer->checkPasswordToken('something-wrong-here'));
	}

/**
 * testPasswordReset
 *
 * @return void
 */
	public function testPasswordReset() {
		$data = array(
			'Customer' => array(
				'id' => 1,
				'email' => 'somethingwrong in here!'));
		$this->assertFalse($this->Customer->passwordReset($data));

		$this->Customer->id = '1';
		$this->Customer->saveField('email_token_expires', date('Y-m-d H:i:s', strtotime('+1 year')));
		$data = array(
			'Customer' => array(
				'id' => 1,
				'email' => 'adminuser@cakedc.com'));
		$this->assertInternalType('array', $this->Customer->passwordReset($data));
	}

/**
 * testValidateOldPassword
 *
 * @return void
 */
	public function testValidateOldPassword() {
		$password = $this->Customer->hash('password', null, true);
		$this->Customer->id = '1';
		$this->Customer->saveField('password', $password);
		$this->Customer->data = array(
			'Customer' => array(
				'id' => '1',
				'password'));

		$result = $this->Customer->validateOldPassword(array('old_password' => 'password'));
		$this->assertTrue($result);

		$result = $this->Customer->validateOldPassword(array('old_password' => 'FAIL!'));
		$this->assertFalse($result);
	}

/**
 * testView
 *
 * @return void
 */
	public function testView() {
		$result = $this->Customer->view('adminuser');
		$this->assertTrue(is_array($result) && !empty($result));

		$this->expectException('OutOfBoundsException');
		$result = $this->Customer->view('non-existing-user-slug');
	}

/**
 * Test the user registration method
 *
 * @return void
 */
	public function testRegister() {
		$postData = array();
		$result = $this->Customer->register($postData);
		$this->assertFalse($result);

		$postData = array('Customer' => array(
			'username' => '#236236326sdg!!!.s#invalid',
			'email' => 'invalid',
			'password' => 'password',
			'temppassword' => 'wrong',
			'tos' => 0));
		$result = $this->Customer->register($postData);
		$this->assertFalse($result);
		$this->assertEqual(array_keys($this->Customer->invalidFields()), array(
			'username', 'email', 'temppassword', 'tos'));

		$postData = array('Customer' => array(
			'username' => 'validusername',
			'email' => 'test@test.com',
			'password' => '12345',
			'temppassword' => '12345',
			'tos' => 1));
		$result = $this->Customer->register($postData);
		$this->assertFalse($result);
		$this->assertEqual(array_keys($this->Customer->invalidFields()), array(
			'password'));

		$postData = array('Customer' => array(
			'username' => 'imanewuser',
			'email' => 'foo@bar.com',
			'password' => 'password',
			'temppassword' => 'password',
			'tos' => 1));
		$result = $this->Customer->register($postData, array('returnData' => false));
		$this->assertTrue($result);
		$result = $this->Customer->data;

		$this->assertEqual($result['Customer']['active'], 1);
		$this->assertEqual($result['Customer']['password'], $this->Customer->hash('password', 'sha1', true));
		$this->assertTrue(is_string($result['User']['email_token']));

		$result = $this->Customer->findById($this->Customer->id);
		$this->assertEqual($result['Customer']['id'], $this->Customer->id);
	}

/**
 * testChangePassword
 *
 * @return void
 */
	public function testChangePassword() {
		$postData = array();
		$result = $this->Customer->changePassword($postData);
		$this->assertFalse($result);

		$postData = array(
			'Customer' => array(
				'id' => 1,
				'old_password' => 'test',
				'new_password' => 'not',
				'confirm_password' => 'equal'));

		$result = $this->Customer->changePassword($postData);
		$this->assertFalse($result);
		$this->assertEqual(array('new_password', 'confirm_password'), array_keys($this->Customer->invalidFields()));

		$postData = array(
			'Customer' => array(
				'id' => 1,
				'old_password' => 'test',
				'new_password' => 'testtest',
				'confirm_password' => 'testtest'));
		$result = $this->Customer->changePassword($postData);
		$this->assertTrue($result);
		$ressult = $this->Customer->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Customer.id' => 1)));
		$this->assertEqual($ressult['Customer']['password'], $this->Customer->hash('testtest', null, true));
	}

/**
 * Test validation method to compare two fields
 *
 * @return void
 */
	public function testCompareFields() {
		$this->Customer->data = array(
			'Customer' => array(
				'field1' => 'foo',
				'field2' => 'bar'));
		$this->assertFalse($this->Customer->compareFields('field1', 'field2'));

		$this->Customer->data = array(
			'Customer' => array(
				'field1' => 'foo',
				'field2' => 'foo'));
		$this->assertTrue($this->Customer->compareFields('field1', 'field2'));
	}

/**
 * Test resending of the email authentication 
 *
 * @return void
 */
	public function testResendVerification() {
		$postData = array(
			'Customer' => array());
		$this->assertFalse($this->Customer->resendVerification($postData));

		$postData = array(
			'Customer' => array(
				'email' => 'doesnotexist!'));
		$this->assertFalse($this->Customer->resendVerification($postData));

		$postData = array(
			'Customer' => array(
				'email' => 'adminuser@cakedc.com'));
		$this->assertFalse($this->Customer->resendVerification($postData));

		$postData = array(
			'Customer' => array(
				'email' => 'oidtest2@testuser.com'));
		$result = $this->Customer->resendVerification($postData);
		$this->assertTrue(is_array($result));
	}

/**
 * Test resending of the email authentication 
 *
 * @return void
 */
	public function testGeneratePassword() {
		$result = $this->Customer->generatePassword();
		$this->assertInternalType('string', $result);
		$this->assertEqual(strlen($result), 10);

		$result = $this->Customer->generatePassword(15);
		$this->assertInternalType('string', $result);
		$this->assertEqual(strlen($result), 15);
	}

/**
 * testDelete
 *
 * @return void
 */
	public function testDelete() {
		$this->Customer->id = '1';
		$this->assertTrue($this->Customer->exists());
		$this->assertTrue($this->Customer->delete('1'));
		$this->assertFalse($this->Customer->exists());
	}

/**
 * testAdd
 *
 * @return void
 */
	public function testAdd() {
		$postData = array(
			'Customer' => array(
				'username' => 'newusername',
				'email' => 'newusername@newusername.com',
				'password' => 'password',
				'temppassword' => 'password',
				'tos' => 1));
		$result = $this->Customer->add($postData);
		$this->assertTrue($result);
	}

/**
 * testEdit
 *
 * @return void
 **/
	public function testEdit() {
		$userId = '1';
		$data = $this->Customer->read(null, $userId);
		$data['Customer']['email'] = 'anotherNewEmail@anothernewemail.com';

		$result = $this->Customer->edit(1, $data);
		$this->assertTrue($result);

		$result = $this->Customer->read(null, 1);
		$this->assertEqual($result['Customer']['username'], $data['User']['username']);
		$this->assertEqual($result['Customer']['email'], $data['User']['email']);
	}
	
/**
 * testEditException
 *
 * @return void
 */
	public function testEditException() {
		$this->setExpectedException('OutOfBoundsException');
		$userId = '1';
		$data = $this->Customer->read(null, $userId);
		$data['Customer']['email'] = 'anotherNewEmail@anothernewemail.com';
		$this->Customer->edit('bogus id', $userId, $data);
	}

/**
 * testDisableSlugs
 *
 * @return void
 */
	public function testDisableSlugs() {
		ClassRegistry::flush();
		$this->Customer = ClassRegistry::init('Customers.Customer');
		$this->Customer->create();
		$this->Customer->save(array(
			'username' => 'foo2'), array('validate' => false));
		$result = $this->Customer->read(null, $this->User->id);
		$this->assertEquals($result['Customer']['slug'], 'foo2');

		ClassRegistry::flush();
		Configure::write('Customers.disableSlugs', true);
		$this->Customer = ClassRegistry::init('Customers.Customer');
		$this->Customer->create();
		$this->Customer->save(array(
			'username' => 'bar2'), array('validate' => false));
		$result = $this->Customer->read(null, $this->Customer->id);
		$this->assertTrue(empty($result['Customer']['slug']));
	}

}
