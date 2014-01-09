<?php echo $this->element('dashboard'); ?>

 <script type="text/javascript">
        $(function(){
             $( "#start_date" ).datetimepicker({
                dateFormat:'yy-mm-dd',
                //dateFormat:'dd-mm-yy',
                
                hour: 00,
                minute: 00,
                //defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onSelect: function( selectedDate ) {
                    var date2 = $('#start_date').datepicker('getDate'); 
                    //date2.setDate(date2.getDate()+7); 
                    //$( "#start_date" ).datepicker( "option", "minDate", date2);
                    $( "#start_date" ).datepicker( "option", "", date2);
                }
            });
            $( "#expiry_date" ).datetimepicker({
                dateFormat:'yy-mm-dd',
                //dateFormat:'dd-mm-yy',
                hour: 23,
                minute: 59,
                //defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onSelect: function( selectedDate ) {
                    var date2 = $('#expiry_date').datepicker('getDate'); 
                    //date2.setDate(date2.getDate()+7); 
                    //$( "#expiry_date" ).datepicker( "option", "minDate", date2);
                    $("#expiry_date" ).datepicker( "option", "", date2);
                }
            });
            
        });
    </script>
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
		echo $this->Form->input('Category', array('style'=>'height:264px'));
		echo $this->Form->input('affiliate_id', array('empty'=>"--select--"));
                echo $this->Form->input('name', array('label'=>'Coupon Name'));
                echo $this->Form->input('coupon_code', array('label'=>'Coupon Code'));
		echo $this->Form->input('pricerule', array('label'=>"Price Rule"));
		echo $this->Form->input('coupon_tag' , array('label'=>'Coupon Tag'));
		echo $this->Form->input('coupon_type' , array('label'=>'Coupon Type', 'options'=>array('empty'=>"--select--",'Deal'=>'Deal','Flat Discount'=>'Flat Discount','Freebie'=>'Freebie', 'Buy One Get One free'=>'Buy One Get One free',
                    'Free Shipping'=>'Free Shipping')));
		echo $this->Form->input('link');
		echo $this->Form->input('reviews', array('type'=>"textarea" ,'label'=>'Coupon Reviews'));
		echo $this->Form->input('desc', array('type'=>"textarea",'label'=>'Coupon Short Desc', 'class' => 'editorNotRequired tipOn', 'title' => 'Max 250 characters allowed','maxlength'=>'250'));
		
		echo $this->Form->input('start_date', array('id' => 'start_date', 'label' => 'Cash Back Start date', 'type' => 'text',  'class' => 'txt-calendar', 'readonly' => 'true'));
                echo $this->Form->input('expiry_date', array('id' => 'expiry_date', 'label' => 'Cash Back Expiry date', 'type' => 'text',  'class' => 'txt-calendar', 'readonly' => 'true'));
		
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
