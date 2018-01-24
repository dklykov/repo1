<div class="goals index">
	<h2><?php echo __('Goals');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('goal_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('descr','Area');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('achieved');?></th>
			<th><?php echo $this->Paginator->sort('rating');?></th>
			<th><?php echo $this->Paginator->sort('tags');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($goals as $goal): ?>
	<tr>
		<td><?php echo h($goal['Goal']['goal_id']); ?>&nbsp;</td>
		<td><?php echo h($goal['Goal']['title']); ?>&nbsp;</td>
		<td><?php echo h($goal['Area']['descr']); ?>&nbsp;</td>
		<td><?php echo h($goal['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($goal['Goal']['created']); ?>&nbsp;</td>
		<td><?php echo h($goal['Goal']['achieved']); ?>&nbsp;</td>
		<td><?php echo h($goal['Goal']['rating']); ?>&nbsp;</td>
		<td><?php echo h($goal['Goal']['tags']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $goal['Goal']['goal_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $goal['Goal']['goal_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $goal['Goal']['goal_id']), null, __('Are you sure you want to delete # %s?', $goal['Goal']['goal_id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Goal'), array('action' => 'add')); ?></li>
	</ul>
<?php
	if (isset($userid)) 
	{
	 echo "<br>";
	 echo $this->Html->link('Logout', array('controller' => 'Users','action'=>'logout'));
	 echo "<br>";
	 echo "<br>";
 	 echo "<br>";
	 echo $this->Html->link('My Goals', array('controller' => 'Users','action'=>'mygoals'));
	}
	 else 
	echo $this->Html->link('Login', array('controller' => 'Users','action'=>'login'));
?>
</div>
