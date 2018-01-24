<div class="areas form">
<?php echo $this->Form->create('Area');?>
	<fieldset>
		<legend><?php echo __('Add Area'); ?></legend>
	<?php
		echo $this->Form->input('descr');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Areas'), array('action' => 'index'));?></li>
	</ul>
</div>
