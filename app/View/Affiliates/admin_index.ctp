<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Affiliate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="affiliates index">
	<h2><?php echo __('Affiliates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('affiliate_source'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($affiliates as $affiliate): ?>
	<tr>
		<td><?php echo h($affiliate['Affiliate']['id']); ?>&nbsp;</td>
		<td><?php echo h($affiliate['Affiliate']['name']); ?>&nbsp;</td>
		<td><?php echo h($affiliate['Affiliate']['url']); ?>&nbsp;</td>
		<td><?php echo h($affiliate['Affiliate']['affiliate_source']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $affiliate['Affiliate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $affiliate['Affiliate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $affiliate['Affiliate']['id']), null, __('Are you sure you want to delete # %s?', $affiliate['Affiliate']['id'])); ?>
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
