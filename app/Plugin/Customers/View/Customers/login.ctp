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
<?php echo $this->Session->flash('auth');?>
<?php echo $this->element('Customers.Customers/sidebar'); ?></li>
<div class="customers index">
	<h2><?php echo __d('customers', 'Login'); ?></h2>
	<fieldset>
		<?php
			echo $this->Form->create($model, array('action' => 'login', 'id' => 'LoginForm'));
			echo $this->Form->input('email', array('label' => __d('customers', 'Email')));
			echo $this->Form->input('password',  array('label' => __d('customers', 'Password')));
			echo '<p>' . $this->Form->input('remember_me', array('type' => 'checkbox', 'label' =>  __d('customers', 'Remember Me'))) . '</p>';
			echo '<p>' . $this->Html->link(__d('customers', 'I forgot my password'), array('action' => 'reset_password')) . '</p>';
			echo $this->Form->hidden('Customer.return_to', array('value' => $return_to));
			echo "<div style='padding-right:290px; '>". $this->Form->end(__d('customers', 'Login'))."</div>";
		?>
		
<?php      
#echo $this->Facebook->login(array('width' => '174','height'=>'25','scope' => 'email'),
 #                    __('Login with Facebook',true));

echo $this->Facebook->login(array('img' => 'connectwithfacebook.gif', 
     'redirect' => array('controller' => 'customers', 'action' => 'index'),'perms' => 'email,publish_stream,publish_actions'));
?>

	</fieldset>
</div>

