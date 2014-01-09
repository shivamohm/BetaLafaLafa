<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'admin_delete', $this->Form->value('Brand.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Brand.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('action' => 'admin_index')); ?></li>
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'admin_add')); ?> </li>
	</ul>
</div>
<div class="brands form">
<?php echo $this->Form->create('Brand'); ?>
	<fieldset>
		<legend><?php echo __('Edit Brand'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('image', array('type'=>'file'));
		echo $this->Form->input('shortdesc', array('type'=>'textarea','label'=>'Short Desc',  'class' => 'editorNotRequired tipOn', 'title' => 'Max 250 characters allowed','maxlength'=>'250'));
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		echo $this->Form->input('modifiedby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('modifieddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
		/*echo $this->Form->input('noofclick');
		echo $this->Form->input('createdby');
		echo $this->Form->input('createddate');
		echo $this->Form->input('modifiedby');
		echo $this->Form->input('modifieddate');*/
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
