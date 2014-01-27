<?php
Router::connect('/customers', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/index/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/:action/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/customers/customers/:action/*', array('plugin' => 'customers', 'controller' => 'customers'));
Router::connect('/login', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'logout'));
Router::connect('/register', array('plugin' => 'customers', 'controller' => 'customers', 'action' => 'add'));
