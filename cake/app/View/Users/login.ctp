<!-- <?php print_r($_POST);?>-->
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
    <?php
        echo $this->Form->input('username',array('label'=>'Логин','class'=>'authwindow'));
        echo $this->Form->input('pass',array('label'=>'Пароль','class'=>'authwindow','type'=>'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
