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
<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Customers'), array('action' => 'admin_add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'admin_index')); ?></li>
		<!--li><?php echo $this->Html->link(__('My Account'), array('action' => 'admin_edit')); ?></li-->
	</ul>
</div>
<div class="customers form">
	<?php echo $this->Form->create($model); ?>
		<fieldset>
			<legend><?php echo __d('customers', 'Add User'); ?></legend>
			<?php
				echo $this->Form->input('username', array(
					'label' => __d('customers', 'Username')));
				echo $this->Form->input('email', array(
					'label' => __d('customers', 'E-mail (used as login)'),
					'error' => array('isValid' => __d('customers', 'Must be a valid email address'),
						'isUnique' => __d('customers', 'An account with that email already exists'))));
				echo $this->Form->input('password', array(
					'label' => __d('customers', 'Password'),
					'type' => 'password'));
				echo $this->Form->input('temppassword', array(
					'label' => __d('customers', 'Password (confirm)'),
					'type' => 'password'));
				if (!empty($roles)) {
					echo $this->Form->input('role', array(
						'label' => __d('customers', 'Role'), 'values' => $roles));
				}
				/*
				echo $this->Form->input('is_admin', array(
						'label' => __d('customers', 'Is Admin'))); */
				echo $this->Form->input('active', array(
					'label' => __d('customers', 'Active')));
			?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</div>

