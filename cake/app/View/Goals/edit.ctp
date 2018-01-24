<div class="goals form">
<?php echo $this->Form->create('Goal');?>
	<fieldset>
		<legend><?php echo __('Edit Goal: '.$this->data['Goal']['title']); ?></legend>
	<?php
		echo $this->Form->input('goal_id');
		echo $this->Form->input('descr',array('label'=>'What to do'));
		echo $this->Form->input('area_id',array('label'=>'','options'=>$areas));
		echo $this->Form->input('date_ct',array('label'=>'Day to achieve'));
		echo $this->Form->input('tags');
		if (!isset($comed))
		{
		 echo $this->Form->input('achieved',array('disabled'=>'true'));
		 echo $this->Form->input('realized',array('label'=>'I do it!','type'=>'checkbox'));
		}
		else
		{
		 echo $this->Form->input('achieved');
		 echo $this->Form->input('realized',array('label'=>'I do it!','type'=>'checkbox','checked'=>'true'));
		}
	?>
	</fieldset>
<?php
 echo $this->Form->end((array('Submit','id'=>'gogo')));
?>
</div>
<div class="actions" >
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Goal.goal_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Goal.goal_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Goals'), array('action' => 'index'));?></li>
	</ul>
</div>
