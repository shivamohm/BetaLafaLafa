<div class="categoriesStores form">
<?php echo $this->Form->create('CategoriesStore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categories Store'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('store_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('parent_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesStore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategoriesStore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Stores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Stores'), array('controller' => 'categories_stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Store'), array('controller' => 'categories_stores', 'action' => 'add')); ?> </li>
	</ul>
</div>
