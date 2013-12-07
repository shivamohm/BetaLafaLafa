<div class="brandsStores view">
<h2><?php echo __('Brands Store'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brandsStore['BrandsStore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsStore['Store']['name'], array('controller' => 'stores', 'action' => 'view', $brandsStore['Store']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsStore['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $brandsStore['Brand']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brands Store'), array('action' => 'edit', $brandsStore['BrandsStore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brands Store'), array('action' => 'delete', $brandsStore['BrandsStore']['id']), null, __('Are you sure you want to delete # %s?', $brandsStore['BrandsStore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands Stores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brands Store'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
