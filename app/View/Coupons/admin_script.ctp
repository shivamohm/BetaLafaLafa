<div id="messages">
<?php
   
    if ($messages = $this->Session->read('Message.multiFlash')) {
        foreach($messages as $k=>$v) echo $this->Session->flash('multiFlash.'.$k);
    }
?>
</div>
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


	<fieldset>
		<legend><?php echo __('Run Coupon Script'); ?></legend>
		
		
	<?php
		#echo $this->Form->input('coupon_type', array('onchange'=>"chnageByCouponType(this.value);",'id'=>'coupon_type','options'=>array(''=>'--select--', 'csv'=>'CSV', 'xml'=>'XML')));
		echo $this->Form->input('coupon_type', array('id'=>'coupon_type','options'=>array( 'csv'=>'CSV')));
		
		echo '<div id="url" style="display:none">';
		echo $this->Form->create('Coupon', array('type'=>'file')); 
		echo $this->Form->input('url');
		echo   $this->Form->end(__('Run Script'));
		echo '</div>';
		
		
		echo '<div id="csv" style="display:block">';
		echo $this->Form->create('Coupon', array('type'=>'file')); 
		echo $this->Form->input('couponcsv', array('type'=>'file'));
		  #echo $this->Form->input('name', array('label'=>'Coupon Name'));
		echo   $this->Form->end(__('Run Script')); 
		echo '</div>';
			
	?>
	
	</fieldset>

</div>


