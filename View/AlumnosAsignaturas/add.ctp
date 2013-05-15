<div class="alumnosAsignaturas form">
<?php echo $this->Form->create('AlumnosAsignatura'); ?>
	<fieldset>
		<legend><?php echo __('Asignar Asignaturas a Alumnos'); ?></legend>
	<?php
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('asignatura_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>

<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nueva Relación'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
