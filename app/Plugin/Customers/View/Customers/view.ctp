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
<div class="customers view">
<h2><?php echo __d('customers', 'Customer'); ?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __d('customers', 'Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class; ?>>
			<?php echo $customer[$model]['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class; ?>><?php echo __d('customers', 'Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class; ?>>
			<?php echo $customer[$model]['created']; ?>
			&nbsp;
		</dd>
		<?php
		
		if (!empty($customer['UserDetail'])) {
			foreach ($customer['UserDetail'] as $section => $details) {
				foreach ($details as $field => $value) {
					echo '<dt>' . $section . ' - ' . $field . '</dt>';
					echo '<dd>' . $value . '</dd>';
				}
			}
		}
		?>
	</dl>
</div>

