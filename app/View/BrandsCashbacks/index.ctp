<div class="brandsCashbacks index">
	<h2><?php echo __('Brands Cashbacks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cashback_id'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brandsCashbacks as $brandsCashback): ?>
	<tr>
		<td><?php echo h($brandsCashback['BrandsCashback']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($brandsCashback['Cashback']['name'], array('controller' => 'cashbacks', 'action' => 'view', $brandsCashback['Cashback']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($brandsCashback['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $brandsCashback['Brand']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $brandsCashback['BrandsCashback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brandsCashback['BrandsCashback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $brandsCashback['BrandsCashback']['id']), null, __('Are you sure you want to delete # %s?', $brandsCashback['BrandsCashback']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Brands Cashback'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
