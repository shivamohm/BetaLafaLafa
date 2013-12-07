	<?php echo $this->element('dashboard'); ?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'admin_index'));?></li>
		<!--li><?php echo $this->Html->link(__('List Deals'), array('controller' => 'deals', 'action' => 'admin_index')); ?> </li-->
		<li><?php echo $this->Html->link('Add Task',   array('controller' => 'Tasks', 'action' => 'admin_add')); ?></li>
		<li><?php echo $this->Html->link('List Brand',   array('controller' => 'Brands', 'action' => 'admin_index')); ?></li>
		<li><?php echo $this->Html->link('List Category',   array('controller' => 'Categories', 'action' => 'admin_index')); ?></li>
		<!--li><?php echo $this->Html->link(__('New Deal'), array('controller' => 'deals', 'action' => 'admin_add')); ?> </li-->
		<!--li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'admin_index')); ?> </li-->
		<li><?php echo $this->Html->link(__('Settings'), array('controller' => '', 'action' => 'dashboard')); ?> </li>
	</ul>
</div>

<div class="vendors index">
	
	<h2>Task</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="6"> </td>
	</tr>
	<tr>
		<th><input type='checkbox' name='checkall' onclick='checkedAll(frm1);'></th>
		<th>Title</th>
		<th>User Name</th>
		<th>Status</th>
		<!--th>Created</th>
		<th>Modified</th-->
		<th>Actions</th>
	</tr>
	<?php if(empty($tasks)): ?> 
		
		<tr>
			<td colspan="5">There are no tasks in this list </td>
			
		</tr>
	<?php else: ?>
	<?php foreach ($tasks as $task): ?>
		<tr>
			<td><input type="checkbox" name="chk1[]" id="chk1[]" value="lksjdsadsad"  > </td>
			<td><?php echo $task['Task']['title'] ?> </td>
			<td><?php echo $task['Task']['user_name'] ?> </td>
			<td><?php  if($task['Task']['status'] == "Y"){ echo "Active";}else{ echo "In-Active";}?></td>
			<!--td><?php echo $task['Task']['created'] ?></td-->
			<!--td><?php echo $task['Task']['modified'] ?></td-->
			<td> 
			<?php #echo $this->Html->link('Delete', array('action' => 'delete', $task['Task']['id']),  array('confirm' => 'Are you sure?')); ?>
			<?php echo $this -> Html -> link($this->Html->image("delete.png", array('border'=>'0px','title'=>'Delete')), 
			array( 'action' => 'delete', $task['Task']['id']),array('escape'=> false));   ?> |
			
			<?php echo $this -> Html -> link($this->Html->image("edit.png", array('border'=>'0px','title'=>'Edit')), 
			array( 'action' => 'edit', $task['Task']['id']),array('escape'=> false));   ?>
			<?php # echo $this->Html->link('Edit', array('action' => 'edit', $task['Task']['id'])); ?></td>
		</tr>
		
		<?php endforeach; ?> 
		<?php endif; ?>
	</table>
	 <?php 
		echo $this->Form->end();
	?>
	<p>
	<?php
	 echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	)); 
	?>	</p>

	<div class="paging">
	<?php 
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	 ?>
	</div>
	
</div>

