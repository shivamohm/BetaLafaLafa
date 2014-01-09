<div class="brandsCashbacks form">
<?php echo $this->Form->create('BrandsCashback'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brands Cashback'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cashback_id');
		echo $this->Form->input('brand_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BrandsCashback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BrandsCashback.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Brands Cashbacks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
