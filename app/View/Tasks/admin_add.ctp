	<?php echo $this->element('dashboard'); ?><div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'admin_index'));?></li>
		<li><?php echo $this->Html->link('Add Task',   array('controller' => 'Tasks', 'action' => 'admin_add')); ?></li>
		
	</ul>
</div>
<?php 
$options = array(""=>"--Select--","Y"=>"Active", "N"=>"In-Active");
?>
<div class="tasks form">
	<?php echo $this -> Form -> create('Task',array('action'=>'add'));?>
	<fieldset>
		<legend>
			<?php echo __('Add Task');?>
		</legend><?php # echo $this -> element('vendorsteps');?>
		<?php
			#echo $userId 	= $this->UserAuth->getUserId();
			#echo $groupId = $this->UserAuth->getGroupId();
			echo $this->Form->input('group_id', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupId()));
			echo $this->Form->input('user_id', array('type' => 'hidden', 'value'=>$this->UserAuth->getUserId()));
			echo $this->Form->input('user_name', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
			echo $this->Form->input('title');
			echo $this->Form->input('desc');
			
			echo $this->Form->input('status', array('options' => $options, 'default' => '--Select--'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('save'));?>
</div>
