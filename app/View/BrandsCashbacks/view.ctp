<div class="brandsCashbacks view">
<h2><?php echo __('Brands Cashback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brandsCashback['BrandsCashback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashback'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsCashback['Cashback']['name'], array('controller' => 'cashbacks', 'action' => 'view', $brandsCashback['Cashback']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($brandsCashback['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $brandsCashback['Brand']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brands Cashback'), array('action' => 'edit', $brandsCashback['BrandsCashback']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brands Cashback'), array('action' => 'delete', $brandsCashback['BrandsCashback']['id']), null, __('Are you sure you want to delete # %s?', $brandsCashback['BrandsCashback']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands Cashbacks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brands Cashback'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cashbacks'), array('controller' => 'cashbacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cashback'), array('controller' => 'cashbacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
	</ul>
</div>
