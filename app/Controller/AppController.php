<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
		var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
		public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth');
		
		function beforeFilter(){
			#$this->userAuth();
		
		if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
			$this->layout = 'admin';
		}
			
		$freeactions = array($this->request->params['controller'] .'pages/display', 'tasks/index', 'brands/index');
        $this->UserAuth->beforeFilter($this, $freeactions);
        //$this->userAuth();

        if (!empty($this->modelClass) && method_exists($this->UserAuth, 'getUser')) {
            $this->{$this->modelClass}->userInfo = $this->UserAuth->getUser();
        }

		}
		private function userAuth(){
			$this->UserAuth->beforeFilter($this);
		}
		function _flash($message,$type='message') {
			$messages = (array)$this->Session->read('Message.multiFlash');
			$messages[] = array(
				'message'=>$message,
				'layout'=>'default',
				'element'=>'default',
				'params'=>array('class'=>$type),
			);
			
			$this->Session->write('Message.multiFlash', $messages);
		}
	
}
