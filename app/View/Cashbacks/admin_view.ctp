<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cashback'), array('action' => 'edit', $cashback['Cashback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cashback'), array('action' => 'delete', $cashback['Cashback']['id']), null, __('Are you sure you want to delete # %s?', $cashback['Cashback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Affiliates'), array('controller' => 'affiliates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Affiliate'), array('controller' => 'affiliates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="cashbacks view">
<h2><?php echo __('Cashback'); ?></h2>
	<dl>
		
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cashback['Store']['name'], array('controller' => 'stores', 'action' => 'view', $cashback['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Affiliate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cashback['Affiliate']['name'], array('controller' => 'affiliates', 'action' => 'view', $cashback['Affiliate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashback Name'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Desc'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['short_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price Rule'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['price_rule']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payout'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['payout']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['Tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['url']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Last Sale Track'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['last_sale_track']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php  echo $this->Time->format('F jS, Y h:i A', $cashback['Cashback']['start_date']);  ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php  echo $this->Time->format('F jS, Y h:i A', $cashback['Cashback']['expiry_date']);  ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['utm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Affiliatekey'); ?></dt>
		<dd>
			<?php echo h($cashback['Cashback']['affiliatekey']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			
				<?php echo $cashback['Cashback']['status'] = $cashback['Cashback']['status'] ==1?'Active':'In-Active';?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Brands'); ?></h3>
	<?php if (!empty($cashback['Brand'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		
		<th><?php echo __('Shortdesc'); ?></th>
		<th><?php echo __('Status'); ?></th>
		
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cashback['Brand'] as $brand): ?>
		<tr>
			<td><?php echo $brand['id']; ?></td>
			<td><?php echo $brand['name']; ?></td>
			
			<td><?php echo $brand['shortdesc']; ?></td>
			<td>
			<?php echo $brand['status'] = $brand['status'] ==1?'Active':'In-Active';?>
			</td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'brands', 'action' => 'view', $brand['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'brands', 'action' => 'edit', $brand['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'brands', 'action' => 'delete', $brand['id']), null, __('Are you sure you want to delete # %s?', $brand['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($cashback['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Shortdesc'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cashback['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td><?php echo $category['parent_id']; ?></td>
			<td><?php echo $category['shortdesc']; ?></td>
			<td>
			<?php echo $category['status'] = $category['status'] ==1?'Active':'In-Active';?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
