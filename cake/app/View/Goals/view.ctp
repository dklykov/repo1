<div class="goals view">
<h2><?php  echo __('Goal');?></h2>
	<dl>
		<dt><?php echo __('Goal Id'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['goal_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descr'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($goal['Area']['descr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Name'); ?></dt>
		<dd>
			<?php echo h($goal['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Achieved'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['achieved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['tags']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Goal'), array('action' => 'edit', $goal['Goal']['goal_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Goal'), array('action' => 'delete', $goal['Goal']['goal_id']), null, __('Are you sure you want to delete # %s?', $goal['Goal']['goal_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Goals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal'), array('action' => 'add')); ?> </li>
	</ul>
</div>
