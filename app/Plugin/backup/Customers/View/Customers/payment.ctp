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

<?php echo $this->element('Customers.Customers/sidebar'); ?>
<div class="customers index form">
	
	<fieldset>

		<legend><?php echo __d('customers', 'Payment Settings'); ?></legend>
		
		<table cellpadding="0" cellspacing="0">
                    <tr>
                            <th style="padding-left:180px; padding-bottom:20px; padding-top:10px;" >
                            <span id="neft">NEFT </span> | <span id="cheque">Cheque</span></th>
                    </tr>
		</table>
		<?php
			
			echo "<div id='neftForm'>"; ?>
			<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Enter Bank details)'); ?></h3>
			<?php
			echo $this->Form->create($model,array('id'=>'frmProductAddStep2'));
			echo $this->Form->input('id', array('value'=>$payments['Payment']['id']));
			echo $this->Form->input('neft', array('type'=>'hidden','value'=>'yes'));
			echo $this->Form->input('cheque', array('maxlength'=>'15','type'=>'hidden','value'=>''));
			echo $this->Form->input('bank_account', array('maxlength'=>'15','required' => false, 'value'=>$payments['Payment']['bank_account'],'label' => __d('customers', 'Name on Bank Account')));
			echo $this->Form->input('bank_name', array('maxlength'=>'15', 'value'=>$payments['Payment']['bank_name'], 'label' => __d('customers', 'Bank name')));
			echo $this->Form->input('branch_name', array('maxlength'=>'15','value'=>$payments['Payment']['branch_name'],'label' => __d('customers', 'Bank Branch Name')));
			echo $this->Form->input('acc_no', array('maxlength'=>'15','value'=>$payments['Payment']['acc_no'], 'label' => __d('customers', 'Bank Account number')));
			echo $this->Form->input('ifsc_code', array('maxlength'=>'11', 'value'=>$payments['Payment']['ifsc_code'], 'label' => __d('customers', 'IFSC Code for Bank')));
			echo $this->Form->end(__d('customers', 'Save Changes'));
			echo "</div>";
			
			echo "<div id='chequeForm'>"; ?>
			<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Enter Cheque details)'); ?></h3>
			<?php 
			echo $this->Form->create($model);
			echo $this->Form->input('id', array('value'=>$payments['Payment']['id']));
			echo $this->Form->input('cheque', array('type'=>'hidden','value'=>'yes'));
			echo $this->Form->input('neft', array('type'=>'hidden','value'=>''));
			echo $this->Form->input('name_on_address', array('maxlength'=>'25','value'=>$payments['Payment']['name_on_address'],'label' => __d('customers', 'Full Name on Address')));
			echo $this->Form->input('address', array('maxlength'=>'35','value'=>$payments['Payment']['address'], 'label' => __d('customers', 'Full Address')));
			echo $this->Form->input('city', array('maxlength'=>'15','value'=>$payments['Payment']['city'], 'label' => __d('customers', 'City')));
			echo $this->Form->input('state', array('maxlength'=>'15', 'value'=>$payments['Payment']['state'],'label' => __d('customers', 'State')));
			echo $this->Form->input('pincode', array('maxlength'=>'6','value'=>$payments['Payment']['pincode'], 'label' => __d('customers', 'Postal Code')));
			echo $this->Form->input('mobile', array('maxlength'=>'10','value'=>$payments['Payment']['mobile'], 'label' => __d('customers', 'Contact Number')));
			echo $this->Form->end(__d('customers', 'Save Changes'));
			echo "</div>";
		?>
	</fieldset>
</div>
<script type="text/javascript">
	
var frmValidator = jQuery("form#frmProductAddStep2").validate({
                        errorContainer : jQuery(".form-validations"),
                        errorLabelContainer : jQuery(".form-validations ol"),
                        wrapper : 'li',
                        meta : 'validate',
                        rules : {

                        },
                        messages : {

                        }
                });
	

</script>

