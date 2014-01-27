<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Run Coupon Script'), array('action' => 'script')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<?php ?>
<div class="coupons index">
	<h2><?php echo __('Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('coupon_code'); ?></th>
			
			<th><?php echo $this->Paginator->sort('Coupon Name'); ?></th>
			<!--th><?php echo $this->Paginator->sort('link'); ?></th-->
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('Expiry Date'); ?></th>
			<th><?php echo $this->Paginator->sort('affiliate_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
		
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	  <tr class="filters">
             <?php echo $this->Form->create('Coupon', array('url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
		, 'name'=>'Coupon')); ?>
                <td><?php echo $this -> Form -> input('id', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '1'));?></td>
                <td><?php echo $this -> Form -> input('store_id', array('type' => 'select', 'option'=>'', 'div' => false, 'label' => '', 'size' => '1'));?></td>
               
                <td><?php echo $this -> Form -> input('coupon_code', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '10'));?></td>
                
                <td><?php echo $this -> Form -> input('name', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '20'));?></td>
                <td>&nbsp</td>
                <td>&nbsp</td>
                
                <td>&nbsp</td>
                <td><?php echo $this -> Form -> input('status', array('label' => '', 'div' => false, 'type' => 'select', 'options' => array('1' => 'Active', '0' => 'In-Active'), 'empty' => 'All'));?></td>
                <td class="actions"><?php
                    echo $this -> Html -> link(__('Search'), 'javascript:void(0)', array("onclick" => "Coupon.submit();", "class" => "search-action"));
                    echo $this -> Form -> end();
		?></td>
	</tr>
	
	<?php foreach ($coupons as $coupon): ?>
	<tr>
		<td><?php echo h($coupon['Coupon']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coupon['Store']['name'], array('controller' => 'stores', 'action' => 'view', $coupon['Store']['id'])); ?>
		</td>
                <td><?php echo h($coupon['Coupon']['coupon_code']); ?>&nbsp;</td>
		
		<td><?php echo h($coupon['Coupon']['name']); ?>&nbsp;</td>
		
		<!--td><?php echo h($coupon['Coupon']['link']); ?>&nbsp;</td-->
		<td><?php echo $this->Time->format('F jS, Y h:i A', $coupon['Coupon']['start_date']);  ?>&nbsp;</td>
		<td><?php echo $this->Time->format('F jS, Y h:i A', $coupon['Coupon']['end_date']);  ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($coupon['Affiliate']['name'], array('controller' => 'affiliates', 'action' => 'view', $coupon['Affiliate']['id'])); ?>
		</td>
                <td><?php if($coupon['Coupon']['status'] == 1){ echo "Active"; }else{ echo "In-Active";} ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coupon['Coupon']['id']), null, __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?>
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
