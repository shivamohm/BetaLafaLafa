<div class="categoriesCoupons form">
<?php echo $this->Form->create('CategoriesCoupon'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categories Coupon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('coupon_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('parent_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesCoupon.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategoriesCoupon.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Coupons'), array('controller' => 'categories_coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Coupon'), array('controller' => 'categories_coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>
