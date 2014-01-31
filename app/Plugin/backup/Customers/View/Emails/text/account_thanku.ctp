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

echo __d('customers', 'Congratulations  %s,', $customers[$model]['username']);
echo "\n";
echo __d('customers', "you are now part of India's smartest shopping community. 
Now every time you shop we can help you save money with our Cashback offers, Coupon codes & fantastic Restaurant deals.");
echo "\n";
#echo Router::url(array('admin' => false, 'plugin' => 'customers', 'controller' => 'customers', 'action' => 'verify', 'email', $customers[$model]['email_token']), true);
