<div class="categoriesCoupons view">
<h2><?php echo __('Categories Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesCoupon['CategoriesCoupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coupon'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCoupon['Coupon']['name'], array('controller' => 'coupons', 'action' => 'view', $categoriesCoupon['Coupon']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCoupon['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesCoupon['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Categories Coupon'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCoupon['ParentCategoriesCoupon']['id'], array('controller' => 'categories_coupons', 'action' => 'view', $categoriesCoupon['ParentCategoriesCoupon']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Coupon'), array('action' => 'edit', $categoriesCoupon['CategoriesCoupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Coupon'), array('action' => 'delete', $categoriesCoupon['CategoriesCoupon']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCoupon['CategoriesCoupon']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Coupon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('controller' => 'coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('controller' => 'coupons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Coupons'), array('controller' => 'categories_coupons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Categories Coupon'), array('controller' => 'categories_coupons', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories Coupons'); ?></h3>
	<?php if (!empty($categoriesCoupon['ChildCategoriesCoupon'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Coupon Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesCoupon['ChildCategoriesCoupon'] as $childCategoriesCoupon): ?>
		<tr>
			<td><?php echo $childCategoriesCoupon['id']; ?></td>
			<td><?php echo $childCategoriesCoupon['coupon_id']; ?></td>
			<td><?php echo $childCategoriesCoupon['category_id']; ?></td>
			<td><?php echo $childCategoriesCoupon['parent_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories_coupons', 'action' => 'view', $childCategoriesCoupon['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories_coupons', 'action' => 'edit', $childCategoriesCoupon['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories_coupons', 'action' => 'delete', $childCategoriesCoupon['id']), null, __('Are you sure you want to delete # %s?', $childCategoriesCoupon['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Categories Coupon'), array('controller' => 'categories_coupons', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
