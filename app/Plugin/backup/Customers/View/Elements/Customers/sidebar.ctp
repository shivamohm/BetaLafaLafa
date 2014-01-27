<div class="actions">
<?php if ($this->Session->read('Auth.User.id')){?>
	<h3><?php echo __('My Account'); ?></h3>
<?php }else{ ?>

	<h3><?php echo __('Action'); ?></h3>
<?php } ?>
	<ul>
		<?php if (!$this->Session->read('Auth.User.id')) : ?>
			<li><?php echo $this->Html->link(__d('customers', 'Login'), array('action' => 'login')); ?></li>
            <?php if (!empty($allowRegistration) && $allowRegistration)  : ?>
			<li><?php echo $this->Html->link(__d('customers', 'Register an account'), array('action' => 'add')); ?></li>
            <?php endif; ?>
		<?php else : ?>
			<li><?php echo $this->Html->link(__d('customers', 'Dashboard'), array('action' => 'dashboard')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Personal Details'), array('action' => 'edit')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Payment Setting'), array('action' => 'payment')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Personal Details'), array('action' => 'view')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Change password'), array('action' => 'change_password')); ?>
			<li><?php echo $this->Html->link(__d('customers', 'Logout'), array('action' => 'logout')); ?>
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
