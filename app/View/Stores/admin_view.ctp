<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Store'), array('action' => 'edit', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Store'), array('action' => 'delete', $store['Store']['id']), null, __('Are you sure you want to delete # %s?', $store['Store']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="stores view">
<h2><?php echo __('Store'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($store['Store']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($store['Store']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Storeurl'); ?></dt>
		<dd>
			<?php echo h($store['Store']['storeurl']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Affiliatesurl'); ?></dt>
		<dd>
			<?php echo h($store['Store']['affiliatesurl']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Storedesc'); ?></dt>
		<dd>
			<?php echo h($store['Store']['storedesc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Email'); ?></dt>
		<dd>
			<?php echo h($store['Store']['owner_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Name'); ?></dt>
		<dd>
			<?php echo h($store['Store']['owner_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Owner Mobile'); ?></dt>
		<dd>
			<?php echo h($store['Store']['owner_mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($store['Store']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($store['Store']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Noofclick'); ?></dt>
		<dd>
			<?php echo h($store['Store']['noofclick']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdby'); ?></dt>
		<dd>
			<?php echo h($store['Store']['createdby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createddate'); ?></dt>
		<dd>
			<?php echo h($store['Store']['createddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($store['Store']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifieddate'); ?></dt>
		<dd>
			<?php echo h($store['Store']['modifieddate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Brands'); ?></h3>
	<?php if (!empty($store['Brand'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Shortdesc'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Noofclick'); ?></th>
		<th><?php echo __('Createdby'); ?></th>
		<th><?php echo __('Createddate'); ?></th>
		<th><?php echo __('Modifiedby'); ?></th>
		<th><?php echo __('Modifieddate'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($store['Brand'] as $brand): ?>
		<tr>
			<td><?php echo $brand['id']; ?></td>
			<td><?php echo $brand['name']; ?></td>
			<td><?php echo $brand['image']; ?></td>
			<td><?php echo $brand['shortdesc']; ?></td>
			<td><?php echo $brand['status']; ?></td>
			<td><?php echo $brand['noofclick']; ?></td>
			<td><?php echo $brand['createdby']; ?></td>
			<td><?php echo $brand['createddate']; ?></td>
			<td><?php echo $brand['modifiedby']; ?></td>
			<td><?php echo $brand['modifieddate']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'brands', 'action' => 'view', $brand['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'brands', 'action' => 'edit', $brand['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'brands', 'action' => 'delete', $brand['id']), null, __('Are you sure you want to delete # %s?', $brand['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($store['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Shortdesc'); ?></th>
		<th><?php echo __('Noofclick'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Createdby'); ?></th>
		<th><?php echo __('Createddate'); ?></th>
		<th><?php echo __('Modifiedby'); ?></th>
		<th><?php echo __('Modifieddate'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($store['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td><?php echo $category['parent_id']; ?></td>
			<td><?php echo $category['image']; ?></td>
			<td><?php echo $category['shortdesc']; ?></td>
			<td><?php echo $category['noofclick']; ?></td>
			<td><?php echo $category['status']; ?></td>
			<td><?php echo $category['createdby']; ?></td>
			<td><?php echo $category['createddate']; ?></td>
			<td><?php echo $category['modifiedby']; ?></td>
			<td><?php echo $category['modifieddate']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
