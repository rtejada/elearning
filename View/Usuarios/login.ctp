<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Iniciar Sesi&oacute;n'); ?></legend>
        <?php echo $this->Form->input('login', array('type' => 'text', 'style' => 'width: 150px', 'maxlength' => 20));
        echo $this->Form->input('password', array('type' => 'password', 'style' => 'width: 150px',  'maxlength' => 20));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
