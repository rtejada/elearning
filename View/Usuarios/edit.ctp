<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('fecha_nacimiento');
		echo $this->Form->input('direccion');
		echo $this->Form->input('email');
		echo $this->Form->input('telefono');
		echo $this->Form->input('login');
		echo $this->Form->input('password');
		echo $this->Form->input('tipo', array('type'=>'radio', 'options' => array('1' => 'Alumno','2' => 'Profesor')));
        echo $this->Form->input('admin', array('type'=> 'checkbox', 'label'=>'Es Admin'));
        echo $this->Form->input('Usuario.foto', array('type' => 'file'));
        echo $this->Form->input('Usuario.foto_dir', array('type' => 'hidden'));

        ?>
        <div style="height: 100%; width: 100%;">
        <?php
        $url = $this->Html->url($link);
        echo $this->Html->image($url, array('style' => 'width: 90%'));
        ?>
        </div>
	</fieldset>

<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'usuarios', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'usuarios', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
