<?php echo $this->element('Customers.Customers/sidebar'); ?>
<div class="customers form">
	<fieldset>
			<legend><?php echo __d('customers', 'Reset your password'); ?></legend>
			

<?php
	echo $this->Form->create($model, array(	'url' => array(	'action' => 'reset_password',$token)));
	echo $this->Form->input('new_password', array(	'label' => __d('customers', 'New Password'), 	'type' => 'password'));
	echo $this->Form->input('confirm_password', array( 	'label' => __d('customers', 'Confirm'),    'type' => 'password'));
	echo $this->Form->submit(__d('customers', 'Submit'));
	echo $this->Form->end();
?>
</fieldset>
</div>

