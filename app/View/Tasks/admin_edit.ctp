	<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'admin_index'));?></li>
		<!--li><?php echo $this->Html->link(__('List Deals'), array('controller' => 'deals', 'action' => 'admin_index')); ?> </li-->
		<!--li><?php echo $this->Html->link(__('New Deal'), array('controller' => 'deals', 'action' => 'admin_add')); ?> </li-->
		<!--li><?php echo $this->Html->link(__('List Users'), array('controller' => 'allUsers', 'action' => 'admin_index')); ?> </li-->
		<!--li><?php echo $this->Html->link(__('New Assigned'), array('controller' => 'users', 'action' => 'add')); ?> </li-->
	</ul>
</div>
<div class="tasks form">
<?php
$options = array(""=>"--Select--","Y"=>"Active", "N"=>"In-Active");
?>
<?php echo $this -> Form -> create('Task', array('name' => 'task'));?>
<fieldset>
		<legend><?php echo __('Edit Task'); ?></legend>
    <?php
		echo $this->Form->input('id', array('type' => 'hidden', 'value'=>$Tasks['Task']['id']));
		echo $this->Form->input('group_id', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupId()));
		echo $this->Form->input('user_id', array('type' => 'hidden', 'value'=>$this->UserAuth->getUserId()));
		echo $this->Form->input('user_name', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('title');
		echo $this->Form->input('desc');
		echo $this->Form->input('status', array('options' => $options, 'default' => 'N'));
	
    echo $this->Form->end('Save Tasks');
?></fieldset>

</div>
