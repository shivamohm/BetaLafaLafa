
<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Customers'), array('controller'=>'customers/customers','action' => 'admin_add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller'=>'customers/','action' => 'admin_index')); ?></li>
		<!--li><?php echo $this->Html->link(__("List Customers ",true),"/admin/customers/customers/"); ?></li-->
	</ul>
</div>


<script>
	
$( document ).ready(function() {
    // $('#neftForm').hide();
     $('#chequeForm').hide();
      $('#neft').css('color','#FF9000');
	 $('#neft').click(
      function() {
         
         $('#neftForm').show();
         $('#neft').css('color','#FF9000');
         $('#cheque').css('color','black');
         $('#chequeForm').hide();
     });
      $('#cheque').click(
      function() {
         
         $('#chequeForm').show();
         $('#neft').css('color','black');
         $('#cheque').css('color','#FF9000');
         $('#neftForm').hide();
     });
     
  });
</script>

<div class="payments view">
	<fieldset>
		<legend><?php echo __d('customers', 'Payment Settings'); ?></legend>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th style="padding-left:180px; padding-bottom:20px; padding-top:10px;" >
						<span id="neft">NEFT </span> | <span id="cheque">Cheque</span></th>
				</tr>
			</table>
			<dl>
				<div style="width:100%; float:left">
					<div style="width:35%; font-weight:bold;float:left"><?php echo __('Customer Slug'); ?></div>	
					<div style="width:65%;float:left" ><?php echo $this->Html->link($payment['Customer']['slug'], array('controller' => 'customers/customers', 'action' => 'view', $payment['Customer']['slug'])); ?></div>	
				</div>
				<div style="width:100%; float:left">
					<div style="width:35%; font-weight:bold;float:left"><?php echo __('EMail'); ?></div>	
					<div style="width:65%;float:left" ><?php echo h($payment['Customer']['email']); ?></div>	
				</div>
				
						
			
				
				<div id='neftForm'>
					<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Bank details)'); ?></h3>
					
					<?php if($payment['Payment']['neft'] == "yes"){ ?>
						
						<div style="width:100%; float:left">
							<div style="width:35%; font-weight:bold;float:left"><?php echo __('Bank Account'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['bank_account']); ?>
							</div>	
						</div>
						
						<div style="width:100%; float:left">
							<div style="width:35%; font-weight:bold;float:left"><?php echo __('Bank Name'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['bank_name']); ?></div>	
						</div>
				
						<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Branch Name'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['branch_name']); ?></div>	
						</div>
						
						<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Acc No'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['acc_no']); ?></div>	
						</div>
						<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Ifsc Code'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['ifsc_code']); ?></div>	
						</div>
					
					<?php } ?>
				</div>
				
				<div id='chequeForm'>
					<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Cheque details)'); ?></h3>
			
					
					<?php 
					
					if($payment['Payment']['cheque'] == "yes"){
					?>
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Name On Address'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['name_on_address']); ?></div>	
					</div>
					
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Address'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['address']); ?></div>	
					</div>
					
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('City'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['city']); ?></div>	
					</div>
					
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('State'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['state']); ?></div>	
					</div>
					
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Pincode'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['pincode']); ?></div>	
					</div>
					<div style="width:100%; float:left">
							<div style="width:35%;float:left;font-weight:bold;"><?php echo __('Mobile'); ?></div>	
							<div style="width:65%;float:left" ><?php echo h($payment['Payment']['mobile']); ?></div>	
					</div>
					
					
					<?php } ?>
				</div>
		
	</dl>
	
	</fieldset>
</div>
