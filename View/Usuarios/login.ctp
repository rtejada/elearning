<div class="users ">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Iniciar Sesi&oacute;n'); ?></legend>
        <?php echo $this->Form->input('login', array('type' => 'text', 'length' => 20, 'maxlength' => 20));
        echo $this->Form->input('password', array('type' => 'password', 'size' => 20,  'maxlength' => 20));
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
