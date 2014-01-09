<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'admin_index')); ?></li>
		<li><?php echo $this->Html->link(__('List Brand'), array('controller' => 'brands', 'action' => 'admin_index')); ?></li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'admin_add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'admin_index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'admin_add')); ?> </li>

		<!--li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li-->
		<!--li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li-->
		<!--li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li-->
	</ul>
</div>
<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		$optionParentId['0'] = "--Select--";
		foreach($parentCategories as $key=>$value){
			$optionParentId[$key] = $value;
		}
	
		echo $this->Form->input('name', array( 'label'=>'Category Name'));
		echo $this->Form->input('parent_id', array('options'=>$optionParentId, 'label'=>'Parent Category '));
		echo $this->Form->input('image', array('type'=>'file', 'label'=>'Category Image'));
		echo $this->Form->input('shortdesc', array('type'=>'textarea', 'label'=>'Short Desc',  'class' => 'editorNotRequired tipOn', 'title' => 'Max 250 characters allowed','maxlength'=>'250'));
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
