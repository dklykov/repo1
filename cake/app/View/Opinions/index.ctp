<?php
//$this->log('Index data: '.print_r($opinions,true),'debug');
$this->start('header'); 
echo $this->element('Title');
echo $this->element('Menu');
$this->end();
?>
<div class="opinions index">
	<h2><?php //echo __('рецензии');?></h2>
	<?php 
/*	$bbcodeText='[b]Hello everyone!![/b]'; 
    echo '<br />Before<br />'.$bbcodeText; 
    echo '<br />After<br />'; 
    echo  $this->Bbcode->doShortcode($bbcodeText) ;*/
    ?> 
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('назад'), array(), null, array('class' => 'prev disabled'));
		
    ?>
	<?php
	 	echo $this->Paginator->numbers(array('separator' => '-'));
    ?>
    <?php 
	 	echo $this->Paginator->next(__('вперёд') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
<?php foreach ($opinions as $opinion): ?>
<div class="opitem">     
<div class="optitle">
	<?php echo $this->Html->link($opinion['Opinion']['title'], array('action' => 'view', $opinion['Opinion']['id'])); ?>
</div>
	<div class="opinfo">
	Категория: <?php echo $this->Html->link($opinion['Stuff']['Area']['descr'],array('action'=>'index',$opinion['Stuff']['Area']['id'])); ?> 
	<br>
	Создано: <?php echo h(date("d.m.y H:i",strtotime($opinion['Opinion']['created']))); ?> 
	пользователем <?php echo $this->Html->link($opinion['User']['name'],array('controller'=>'Users','action'=>'view',$opinion['User']['id']));
	if (($opinion['Opinion']['user_id']==$uid) or ($uname=='admin'))
	{
		echo '<p>'.$this->Html->link('редактировать',array('action'=>'edit',$opinion['Opinion']['id']));
	    echo  ' '.$this->Html->link('удалить',array('action'=>'delete',$opinion['Opinion']['id']));
	}
	?>
	</div>
	<div class="optext">
	<?php 
	// echo $this->Html->link(mb_substr($this->Bbcode->doShortcode($opinion['Opinion']['text']),0,100).'...',array('action'=>'view',$opinion['Opinion']['id']));
	echo mb_substr($this->Bbcode->doShortcode($opinion['Opinion']['text']),0,900).'...';
	echo ''.$this->Html->link('читать далее',array('action'=>'view',$opinion['Opinion']['id']));
	?>
	</div>
</div>
<?php endforeach; ?>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Страница {:page} of {:pages}, showing {:current} записей из  {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('назад'), array(), null, array('class' => 'prev disabled'));
		
    ?>
	<?php
	 	echo $this->Paginator->numbers(array('separator' => '-'));
    ?>
    <?php 
	 	echo $this->Paginator->next(__('вперёд') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php $this->start('sidebar');?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Новая запись'), array('action' => 'add')); ?></li>
	</ul>
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
echo $this->element('TagCloud');
$this->end();?>
