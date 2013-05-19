<div class="notas form">
<?php echo $this->Form->create('Nota'); ?>
	<fieldset>
		<legend><?php echo __('Add Nota'); ?></legend>

	<?php

        echo '<label>Asignatura</label>';
        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('default' => $asignatura_default, 'data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo '<label>Alumno</label>';
        echo $this->Chosen->select('usuario_id', $alumnos,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo '<label>Evaluación</label>';
        echo $this->Chosen->select('tipo_nota', $tipo_notas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Form->input('nota', array('style' => 'width: 80px'));

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignatura'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
