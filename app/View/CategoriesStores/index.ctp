<div class="categoriesStores index">
	<h2><?php echo __('Categories Stores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesStores as $categoriesStore): ?>
	<tr>
		<td><?php echo h($categoriesStore['CategoriesStore']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriesStore['Store']['name'], array('controller' => 'stores', 'action' => 'view', $categoriesStore['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesStore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesStore['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesStore['ParentCategoriesStore']['id'], array('controller' => 'categories_stores', 'action' => 'view', $categoriesStore['ParentCategoriesStore']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriesStore['CategoriesStore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriesStore['CategoriesStore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriesStore['CategoriesStore']['id']), null, __('Are you sure you want to delete # %s?', $categoriesStore['CategoriesStore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Categories Store'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Stores'), array('controller' => 'categories_stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Store'), array('controller' => 'categories_stores', 'action' => 'add')); ?> </li>
	</ul>
</div>
