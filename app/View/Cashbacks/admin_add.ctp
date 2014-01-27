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
                    var date3 = $('#expiry_date').datepicker('getDate'); 
                    //date2.setDate(date2.getDate()+7); 
                    $( "#expiry_date" ).datepicker( "option", "", date3);
                }
            });
            
        });
    </script>
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
<div class="cashbacks form">
<?php echo $this->Form->create('Cashback'); ?>
	<fieldset>
		<legend><?php echo __('Add Cashback'); ?></legend>
	<?php
		
		echo $this->Form->input('store_id', array('empty'=>"--select--"));
		echo $this->Form->input('affiliate_id', array('empty'=>"--select--"));
                
                
		echo $this->Form->input('Category', array('empty'=>"--select--", 'style'=>'height:264px'));
                
		echo $this->Form->input('Brand', array('empty'=>"--select--"));
		echo $this->Form->input('name', array('label'=>'Cash Back Name'));
		echo $this->Form->input('price_rule', array('type'=>'text', 'label'=>'Price'));
		echo $this->Form->input('payout',array('type'=>'text', 'label'=>'Payout'));
		echo $this->Form->input('discount');
		echo $this->Form->input('short_desc', array('type'=>'textarea', 'label'=>'Cash Back Detail'));
		echo $this->Form->input('Tag', array('label'=>'Cash Back Tag'));
		
		echo $this->Form->input('start_date', array('id' => 'start_date', 'label' => 'Cash Back Start date', 'type' => 'text',  'class' => 'txt-calendar', 'readonly' => 'true'));
        echo $this->Form->input('expiry_date', array('id' => 'expiry_date', 'label' => 'Cash Back Expiry date', 'type' => 'text',  'class' => 'txt-calendar', 'readonly' => 'true'));
		echo $this->Form->input('type' , array('label'=>'Cash Back Type ( CPC, CPS)'));
        echo $this->Form->input('url', array('label'=>'Cash Back Url'));
		#echo $this->Form->input('pincodes', array('type'=>'text'));
		#echo $this->Form->input('shipping_time');
		
		echo $this->Form->input('utm');
		echo $this->Form->input('affiliatekey', array('label'=>'Affiliate Key'));
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		
		#echo $this->Form->input('refund_policy', array('type'=>'textarea', 'label'=>'Refund Policy'));
		
        echo $this->Form->input('terms_cond', array('type'=>'textarea', 'label'=>'Terms & Conditions'));
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
