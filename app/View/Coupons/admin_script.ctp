<?php echo $this->element('dashboard'); ?>
<script>
	
	function chnageByCouponType(obj){
	
			if(obj == 'csv'){
				 $("#csv").show();
				 $("#url").hide();
			}
			if(obj == 'xml'){
				$("#csv").hide();
				 $("#url").show();
			}
		}
</script>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Run Coupon Script'), array('action' => 'script')); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="coupons form">
<?php echo $this->Form->create('Coupon', array('type'=>'file')); ?>
<?php 
?>
	<fieldset>
		<legend><?php echo __('Run Coupon Script'); ?></legend>
		<div class="form-validations"><ol></ol></div>
	<?php
		echo $this->Form->input('coupon_type', array('onchange'=>"chnageByCouponType(this.value);",'id'=>'coupon_type','options'=>array(''=>'--select--', 'csv'=>'CSV', 'xml'=>'XML')));
		
		echo '<div id="url" style="display:none">'.$this->Form->input('url').'</div>';
		
		echo '<div id="csv" style="display:none">'. $this->Form->input('couponcsv', array('type'=>'file')).'</div>';
			
	?>
	<?php echo '<div id="csv" style="padding-right:364px">'.  $this->Form->end(__('Run Script')).'</div>'; ?>
	</fieldset>

</div>
