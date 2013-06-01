<div id="fondo_index">
<div class="users" align="center">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('Usuario'); ?>

    <table>
        <tr>
            <td colspan="2"><?php echo __('Iniciar Sesi&oacute;n'); ?></td>
        </tr>
        <tr>
            <td><?php echo __('Login'); ?></td>
            <td><?php echo $this->Form->input('login', array('label' => '', 'type' => 'text', 'style' => 'width: 150px', 'maxlength' => 20)); ?></td>
        </tr>

        <tr>
            <td><?php echo __('Password'); ?></td>
            <td><?php echo $this->Form->input('password', array('label' => '', 'type' => 'password', 'style' => 'width: 150px',  'maxlength' => 20)); ?></td>
        </tr>
    </table>

    <?php echo $this->Form->end(__('Login')); ?>
</div>

</div>