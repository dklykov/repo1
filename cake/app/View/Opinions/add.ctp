<?php $this->start('header'); 
echo $this->element('Title');
echo $this->element('Menu');
$this->end();
?>
<div class="opinions form">
<?php echo $this->Form->create('Opinion');?>
	<fieldset>
		<legend><?php echo __('Добавить рецензию'); ?></legend>
	<?php
	echo $this->Form->create('Stuff');
		echo '<h4>Название произведения:</h4>';
		echo $this->Form->input('Stuff.name',array('label'=>'','class'=>'titleinput'));
		echo '<h4>Название рецензии (по желанию):</h4>';
		echo $this->Form->input('Opinion.title',array('label'=>'','class'=>'titleinput'));
		echo "<div style=\"display:none\" id=\"wikitip\"><ul></ul></div>";
		echo '<h4>Текст рецензии<h4>';
		echo $this->Form->input('Opinion.text',array('label'=>''));
	?>
	<div id="category">
	<?php 	
//		echo $this->Form->input('area_id',array('label'=>'Категория рецензируемого произведения:','id'=>'category','options'=>$areas));
	//	echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
	?>
	</div>
	</fieldset>
<?php 	echo $this->Form->create('Tagged');?>
	<fieldset>
	<legend><?php echo __('Тэги'); ?></legend>
 <?php 
	echo '<table><tr>';	
	for ($i=0;$i<=4;$i++)
	{
		echo "<td>";
		echo $this->Form->input($i.'.tag_id',array('label'=>'','class'=>'taginput','options'=>$tags,'empty' => 'Выберите тег'));
		echo "</td>";
	}
		echo '</tr></table>';

	echo $this->Form->create('Tag');
	for ($i=0;$i<=4;$i++)
	{
    	echo $this->Form->input($i.'.name',array('type'=>'hidden'));
    }
  
    echo $this->Form->input('Stuff.area_id',array('label'=>'Категория рецензируемого произведения:','id'=>'category','options'=>$areas));
    echo $this->Form->input('Stuff.author');
    echo $this->Form->input('Stuff.img',array('type'=>'hidden'));
    echo $this->Form->input('Stuff.year',array('type'=>'hidden'));
    
  ?>
	</fieldset>
<?php 
echo $this->Form->create('Aspam');
echo $this->Form->input('Aword',array('type'=>'text','id'=>'aspam','label'=>'Антиспам: напишите здесь слово '.$word.':'));
echo $this->Form->end(__('Добавить'));
?>

</div>
<?php $this->start('rightcol');
echo $this->element('VCard');
$this->end();?>