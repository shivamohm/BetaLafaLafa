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

echo __d('customers', 'A request to reset your password was sent. To change your password click the link below.');
echo "\n";
echo "\n";
echo Router::url(array('admin' => false, 'plugin' => 'customers', 'controller' => 'customers', 'action' => 'reset_password', $token), true);

echo "\n";
echo "\n";
echo __d('customers', 'See you soon');
echo "\n";

echo __d('customers', 'LaFaLaFa Team');
