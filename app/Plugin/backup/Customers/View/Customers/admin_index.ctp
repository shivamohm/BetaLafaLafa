<?php
/**
 * Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */


 
?>
<?php echo $this->Session->flash(); ?>
	
<?php #echo $this->element('Customers.Customers/admin_sidebar'); ?>
<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Customers'), array('action' => 'admin_add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'admin_index')); ?></li>
		
		
	</ul>
</div>
<div class="customers index">
	<h2><?php echo __d('customers', 'Customers'); ?></h2>
	
	<!--h3><?php echo __d('customers', 'Filter'); ?></h3-->
	
	
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('email_verified'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo 'Payment'; ?></th>
			<th class="actions"><?php echo __d('customers', 'Actions'); ?></th>
		</tr>
		 <tr class="filters">
             <?php #echo $this->Form->create($model, array('action' => 'index'));
             echo $this->Form->create('Customer', array('url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
		, 'name'=>'Customer'));
		 ?>
            <td><?php  echo $this->Form->input('username', array('label' => '', 'size'=>'30')); ?></td>
            <td><?php echo $this->Form->input('email', array('label' => '', 'size'=>'50')); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td class="actions"><?php 
			echo $this -> Html -> link(__('Search'), 'javascript:void(0)', array("onclick" => "Customer.submit();", "class" => "search-action"));
			echo $this -> Form -> end();
			
			#echo $this->Form->end(__d('customers', 'Search')); 	?></td>
		</tr>
		
		<?php
			$i = 0;
			foreach ($customers as $user):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td>
					<?php echo $user[$model]['username']; ?>
				</td>
				<td>
					<?php echo $user[$model]['email']; ?>
				</td>
				<td>
					<?php echo $user[$model]['email_verified'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
				</td>
				<td>
					<?php echo $user[$model]['active'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
				</td>
				<td>
					
					<?php echo $this->Html->link(__("Cleck Here ",true),"/admin/payments/paymentview/".$user[$model]['id']); ?>
				</td>
				
				<td class="actions">
					<?php echo $this->Html->link(__d('customers', 'View'), array('action'=>'view', $user[$model]['slug'])); ?>
					<?php echo $this->Html->link(__d('customers', 'Edit'), array('action'=>'edit', $user[$model]['id'])); ?>
					<?php echo $this->Html->link(__d('customers', 'Delete'), array('action'=>'delete', $user[$model]['id']), null, sprintf(__d('users', 'Are you sure you want to delete # %s?'), $user[$model]['id'])); ?>
				</td>
				
			</tr>
		<?php endforeach; ?>
	</table>
	<?php #echo $this->element('Customers.pagination'); ?>
	<?php echo $this->element('Customers.paging'); ?>
	<?php echo $this->element('Customers.pagination'); ?>
</div>
