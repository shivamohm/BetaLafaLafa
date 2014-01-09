<div class="categoriesCashbacks form">
<?php echo $this->Form->create('CategoriesCashback'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categories Cashback'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cashback_id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('parent_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesCashback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategoriesCashback.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Cashbacks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Cashbacks'), array('controller' => 'categories_cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Cashback'), array('controller' => 'categories_cashbacks', 'action' => 'add')); ?> </li>
	</ul>
</div>
