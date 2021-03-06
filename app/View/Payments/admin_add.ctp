
<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>


<div class="payments form">
<?php echo $this->Form->create('Payment', array('id'=>'frmProductAddStep2')); ?>

	<fieldset>
		<legend><?php echo __('Add Payment'); ?></legend>
	<?php
		echo $this->Form->input('customer_id');
		echo $this->Form->input('slug');
		echo $this->Form->input('neft');
		echo $this->Form->input('bank_account');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('branch_name');
		echo $this->Form->input('acc_no');
		echo $this->Form->input('ifsc_code');
		echo $this->Form->input('Cheque');
		echo $this->Form->input('name_on_address');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('pincode');
		echo $this->Form->input('mobile');
		echo $this->Form->input('createdby');
		echo $this->Form->input('createddate');
		echo $this->Form->input('modifiedby');
		echo $this->Form->input('modifieddate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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
