<div class="brandsCoupons index">
	<h2><?php echo __('Brands Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('coupon_id'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($brandsCoupons as $brandsCoupon): ?>
	<tr>
		<td><?php echo h($brandsCoupon['BrandsCoupon']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($brandsCoupon['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $brandsCoupon['Coupon']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($brandsCoupon['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $brandsCoupon['Brand']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $brandsCoupon['BrandsCoupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $brandsCoupon['BrandsCoupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $brandsCoupon['BrandsCoupon']['id']), null, __('Are you sure you want to delete # %s?', $brandsCoupon['BrandsCoupon']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Brands Coupon'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
