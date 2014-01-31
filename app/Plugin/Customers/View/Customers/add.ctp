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
?>

<?php echo $this->element('Customers.Customers/sidebar'); ?>
<div class="customers index form">
	<h2><?php echo __d('customers', "Join India's No.1 Offers site for Free"); ?></h2>
	<fieldset>
		<?php
			echo $this->Form->create($model);
			echo $this->Form->input('username', array('label' => __d('customers', 'User Name')));
			echo $this->Form->input('email_verified', array('value'=>'1','type' =>'hidden'));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'E-mail (used as login)'), 'error' => array('isValid' => __d('users', 'Must be a valid email address'),	'isUnique' => __d('customers', 'An account with that email already exists'))));
			echo $this->Form->input('password', array( 'label' => __d('customers', 'Password'),	'type' => 'password'));
			echo $this->Form->input('temppassword', array('label' => __d('customers', 'Password (confirm)'), 'type' => 'password'));
			$tosLink = $this->Html->link(__d('customers', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos', 'plugin' => null));
			echo $this->Form->input('tos', array('checked'=>true,'label' => __d('customers', 'I have read and agreed to ') . $tosLink));
			echo "<div style='padding-right:190px; '>". $this->Form->end(__d('customers', 'Save'))."</div>";
			
echo $this->Facebook->login(array('img' => 'connectwithfacebook.gif', 
     'redirect' => array('controller' => 'customers', 'action' => 'index'),'perms' => 'email,publish_stream,publish_actions'));
		?>
	</fieldset>
</div>

