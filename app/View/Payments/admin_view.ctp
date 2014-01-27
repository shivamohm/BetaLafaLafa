<div class="payments view">
<h2><?php echo __('Payment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payment['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $payment['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Neft'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['neft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Account'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['bank_account']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Name'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['bank_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch Name'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['branch_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acc No'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['acc_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ifsc Code'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['ifsc_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cheque'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['Cheque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name On Address'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['name_on_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pincode'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['pincode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createdby'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['createdby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createddate'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['createddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifiedby'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['modifiedby']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifieddate'); ?></dt>
		<dd>
			<?php echo h($payment['Payment']['modifieddate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payment'), array('action' => 'edit', $payment['Payment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payment'), array('action' => 'delete', $payment['Payment']['id']), null, __('Are you sure you want to delete # %s?', $payment['Payment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
