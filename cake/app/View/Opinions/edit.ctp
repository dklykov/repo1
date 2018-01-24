<?php $this->start('header'); 
echo $this->element('Title');
echo $this->element('Menu');
$this->end();
?>
<div class="opinions form">
<?php echo $this->Form->create('Opinion');?>
	<fieldset>
		<legend><?php echo __('Редактировать отзыв: '.$this->data['Opinion']['title']); ?></legend>
	<?php
    	echo $this->Form->input('id',array('type'=>'hidden'));
    	echo $this->Form->input('title',array('type'=>'hidden'));
	    echo $this->Form->input('text',array('label'=>'Текст рецензии'));
	 ?>
	</fieldset>
	<?php 	echo $this->Form->create('Tagged');?>
	<fieldset>
	<legend><?php echo __('Тэги'); ?></legend>
 <?php 
 //$this->log('Data for edit: '.print_r($this->data, true),'debug');
	echo '<table><tr>';	
	$i=0;
	foreach ($this->data['Tagged'] as $t)
	{
		echo "<td>";
		echo $this->Form->input($i.'.id',array('type'=>'hidden'));
		echo $this->Form->input($i.'.tag_id',array('label'=>'','class'=>'taginput','options'=>$tags,'empty' => 'Выберите тег'));
		$i++;
		echo "</td>";
	}
	for ($i=$i;$i<=4;$i++)
	{
	echo "<td>";
	echo $this->Form->input($i.'.tag_id',array('label'=>'','class'=>'taginput','options'=>$tags,'empty' => 'Выберите тег'));
	echo "</td>";
	}	
	echo '</tr></table>';
	$i=0;
	echo $this->Form->create('Tag');
	foreach ($this->data['Tagged'] as $t)
	{
	 echo $this->Form->input($i.'.name',array('type'=>'hidden'));
	 $i++;
	}
	for ($i=$i;$i<=4;$i++)
	{
   	echo $this->Form->input($i.'.name',array('type'=>'hidden'));
	}
	echo $this->Form->end(__('Сохранить'));
	?>
	</fieldset>
	
</div>
<?php $this->start('sidebar');?>
<div class="actions">
<?php
if( $loggedIn ) 
 echo $this->element('Logout');
 else  echo $this->element('Login');
  //echo $this->Html->link('My Opinions', array('controller' => 'Users','action'=>'myopinions'));
  echo $this->element('OpenIdAuth');
	?>	
</div>
<?php $this->end();?>
<?php $this->start('rightcol');
//echo $this->element('TagCloud');
$this->end();?>
