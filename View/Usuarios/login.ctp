<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Usuario'); ?>

    <h2><?php echo __('Iniciar Sesi&oacute;n'); ?></h2>
    <dl>
        <dt><?php echo __('Login'); ?></dt>
        <dd>
            <?php echo $this->Form->input('login', array('label' => '', 'type' => 'text', 'style' => 'width: 150px', 'maxlength' => 20)); ?>
            &nbsp;
        </dd>
        <dt class="vacio"></dt>
        <dd></dd>
        <dt><?php echo __('Password'); ?></dt>
        <dd>
            <?php echo $this->Form->input('password', array('label' => '', 'type' => 'password', 'style' => 'width: 150px',  'maxlength' => 20)); ?>
            &nbsp;
        </dd>
    </dl>
    <?php echo $this->Form->end(__('Login')); ?>
</div>
