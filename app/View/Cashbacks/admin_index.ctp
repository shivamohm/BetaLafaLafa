<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cashback'), array('action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Run Cashback Script'), array('action' => 'script')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Affiliates'), array('controller' => 'affiliates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Affiliate'), array('controller' => 'affiliates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="cashbacks index">
	<h2><?php echo __('Cashbacks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('store_id'); ?></th>
			<th><?php echo $this->Paginator->sort('affiliate_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			
			<th><?php echo $this->Paginator->sort('payout'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
		
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        <tr class="filters">
             <?php echo $this->Form->create('Cashback', array('url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
		, 'name'=>'Cashback')); ?>
                <td><?php echo $this -> Form -> input('id', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '1'));?></td>
                <td><?php echo $this -> Form -> input('store_id', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '10'));?></td>
                <td>&nbsp;</td>
                <td><?php echo $this -> Form -> input('name', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '20'));?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 <td><?php echo $this -> Form -> input('status', array('label' => '', 'div' => false, 'type' => 'select', 'options' => array('1' => 'Active', '0' => 'In-Active'), 'empty' => 'All'));?></td>
                 
                <td class="actions"><?php
                    echo $this -> Html -> link(__('Search'), 'javascript:void(0)', array("onclick" => "Cashback.submit();", "class" => "search-action"));
                    echo $this -> Form -> end();
		?></td>
	</tr>
	<?php foreach ($cashbacks as $cashback): ?>
	<tr>
		<td><?php echo h($cashback['Cashback']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cashback['Store']['name'], array('controller' => 'stores', 'action' => 'view', $cashback['Store']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($cashback['Affiliate']['name'], array('controller' => 'affiliates', 'action' => 'view', $cashback['Affiliate']['id'])); ?>
		</td>
		<td><?php echo h($cashback['Cashback']['name']); ?>&nbsp;</td>
		
		
		<td><?php echo h($cashback['Cashback']['payout']); ?>&nbsp;</td>
		<td><?php echo h($cashback['Cashback']['discount']); ?>&nbsp;</td>
		
		
		
		<td><?php echo h($cashback['Cashback']['type']); ?>&nbsp;</td>
		<!--td><?php echo h($cashback['Cashback']['status']); ?>&nbsp;</td-->
                <td><?php if($cashback['Cashback']['status'] == 1){ echo "Active";}else{ echo "In-Active";} ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cashback['Cashback']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cashback['Cashback']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cashback['Cashback']['id']), null, __('Are you sure you want to delete # %s?', $cashback['Cashback']['id'])); ?>
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
