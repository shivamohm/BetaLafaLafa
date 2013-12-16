
<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Run Coupon Script'), array('action' => 'script')); ?></li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Add Coupon'); ?></legend>
	<?php
		echo $this->Form->input('store_id', array('empty'=>"--select--"));
		
		echo $this->Form->input('Brand');
		echo $this->Form->input('Category');
		echo $this->Form->input('name');
                echo $this->Form->input('affiliate_id', array('empty'=>"--select--"));
		echo $this->Form->input('desc');
		echo $this->Form->input('link');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('coupon_code');
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
