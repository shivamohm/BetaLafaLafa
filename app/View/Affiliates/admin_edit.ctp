<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Affiliate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Affiliate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Affiliates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="affiliates form">
<?php echo $this->Form->create('Affiliate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Affiliate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
		echo $this->Form->input('affiliate_source');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>