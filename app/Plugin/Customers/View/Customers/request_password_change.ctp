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
<?php echo $this->element('Customers.Customers/sidebar'); ?>


<div class="customers form">

<?php echo $this->Form->create($model, array('url' => array('admin' => false,	'action' => 'reset_password'))); ?>
<fieldset>
			<legend><?php echo __d('customers', 'Forgot your password?'); ?></legend>
			<h2><p><?php echo __d('customers', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p></h2>
			<?php
			echo $this->Form->input('email', array(	'label' => __d('customers', 'Your Email')));
			echo "<div style='padding-right:500px;'>".$this->Form->submit(__d('customers', 'Submit'))."</div>";
			echo $this->Form->end();
?>
</fieldset>

</div>
