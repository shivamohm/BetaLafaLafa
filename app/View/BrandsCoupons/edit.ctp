<div class="brandsCoupons form">
<?php echo $this->Form->create('BrandsCoupon'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brands Coupon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('coupon_id');
		echo $this->Form->input('brand_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BrandsCoupon.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BrandsCoupon.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Brands Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
