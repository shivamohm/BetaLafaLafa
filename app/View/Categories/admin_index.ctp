<?php echo $this->element('dashboard'); ?>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'admin_add')); ?></li>
	<li><?php echo $this->Html->link(__('List Brand'), array('controller' => 'brands', 'action' => 'admin_index')); ?></li>
	<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'admin_add')); ?> </li>
	<li><?php echo $this->Html->link(__('List Stores'), array('controller' => 'stores', 'action' => 'admin_index')); ?> </li>
	<li><?php echo $this->Html->link(__('New Store'), array('controller' => 'stores', 'action' => 'admin_add')); ?> </li>
        
	<!--li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li-->
	</ul>
</div>
<div class="categories index">
	<h2><?php echo __('Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			
			<th><?php echo $this->Paginator->sort('shortdesc'); ?></th>
			<th><?php echo $this->Paginator->sort('noofclick'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
        
        <?php echo $this->Form->create('Category', array('url' => array_merge(array('action' => 'admin_index'), $this->params['pass'])
		, 'name'=>'Category')); ?>
       
        
         <td><?php echo $this -> Form -> input('id', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '1'));?></td>
         <td><?php echo $this -> Form -> input('name', array('type' => 'text', 'div' => false, 'label' => '', 'size' => '10'));?></td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td><?php echo $this -> Form -> input('status', array('label' => '', 'div' => false, 'type' => 'select', 'options' => array('1' => 'Active', '0' => 'In-Active'), 'empty' => 'All'));                        ?></td>
         
         <td class="actions">
             <?php
                echo $this -> Html -> link(__('Search'), 'javascript:void(0)', array("onclick" => "Category.submit();", "class" => "search-action"));
		echo $this -> Form -> end();
            ?></td>
	</tr>
        
        
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
		</td>
		
		<td><?php echo h($category['Category']['shortdesc']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['noofclick']); ?>&nbsp;</td>
		<td><?php if($category['Category']['status'] == 1){ echo "Active";}else if($category['Category']['status']==0){ echo "In-Active";} ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
