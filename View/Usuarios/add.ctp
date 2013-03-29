<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Usuario'); ?></legend>
	<?php

		echo $this->Form->input('nombre');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('fecha_nacimiento');
		echo $this->Form->input('direccion');
		echo $this->Form->input('email');
		echo $this->Form->input('telefono');
		echo $this->Form->input('login');
		echo $this->Form->input('password');
        echo $this->Form->radio('tipo', array('1' => 'Alumno','2' => ' Profesor'));
        echo $this->Form->input('Usuario.foto', array('type' => 'file'));
        echo $this->Form->input('Usuario.foto_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignaturas'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?> </li>
	</ul>
</div>
