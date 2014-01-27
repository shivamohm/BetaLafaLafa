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
						<span id="neft">NEFT |</span> <span id="cheque">Cheque</span></th>
				</tr>
		</table>
		<?php
			
			echo $this->Form->create($model);
			echo "<div id='neftForm'>"; ?>
			<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Enter Bank details)'); ?></h3>
			<?php
			echo $this->Form->input('title', array('label' => __d('customers', 'Name on Bank Account')));
			echo $this->Form->input('desc', array( 'label' => __d('customers', 'Bank name')));
			echo $this->Form->input('user_name', array( 'label' => __d('customers', 'Bank Branch Name')));
			#echo $this->Form->input('email', array( 'label' => __d('customers', 'Bank Account number')));
			#echo $this->Form->input('email', array( 'label' => __d('customers', 'IFSC Code for Bank')));
			echo "</div>";
			
			echo "<div id='chequeForm'>"; ?>
			<h3 style="padding-left:180px; padding-bottom:20px; padding-top:10px;">
					<?php echo __d('customers', 'Payment settings (Enter Cheque details)'); ?></h3>
			<?php
			echo $this->Form->input('username', array('label' => __d('customers', 'Full Name on Address')));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'Full Address')));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'City')));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'State')));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'Postal Code')));
			echo $this->Form->input('email', array( 'label' => __d('customers', 'Contact Number')));
			echo "</div>";
			
			
			echo $this->Form->end(__d('customers', 'Save Changes'));
		?>
	</fieldset>
</div>

