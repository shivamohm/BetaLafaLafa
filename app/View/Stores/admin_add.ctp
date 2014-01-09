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
	
	
		echo $this->Form->input('Brand');
		echo $this->Form->input('Category');
		echo $this->Form->input('name');
		echo $this->Form->input('storeurl', array('label'=>'Store Url'));
		echo $this->Form->input('affiliatesurl', array('label'=>'Affiliates Url'));
		echo $this->Form->input('storedesc', array('type'=>'textarea', 'label'=>'Short Desc', 'class' => 'editorNotRequired tipOn', 'title' => 'Max 250 characters allowed','maxlength'=>'250'));
		echo $this->Form->input('image', array('type'=>'file', 'label'=>'Store Image'));
		echo $this->Form->input('owner_email');
		echo $this->Form->input('owner_name');
		echo $this->Form->input('owner_mobile');
                echo $this->Form->input('status', array('empty' => '--Select--','options'=>array('1'=>"Active", '0'=>'In-Active')));
                #echo $this->Form->input('store_offer_detail', array('type' => 'textarea', 'label'=>'Store Offer Detail'));
                echo $this->Form->input('store_offer_detail', array('id' => 'store_offer_detail', 'label' => 'Store Offer Detail'));
		echo $this->Form->input('createdby', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('createddate', array('type' => 'hidden', 'value'=>date('Y-m-d h:m:s')));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
