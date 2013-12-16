<div class="categoriesCoupons index">
	<h2><?php echo __('Categories Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('coupon_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesCoupons as $categoriesCoupon): ?>
	<tr>
		<td><?php echo h($categoriesCoupon['CategoriesCoupon']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriesCoupon['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $categoriesCoupon['Coupon']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesCoupon['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesCoupon['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesCoupon['ParentCategoriesCoupon']['id'], array('controller' => 'categories_coupons', 'action' => 'view', $categoriesCoupon['ParentCategoriesCoupon']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriesCoupon['CategoriesCoupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriesCoupon['CategoriesCoupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriesCoupon['CategoriesCoupon']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCoupon['CategoriesCoupon']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Categories Coupon'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Coupons'), array('controller' => 'categories_coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Coupon'), array('controller' => 'categories_coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>
