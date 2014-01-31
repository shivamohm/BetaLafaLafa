<div class="actions">
<?php if ($this->Session->read('Auth.User.id')){?>
	<h3><?php echo __('My Account'); ?></h3>
<?php }else{ ?>

	<h3><?php echo __('Action'); ?></h3>
<?php } ?>
	<ul>
		<?php if (!$this->Session->read('Auth.User.id')) : ?>
			<li><?php echo $this->Html->link(__d('customers', 'Login'), array('action' => 'login')); ?></li>
            <?php #if (!empty($allowRegistration) && $allowRegistration)  : ?>
			<li><?php echo $this->Html->link(__d('customers', 'Register an account'), array('action' => 'add')); ?></li>
            <?php #endif; ?>
		<?php else : ?>
			<li><?php echo $this->Html->link(__("Dashboard",true),"/customers/dashboard") ?></li>
			<li><?php echo $this->Html->link(__("Personal Detail",true),"/customers/edit") ?></li>
			<li><?php echo $this->Html->link(__("Payment Setting",true),"/customers/payment") ?></li>
			
			<li><?php echo $this->Html->link(__("Personal Details",true),"/customers/view") ?></li>
			<li><?php echo $this->Html->link(__("Change Password",true),"/customers/change_password") ?></li>
			<!--li><?php echo $this->Html->link(__("Logout",true),"/customers/logout") ?></li-->
			<li> <?php 
			if($this->Session->read('FB.Me.id') == ""){
			echo $this->Html->link(__("Logout",true),"/customers/logout");
			}else{
			echo $this->Facebook->logout(array('redirect' => array('controller' => 'customers', 'action' => 'logout')));
			}
			
?></li>

			
		<?php endif ?>
		<?php if($this->Session->read('Auth.Customer.is_admin')) : ?>
            <li>&nbsp;</li>
            <li><?php echo $this->Html->link(__d('customers', 'List Users'), array('action'=>'index'));?></li>
        <?php endif; ?>
        <?php if ($this->Session->read('Auth.Customer.id')) : ?>
        <li><?php echo $this->Html->link(__d('customers', 'Logout'), array('action' => 'logout')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'My Account'), array('action' => 'edit')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Change password'), array('action' => 'change_password')); ?>
			<?php endif; ?>
	</ul>
</div>
