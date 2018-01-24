<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset >
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'Логин','class'=>'reginput'));
		echo $this->Form->input('pass',array('label'=>'Пароль','class'=>'reginput','type'=>'password'));
		echo $this->Form->input('pass_confirm',array('label'=>'Пароль еще раз','class'=>'reginput','type'=>'password'));
		echo $this->Form->input('name',array('label'=>'Имя','class'=>'reginput'));
		echo $this->Form->input('location',array('label'=>'Город','class'=>'reginput'));
//		echo $this->Form->input('address',array('label'=>'','class'=>'reginput'));
		echo $this->Form->input('email',array('class'=>'reginput'));
		echo $this->Form->input('web',array('label'=>'Домашняя страница','class'=>'reginput'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

