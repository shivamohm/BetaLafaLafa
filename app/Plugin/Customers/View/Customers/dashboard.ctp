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
<div class="customers index overview">
	
	
	<fieldset>
			<h2><?php echo __d('customers', 'Welcome'); ?> <?php echo $customer[$model]['username']; ?></h2>
			<h3><?php echo __d('customers', 'Recent broadcasts'); ?></h3>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th><?php echo 'My Earning'; ?></th>
					<th><?php echo 'Payment'; ?></th>
					<th><?php echo 'Setting'; ?></th>
					<th><?php echo 'Pending Cash Back'; ?></th>
					
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					
				</tr>
			</table>
	</fieldset>
</div>
