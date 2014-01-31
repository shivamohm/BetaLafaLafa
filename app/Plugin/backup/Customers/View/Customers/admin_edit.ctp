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
			<legend><?php echo __d('customers', 'Edit Customers'); ?></legend>
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('first_name', array(
					'label' => __d('customers', 'First Name')));
				echo $this->Form->input('last_name', array(
					'label' => __d('customers', 'Last Name')));
                if (!empty($roles)) {
                    echo $this->Form->input('role', array(
                        'label' => __d('customers', 'Role'), 'values' => $roles));
                }
                #echo $this->Form->input('is_admin', array( 'label' => __d('customers', 'Is Admin')));
                 echo $this->Form->input('active', array('label' => __d('customers', 'Active')));
			?>
		</fieldset>
	<?php echo $this->Form->end('Submit'); ?>
</div>
