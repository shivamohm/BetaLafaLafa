<div class="categoriesCashbacks index">
	<h2><?php echo __('Categories Cashbacks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cashback_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesCashbacks as $categoriesCashback): ?>
	<tr>
		<td><?php echo h($categoriesCashback['CategoriesCashback']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriesCashback['Cashback']['name'], array('controller' => 'cashbacks', 'action' => 'view', $categoriesCashback['Cashback']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesCashback['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesCashback['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesCashback['ParentCategoriesCashback']['id'], array('controller' => 'categories_cashbacks', 'action' => 'view', $categoriesCashback['ParentCategoriesCashback']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriesCashback['CategoriesCashback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriesCashback['CategoriesCashback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriesCashback['CategoriesCashback']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCashback['CategoriesCashback']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Categories Cashback'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Cashbacks'), array('controller' => 'categories_cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Cashback'), array('controller' => 'categories_cashbacks', 'action' => 'add')); ?> </li>
	</ul>
</div>
