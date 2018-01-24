<?php $this->start('header');
echo $this->element('Title');
echo $this->element('Menu'); 
$this->end();
?>
<div class="opinions view">
<!-- <h2><?php  echo __('Мнение	');?></h2> -->
<div class="opitem">     
<div class="optitle">
	<?php echo h($opinion['Opinion']['title']); ?>
</div>
	<div class="opinfo">
	<?php $this->log('View data: '.print_r($opinion,true),'debug');?>
	Категория: <?php echo $this->Html->link($opinion['Stuff']['Area']['descr'],array('action'=>'index',$opinion['Stuff']['Area']['id'])); ?> 
	<br>
	Создано: <?php echo h(date("d.m.y H:i",strtotime($opinion['Opinion']['created']))); ?> 
	пользователем <?php echo $this->Html->link($opinion['User']['name'],array('controller'=>'Users','action'=>'view',$opinion['User']['id']));
	?>	
	</div>
	<div class="optext">
	<?php echo $this->Bbcode->doShortcode(($opinion['Opinion']['text'])); ?>
	</div>
</div>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Opinion'), array('action' => 'edit', $opinion['Opinion']['opinion_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Opinion'), array('action' => 'delete', $opinion['Opinion']['opinion_id']), null, __('Are you sure you want to delete # %s?', $opinion['Opinion']['opinion_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Opinions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opinion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
-->
<?php $this->start('sidebar');?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Новая запись'), array('action' => 'add')); ?></li>
	</ul>
<?php
   if( $loggedIn )
   echo $this->element('Logout');
   else
   echo $this->element('Login');
  //echo $this->Html->link('My Opinions', array('controller' => 'Users','action'=>'myopinions'));
  echo $this->element('OpenIdAuth');
	?>	
</div>
<?php $this->end();?>