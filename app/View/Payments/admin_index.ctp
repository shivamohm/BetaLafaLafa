
<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Payment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="payments index">
	<h2><?php echo __('Payments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('neft'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_account'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_name'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_name'); ?></th>
			<th><?php echo $this->Paginator->sort('acc_no'); ?></th>
			<th><?php echo $this->Paginator->sort('ifsc_code'); ?></th>
			<th><?php echo $this->Paginator->sort('Cheque'); ?></th>
			<th><?php echo $this->Paginator->sort('name_on_address'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('pincode'); ?></th>
			<th><?php echo $this->Paginator->sort('mobile'); ?></th>
			<th><?php echo $this->Paginator->sort('createdby'); ?></th>
			<th><?php echo $this->Paginator->sort('createddate'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedby'); ?></th>
			<th><?php echo $this->Paginator->sort('modifieddate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payments as $payment):  ?>
	<tr>
		<td><?php echo h($payment['Payment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($payment['Payment']['customer_id'], array('controller' => 'customers/customers', 'action' => 'view', $payment['Payment']['customer_id'])); ?>
		</td>
		<td><?php echo h($payment['Payment']['slug']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['neft']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['bank_account']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['bank_name']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['branch_name']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['acc_no']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['ifsc_code']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['cheque']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['name_on_address']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['address']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['city']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['state']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['pincode']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['mobile']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['createdby']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['createddate']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['modifiedby']); ?>&nbsp;</td>
		<td><?php echo h($payment['Payment']['modifieddate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $payment['Payment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $payment['Payment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payment['Payment']['id']), null, __('Are you sure you want to delete # %s?', $payment['Payment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
