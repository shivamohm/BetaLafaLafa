<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	
	Router::connect('/admin', array('controller' => 'Brands',  'action' =>'index', 'admin' => true));
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
	#Router::connect('/', array('controller' => 'users',  'login'));
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	#Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
	
	Router::Connect('/admin', array('plugin'=>'Usermgmt','controller'=>'Users', 'action'=>'login'));

Router::connect('/customers', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/index/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/:action/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/customers/:action/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/login/', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'login'));
Router::connect('/customers/logout/', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'logout'));
#Router::connect('/register/*', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'add'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
