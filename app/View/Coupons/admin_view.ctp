<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Run Coupon Script'), array('action' => 'script')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), null, __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="coupons view">
<h2><?php echo __('Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coupon['Store']['name'], array('controller' => 'stores', 'action' => 'view', $coupon['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon Code'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['coupon_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createby'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['createby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createddate'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['createddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifieddate'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['modifieddate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Brands'); ?></h3>
	<?php if (!empty($coupon['Brand'])): ?>
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
	<?php foreach ($coupon['Brand'] as $brand): ?>
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
	<?php if (!empty($coupon['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
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
	<?php foreach ($coupon['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td><?php echo $category['lft']; ?></td>
			<td><?php echo $category['rght']; ?></td>
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
