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
<div class="customers form">
	<h2><?php echo __d('customers', 'Resend the Email Verification'); ?></h2>
	<p><?php echo __d('customers', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p>
	<?php
	echo $this->Form->create($model, array(
		'url' => array(
			'admin' => false,
			'action' => 'resend_verification')));
	echo $this->Form->input('email', array(
		'label' => __d('customers', 'Your Email')));
	echo $this->Form->submit(__d('customers', 'Submit'));
	echo $this->Form->end();
	?>
</div>
<?php echo $this->element('Customers.Customers/sidebar'); ?>
