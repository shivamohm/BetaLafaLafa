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
<div class="customers index">
	<h2><?php echo __d('customers', 'Customers'); ?></h2>

	<p><?php
	#echo $this->Paginator->counter(array(
	#	'format' => __d('customers', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	#));
	?></p>

	<table cellpadding="0" cellspacing="0">
	
	<tr>
		<th><?php echo 'Customer User Name'; ?></th>
		<th><?php echo 'Customer Slug Url'; ?></th>
		<th><?php echo 'Customer First Name'; ?></th>
		<th><?php echo 'Customer Last Name'; ?></th>
		<th><?php echo 'created'; ?></th>
		<th class="actions"><?php echo __d('customers', 'Actions'); ?></th>
	</tr>
	<?php
	$i = 0;
	
	#foreach ($customers as $user):
		/*$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}*/	
		?>
		<!--tr<?php echo $class; ?>-->
		<tr>
			<td><?php echo $this->Html->link($customers[$model]['username'], array('action' => 'view', $customers[$model]['id'])); ?></td>
			<td><?php echo $this->Html->link($customers[$model]['slug'], array('action' => 'view', $customers[$model]['id'])); ?></td>
			<td><?php echo $customers[$model]['first_name']; ?></td>
			<td><?php echo $customers[$model]['last_name']; ?></td>
			<td><?php echo $customers[$model]['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('customers', 'View'), array('action' => 'view', $customers[$model]['id'])); ?>
			</td>
		</tr>
	<?php #endforeach; ?>
	</table>
	<?php #echo $this->element('Customers.pagination'); ?>
</div>
