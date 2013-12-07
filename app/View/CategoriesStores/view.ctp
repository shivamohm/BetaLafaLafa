<div class="categoriesStores view">
<h2><?php echo __('Categories Store'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesStore['CategoriesStore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesStore['Store']['name'], array('controller' => 'stores', 'action' => 'view', $categoriesStore['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesStore['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesStore['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Categories Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesStore['ParentCategoriesStore']['id'], array('controller' => 'categories_stores', 'action' => 'view', $categoriesStore['ParentCategoriesStore']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Store'), array('action' => 'edit', $categoriesStore['CategoriesStore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Store'), array('action' => 'delete', $categoriesStore['CategoriesStore']['id']), null, __('Are you sure you want to delete # %s?', $categoriesStore['CategoriesStore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Stores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Store'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Stores'), array('controller' => 'categories_stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Store'), array('controller' => 'categories_stores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories Stores'); ?></h3>
	<?php if (!empty($categoriesStore['ChildCategoriesStore'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesStore['ChildCategoriesStore'] as $childCategoriesStore): ?>
		<tr>
			<td><?php echo $childCategoriesStore['id']; ?></td>
			<td><?php echo $childCategoriesStore['store_id']; ?></td>
			<td><?php echo $childCategoriesStore['category_id']; ?></td>
			<td><?php echo $childCategoriesStore['parent_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories_stores', 'action' => 'view', $childCategoriesStore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories_stores', 'action' => 'edit', $childCategoriesStore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories_stores', 'action' => 'delete', $childCategoriesStore['id']), null, __('Are you sure you want to delete # %s?', $childCategoriesStore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Categories Store'), array('controller' => 'categories_stores', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
