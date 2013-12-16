<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Affiliate'), array('action' => 'edit', $affiliate['Affiliate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Affiliate'), array('action' => 'delete', $affiliate['Affiliate']['id']), null, __('Are you sure you want to delete # %s?', $affiliate['Affiliate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Affiliates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Affiliate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="affiliates view">
<h2><?php echo __('Affiliate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($affiliate['Affiliate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($affiliate['Affiliate']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($affiliate['Affiliate']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Affiliate Source'); ?></dt>
		<dd>
			<?php echo h($affiliate['Affiliate']['affiliate_source']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Coupons'); ?></h3>
	<?php if (!empty($affiliate['Coupon'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Store Id'); ?></th>
		<th><?php echo __('Affiliate Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Desc'); ?></th>
		<th><?php echo __('Link'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Coupon Code'); ?></th>
		
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($affiliate['Coupon'] as $coupon): ?>
		<tr>
			<td><?php echo $coupon['id']; ?></td>
			<td><?php echo $coupon['store_id']; ?></td>
			<td><?php echo $affiliate['Affiliate']['name'];  #$coupon['affiliate_id']; ?></td>
			<td><?php echo $coupon['name']; ?></td>
			<td><?php echo $coupon['desc']; ?></td>
			<td><?php echo $coupon['link']; ?></td>
			<td><?php echo $coupon['start_date']; ?></td>
			<td><?php echo $coupon['end_date']; ?></td>
			<td><?php echo $coupon['status']; ?></td>
			<td><?php echo $coupon['coupon_code']; ?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'coupons', 'action' => 'view', $coupon['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'coupons', 'action' => 'edit', $coupon['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'coupons', 'action' => 'delete', $coupon['id']), null, __('Are you sure you want to delete # %s?', $coupon['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
