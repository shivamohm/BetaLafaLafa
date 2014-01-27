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

echo __d('customers', 'Your password has been reset');
echo __d('customers', 'Please login using this password and change your password');

echo "\n";
__d('customers', 'Your new password is: %s', $customers[$model]['new_password']);

