<div class="brandsStores form">
<?php echo $this->Form->create('BrandsStore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brands Store'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('store_id');
		echo $this->Form->input('brand_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BrandsStore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BrandsStore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Brands Stores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
