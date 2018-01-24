<div id="native_auth">
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',array('action' => 'login')); ?>
    <fieldset>
    <?php
        echo $this->Form->input('username',array('label'=>'Логин','class'=>'authwindow'));
        echo $this->Form->input('pass',array('label'=>'Пароль','class'=>'authwindow','type'=>'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Войти')); ?>
</div>
<div id="reg">
<?php echo $this->Html->link('Регистрация',array('controller' => 'Users','action'=>'register'));?>
</div>
</div>
	