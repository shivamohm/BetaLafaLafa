<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Brand'), array('action' => 'admin_add')); ?></li>
                <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'admin_add')); ?> </li>
	</ul>
</div>
<div class="brands index">
	<h2><?php echo __('Brands'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<!--th><?php echo $this->Paginator->sort('image'); ?></th-->
			<th><?php echo $this->Paginator->sort('shortdesc'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('noofclick'); ?></th>
			<!--th><?php echo $this->Paginator->sort('createdby'); ?></th>
			<th><?php echo $this->Paginator->sort('createddate'); ?></th>
			<th><?php echo $this->Paginator->sort('modifiedby'); ?></th>
			<th><?php echo $this->Paginator->sort('modifieddate'); ?></th-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brands as $brand): ?>
	<tr>
		<td><?php echo h($brand['Brand']['id']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['name']); ?>&nbsp;</td>
		
		<td><?php echo h($brand['Brand']['shortdesc']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['status']); ?>&nbsp;</td>
		<td><?php echo h($brand['Brand']['noofclick']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $brand['Brand']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brand['Brand']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $brand['Brand']['id']), null, __('Are you sure you want to delete # %s?', $brand['Brand']['id'])); ?>
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