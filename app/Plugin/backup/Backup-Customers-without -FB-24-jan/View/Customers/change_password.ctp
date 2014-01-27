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
<div class="customers form">
	<?php 		echo $this->Form->create($model, array('action' => 'change_password')); ?>
	<fieldset>
			<legend><?php echo __d('customers', 'Change your password'); ?></legend>
			<h2> <p><?php echo __d('customers', 'Please enter your old password because of security reasons and then your new password twice.'); ?></p>	</h2>
			<?php
				echo $this->Form->input('old_password', array('label' => __d('customers', 'Old Password'),	'type' => 'password'));
				echo $this->Form->input('new_password', array( 'label' => __d('customers', 'New Password'),	'type' => 'password'));
				echo $this->Form->input('confirm_password', array('label' => __d('customers', 'Confirm'),	'type' => 'password'));
				echo $this->Form->end(__d('customers', 'Submit'));
			?>
	</fieldset>
</div>

