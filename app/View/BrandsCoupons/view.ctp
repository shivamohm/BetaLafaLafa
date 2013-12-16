<div class="brandsCoupons view">
<h2><?php echo __('Brands Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brandsCoupon['BrandsCoupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsCoupon['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $brandsCoupon['Coupon']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsCoupon['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $brandsCoupon['Brand']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brands Coupon'), array('action' => 'edit', $brandsCoupon['BrandsCoupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brands Coupon'), array('action' => 'delete', $brandsCoupon['BrandsCoupon']['id']), null, __('Are you sure you want to delete # %s?', $brandsCoupon['BrandsCoupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brands Coupon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
