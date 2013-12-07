<?php echo $this->element('dashboard'); ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="stores form">
<?php echo $this->Form->create('Store'); ?>
	<fieldset>
		<legend><?php echo __('Add Store'); ?></legend>
	<?php
	
	/*
	
		foreach($catAll as $key=>$value){
			$id	=	$catAll[$key]['Category']['id'];
			echo $catAll[$key]['Category']['name'];
				echo "<br>---<br>";
			$paId	=	$catAll[$key]['Category']['parent_id'];
			if($paId == 0){
				echo $optionCat[$id]	=	$catAll[$key]['Category']['name'];
				echo "<br>---p 0<br>";
			}else{
					$optionCat[$id]	=	$catAll[$key]['Category']['name'];
					echo "<br>---p 1";
				}
			
			
			}
			pr($optionCat);
		*/
		echo $this->Form->input('Brand');
		echo $this->Form->input('Category');
		echo $this->Form->input('name');
		echo $this->Form->input('storeurl');
		echo $this->Form->input('affiliatesurl');
		echo $this->Form->input('storedesc', array('type'=>'textarea'));
		echo $this->Form->input('image', array('type'=>'file'));
		echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
		echo $this->Form->input('owner_email');
		echo $this->Form->input('owner_name');
		echo $this->Form->input('owner_mobile');
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		/*echo $this->Form->input('noofclick');
		echo $this->Form->input('createdby');
		echo $this->Form->input('createddate');
		echo $this->Form->input('modifiedby');
		echo $this->Form->input('modifieddate'); */
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
