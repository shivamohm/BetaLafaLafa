<div class="categoriesCashbacks view">
<h2><?php echo __('Categories Cashback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesCashback['CategoriesCashback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCashback['Cashback']['name'], array('controller' => 'cashbacks', 'action' => 'view', $categoriesCashback['Cashback']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCashback['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesCashback['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Categories Cashback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCashback['ParentCategoriesCashback']['id'], array('controller' => 'categories_cashbacks', 'action' => 'view', $categoriesCashback['ParentCategoriesCashback']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Cashback'), array('action' => 'edit', $categoriesCashback['CategoriesCashback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Cashback'), array('action' => 'delete', $categoriesCashback['CategoriesCashback']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCashback['CategoriesCashback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Cashbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Cashback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Cashbacks'), array('controller' => 'categories_cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Cashback'), array('controller' => 'categories_cashbacks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories Cashbacks'); ?></h3>
	<?php if (!empty($categoriesCashback['ChildCategoriesCashback'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cashback Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesCashback['ChildCategoriesCashback'] as $childCategoriesCashback): ?>
		<tr>
			<td><?php echo $childCategoriesCashback['id']; ?></td>
			<td><?php echo $childCategoriesCashback['cashback_id']; ?></td>
			<td><?php echo $childCategoriesCashback['category_id']; ?></td>
			<td><?php echo $childCategoriesCashback['parent_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories_cashbacks', 'action' => 'view', $childCategoriesCashback['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories_cashbacks', 'action' => 'edit', $childCategoriesCashback['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories_cashbacks', 'action' => 'delete', $childCategoriesCashback['id']), null, __('Are you sure you want to delete # %s?', $childCategoriesCashback['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Categories Cashback'), array('controller' => 'categories_cashbacks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
