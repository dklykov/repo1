<div class="goals form">
<?php echo $this->Form->create('Goal');?>
	<fieldset>
		<legend><?php echo __('Add Goal'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('descr');
		echo $this->Form->input('area_id',array('label'=>'','options'=>$areas));
		echo $this->Form->input('date_ct',array('label'=>'Day to achieve'));
		echo $this->Form->input('tags');
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Goals'), array('action' => 'index'));?></li>
	</ul>
</div>
