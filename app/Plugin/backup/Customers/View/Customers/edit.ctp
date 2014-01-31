<?php 
echo $this->Html->css('datePicker');
echo $this->Html->script('date');
echo $this->Html->script('jquery.datePicker');
echo $this -> Html -> script('jquery-ui-timepicker-addon') . "\n";
?>
 
<script type="text/javascript">
        $(function(){
             $( "#birthday" ).datetimepicker({
                dateFormat:'yy-mm-dd',
                //dateFormat:'dd-mm-yy',
                
                hour: 00,
                minute: 00,
                //defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                onSelect: function( selectedDate ) {
                    var date2 = $('#birthday').datepicker('getDate'); 
                    //date2.setDate(date2.getDate()+7); 
                    $( "#birthday" ).datepicker( "option", "", date2);
                }
            });
        });
        
    </script>
    <script type="text/javascript" charset="utf-8">
            $(function()
            {
				$('.date-pick').datePicker({startDate:'1980/01/01'});
            });
		</script>
<?php echo $this->element('Customers.Customers/sidebar'); ?>
<div class="customers form">
	<?php echo $this->Form->create($model); ?>
		<fieldset>
			<legend><?php echo __d('customers', 'Edit '); ?><?php echo $customer[$model]['username']; ?></legend>
			<?php
				echo $this->Form->input('first_name', array('value'=>$customer['Customer']['first_name']));
				echo $this->Form->input('last_name', array('value'=>$customer['Customer']['last_name']));
				#echo $this->Form->input('birthday', array('type' => 'text',  'class' => 'txt-calendar', 'readonly' => 'true','id'=>'birthday','value'=>$customer['Customer']['birthday']));
          
				echo $this->Form->input('birthday', array('type' => 'text', 'size'=>'20',  'class'=>'date-pick', 'readonly' => 'true','id'=>'date','value'=>$customer['Customer']['birthday']));
				
				$checkedNewsletter = ($customer['Customer']['newsletter'] == 1 ? true : false); 
				echo $this->Form->input('newsletter', array('type'=>'checkbox','label'=>'Receive our Weekly Offers Newsletter', 'checked'=>$checkedNewsletter));
				$checkedReferral = ($customer['Customer']['referral'] == 1 ? true : false); 
				echo $this->Form->input('referral', array('type'=>'checkbox','label'=>'Receive email when I get referral earnings', 'checked'=>$checkedReferral));
				
				
				#echo $this->Form->input('slug', array('value'=>$customer['Customer']['slug']));
			?>
			<p>
				<?php echo $this->Html->link(__d('customers', 'Change your password'), array('action' => 'change_password')); ?>
			</p>
		</fieldset>
	<?php echo $this->Form->end(__d('customers', 'Save')); ?>
</div>

