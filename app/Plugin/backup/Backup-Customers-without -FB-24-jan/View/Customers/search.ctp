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
	<?php
		echo $this->Form->create($model, array(
			'action' => 'search'));
		echo $this->Form->input('username', array(
			'label' => __d('customers', 'Username')));
		echo $this->Form->input('email', array(
			'label' => __d('customers', 'Email')));
		echo $this->Form->input('Profile.name', array(
			'label' => __d('customers', 'Name')));
		echo $this->Form->end(__d('customers', 'Search'));
	?>
	<p><?php
	echo $this->Paginator->counter(array(
		'format' => __d('customers', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?></p>

	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('username'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions"><?php echo __d('customers', 'Actions'); ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($customers as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		?>
		<tr<?php echo $class; ?>>
			<td><?php echo $user[$model]['username']; ?></td>
			<td><?php echo $user[$model]['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__d('customers', 'View'), array('action' => 'view', $user[$model]['id'])); ?>
				<?php echo $this->Html->link(__d('customers', 'Edit'), array('action' => 'edit', $user[$model]['id'])); ?>
				<?php echo $this->Html->link(
					__d('customers', 'Delete'),
					array('action' => 'delete', $user[$model]['id']),
					null,
					sprintf(__d('customers', 'Are you sure you want to delete # %s?'), $user[$model]['id'])
				); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php echo $this->element('Customers.paging'); ?>
</div>

