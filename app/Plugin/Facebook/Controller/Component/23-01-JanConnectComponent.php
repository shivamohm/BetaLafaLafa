<?php
/**
* Facebook.Connect
* Uses the Facebook Connect API to log in a user through the Auth Component.
*
* The user MUST create a new field in their user model called 'facebook_id'
*
* @author Nick Baker <nick [at] webtechnick [dot] come>
* @link http://www.webtechnick.com
* @since 3.1.0
* @license MIT
*/
App::uses('FB', 'Facebook.Lib');
App::uses('FacebookInfo', 'Facebook.Lib');
class ConnectComponent extends Component {
	
	/**
	* uid is the Facebook ID of the connected Facebook user, or null if not connected
	*/
	public $uid = null;
	
	/**
	* me is the Facebook user object for the connected Facebook user
	*/
	public $me = null;
	
	/**
	* hasAccount is true if the connected Facebook user has an account in your application
	*/
	public $hasAccount = false;
	
	/**
	* The authenticated User using Auth
	*/
	public $authUser = null;
	
	/**
	* No Auth, if set to true, syncFacebookUser will NOT be called
	*/
	public $noAuth = false;
	
	/**
	* Error log
	*/
	public $errors = array();
	
	/**
	* createUser is true you want the component to attempt to create a CakePHP Auth user
	* account by introspection on the Auth component.  If false, you can use $this->hasAccount
	* as a reference to decide what to do with that user. (default true)
	*/
	#public $createUser = true;
	public $createUser = "Customer";
	
	/**
	* name of the authentication model, false by default,
	* set to model alias to init the model.
	*/
	#public $model = false;
	public $model = 'Customer';

	/**
	* name of the plugin containing the authentication model, if any; false by default.
	*/
	public $plugin = false;
	#public $plugin = 'Customer';
	
	/**
	* Fields for the model if you want to save the Auth component.
	*/
	public $modelFields = array(
		'password' => 'password',
		'slug' => 'slug',
		'first_name' => 'first_name',
		'last_name'		=> 'last_name',
		'birthday' => 'birthday',
		'email' => 'email',
		'email_verified'		=> 'email_verified',
		'username' => 'username'
	);
	
	/**
	* Initialize, load the api, decide if we're logged in
	* Sync the connected Facebook user with your application
	* @param controller object to attach to
	* @param settings for Connect
	* @return void
	* @access public
	*/
	public function initialize(Controller $controller, $settings = array()){
		$this->Controller = $controller;
		$this->_set($settings);
		$this->FB = new FB();
		#$session = $this->FB->getSession();
		#$userInfo = $this->FB->api('/me');
		$this->uid = $this->FB->getUser();
		pr($_SESSION);
		#pr($userInfo);
		
	}
	
	/**
	* Sync the connected Facebook user with your application.
	*
	* Attempt to authenticate user using Facebook.
	* Currently the uid is fetched from $this->uid
	*
	* @param controller object to attach to
	* @return void
	*/
	public function startup(Controller $controller) {
		
		
		
		// Prevent using Auth component only if there is noAuth setting provided
		if (!$this->noAuth && !empty($this->uid)) {
			$this->__syncFacebookUser();
		}
	}
	
	/**
	* Get registration Data
	* @return associative array of registration data (if there is any)
	*/
	function registrationData(){
		
		if(isset($this->Controller->request->data['signed_request'])){
			
			return FacebookInfo::parseSignedRequest($this->Controller->request->data['signed_request']);
		}
		return array();
	}
	
	/**
	* Sync the connected Facebook user.
	*
	* If User is logged in:
	*  a. but doesn't have a faceb $session = $Fb->getSession();ook account associated, try to associate it.
	*
	* If User is not logged in:
	*  b. but have a facebook account associated, try to log the user in.
	*  c. and doesn't have a facebook account associated,
	*    1. try to automatically create an account and associate it (if $this->createUser).
	*    2. try to log the user in, afterwards.
	*
	* @return boolean True if successful, false otherwise.
	*/
	private function __syncFacebookUser(){
		$logout = false;
		if($this->Controller->params['action'] == 'logout'){
				$this->Controller->Session->delete('FB');
                $this->uid = null;
                $this->Controller->Session->delete('Auth.User');
                unset($_SESSION['Auth']);
                unset($_SESSION['fb_586035074814973_user_id']);
                #$this->Auth->logoutRedirect = array('action' => 'login');
                $this->Controller->Auth->logoutRedirect = array('action' => 'login');
				$logout = true;        
			}
                
	/*	
		if($this->Controller->params['action'] == 'logout')
            {
		$this->user('id');
                $this->Controller->Session->delete('FB');
                $this->uid = null;
                $this->Controller->Session->delete('Auth.User');
			$this->authUser = null; 
		#$this->Controller->Auth->logout();
		#$this->user();
	}
            else
            {
            if(!isset($this->Controller->Auth)){
            return false;
			}
	}*/
	
	
		
		if(!isset($this->Controller->Auth)){
			return false;
		}
		
		// set Auth to a convenience publiciable
		$Auth = $this->Controller->Auth;
		
		if (!$this->__initUserModel()) {
			return false;
		}
		
		// if you don't have a facebook_id field in your user table, throw an error
		
		
		/*
		if(!$this->Customer->hasField('facebook_id')){
			$this->__error("Facebook.Connect handleFacebookUser Error.  facebook_id not found in {$Auth->userModel} table.");
			return false;
		}*/
		
		// check if the user already has an account
		// User is logged in but doesn't have a 
		
	if(!$logout){	
		if($Auth->user('id')){
			
			$this->hasAccount = true;
			#echo $this->Customer->primaryKey;
			
			$this->Customer->id = $Auth->user($this->Customer->primaryKey);
			if (!$this->Customer->field('facebook_id')) {
				$this->Customer->saveField('facebook_id', $this->uid);
			}
			return true;
		} 
		else {
		
			// attempt to find the user by their facebook id
			$this->authUser = $this->Customer->findByFacebookId($this->uid);
			
			
			#$this->Customer = ClassRegistry::init('Customer');
			#$this->authUser	=	$this->Customer->find('first', array('conditions' => array('Customer.facebook_id' => $this->uid), 'recursive' => -1 ));
			//if we have a user, set hasAccount
			
			if(!empty($this->authUser)){
				$this->hasAccount = true;
			}
			//create the user if we don't have one
			elseif(empty($this->authUser) && $this->createUser) {
				#echo "enter herer";
				#pr($this->model);
				#pr($this->modelFields);
				
				#pr($this->Controller->Session->read('FB.Me'));
				
				$FbSessionRead	=	$this->Controller->Session->read('FB.Me');
				
				#exit;
				
				#echo "--9711SHivam---------------____<br>";
				#pr($Auth);
				#pr($this->Controller['viewVars']);
				
				#exit;
			
				$this->authUser[$this->Customer->alias]['facebook_id'] = $this->uid;
				$this->authUser[$this->Customer->alias][$this->modelFields['password']] 	= 	Security::hash(FacebookInfo::randPass());
				$this->authUser[$this->Customer->alias][$this->modelFields['email']] 		=	$FbSessionRead['email'];
				$this->authUser[$this->Customer->alias][$this->modelFields['username']] 	=	$FbSessionRead['username'];
				$this->authUser[$this->Customer->alias][$this->modelFields['slug']] 		=	$FbSessionRead['username'];
				$this->authUser[$this->Customer->alias][$this->modelFields['first_name']] 	=	$FbSessionRead['first_name'];
				$this->authUser[$this->Customer->alias][$this->modelFields['last_name']] 	=	$FbSessionRead['last_name'];

				$this->authUser[$this->Customer->alias][$this->modelFields['email_verified']] 	=	1;


				if($this->__runCallback('beforeFacebookSave')){
					$this->hasAccount = ($this->Customer->save($this->authUser, array('validate' => false)));
				}
				else {
					$this->authUser = null;
				}
			}
			
			//Login user if we have one
			if($this->authUser){
				$this->__runCallback('beforeFacebookLogin', $this->authUser);
				$Auth->authenticate = array(
					'Form' => array(
						'fields' => array('username' => 'facebook_id', 'password' => $this->modelFields['password'])
					)
				);
				list($plugin, $class) = pluginSplit($this->model, true);
				if($Auth->login($this->authUser[$class])){
					$this->__runCallback('afterFacebookLogin');
				}
			}
			
			return true;
		}
	}
	}
	
	/**
	* Read the logged in user
	* @param field key to return (xpath without leading slash)
	* @param mixed return
	*/
	public function user($field = null){
		if(isset($this->uid)){
			if($this->Controller->Session->read('FB.Me') == null){
				$this->Controller->Session->write('FB.Me', $this->FB->api('/me'));
			}
			$this->me = $this->Controller->Session->read('FB.Me');
		} 
		else {
		echo "Shivam";
			$this->Controller->Session->delete('Auth.User');
			$this->Controller->Session->delete('FB');
		}
		
		if(!$this->me){
			return null;
		}
		
		if($field){
			$retval = Set::extract("/$field", $this->me);
			return empty($retval) ? null : $retval[0];
		}
		
		return $this->me;
	}

	/**
	 * Get the current logged in user's developer role for the application (administrators, developers, testers, insight users)
	 */ 
	public function role() 
	{
		$role = "";
		$user_id = $this->uid;

		$all_roles = $this->roles();

		if( isset($all_roles) && $all_roles )
		{
			$all_roles = $all_roles->data;

			for( $i=0; $i < count($all_roles); $i++ )
			{
				$roleObj = $all_roles[$i];
				if( $roleObj->user == $user_id )
				{
					$role = $roleObj->role;
					break;
				}
			}
		}

		

		return $role;

	}

	/**
	 * Get the developer roles for the application.  Returns an object 
	 * Example return:
	 *	 object(stdClass)[50]
	 *		  public 'data' => 
	 *		    array
	 *		      0 => 
	 *		        object(stdClass)[51]
	 *		          public 'app_id' => string '1234567890123' (length=15)
	 *		          public 'user' => string '10000123456789' (length=15)
	 *		          public 'role' => string 'developers' (length=10)
	 *		      1 => 
	 *		        object(stdClass)[52]
	 *		          public 'app_id' => string '1234567890123' (length=15)
	 *		          public 'user' => string '10000987654321' (length=15)
	 *		          public 'role' => string 'administrators' (length=14)
	 */
	public function roles() 
	{
		$app_id = Configure::read('Facebook.appId');
        $app_secret = Configure::read('Facebook.secret');

		// Query app access token
		$app_access_token = file_get_contents(
		  'https://graph.facebook.com/oauth/access_token?' .
		  'client_id='.$app_id.'&client_secret='.$app_secret.'&' .
		  'grant_type=client_credentials');

		// Query app developer roles
		$roles = json_decode(file_get_contents(
		  'https://graph.facebook.com/'.$app_id.'/roles?' .
		  $app_access_token
		));

		return $roles;
	}
	
	/**
	* Run the callback if it exists
	* @param string callback
	* @param mixed passed in publiciable (optional)
	* @return mixed result of the callback function
	*/ 
	private function __runCallback($callback, $passedIn = null){
		if(method_exists($this->Controller, $callback)){
			return call_user_func_array(array($this->Controller, $callback), array($passedIn));
		}
		return true;
	}
	
	/**
	* Initialize the actual User model object defined by the plugin
	* @return true if successful
	* @access private
	*/
	private function __initUserModel(){
		
		
		
		if($this->model){
			$plugin = '';
			if ($this->plugin) {
				$plugin = $this->plugin.'.';
			}
			
			
			
			App::uses($this->model, $plugin.'Model');
			$this->Customer = ClassRegistry::init($plugin.$this->model);
		}
		if (isset($this->Customer)) {
			$this->Customer->recursive = -1;
			return true;
		}
		return false;
	}
	
	/**
	* Handle errors.
	* @param string of error message
	* @return void
	* @access private
	*/
	private function __error($msg){
		$this->errors[] = __($msg, true);
	}
}
