<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cashbacks'), array('action' => 'index')); ?></li>
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

<div class="coupons form">
<?php echo $this->Form->create('Cashback', array('type'=>'file')); ?>
<?php 
?>
	<fieldset>
		<legend><?php echo __('Run Cashback Script'); ?></legend>
		<div class="form-validations"><ol></ol></div>
	<?php
		echo $this->Form->input('cashback_type', array('Cash Back Type'=>'','options'=>array('csv'=>'CSV')));
		
		echo $this->Form->input('cashbackcsv', array('type'=>'file','label'=>'Cash Back Csv File Upload'));
			
	?>
	<?php echo '<div id="csv" style="padding-right:364px">'.  $this->Form->end(__('Run Script')).'</div>'; ?>
	</fieldset>

</div>
