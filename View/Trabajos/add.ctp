<div class="trabajos form">
<?php echo $this->Form->create('Trabajo', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Enviar trabajo'); ?></legend>
	<?php
        echo $this->Form->input('trabajos_enunciado_id', array('label'=> 'Seleccione trabajo'));
		echo $this->Form->input('dsc', array('label'=> 'Título', 'style' => 'width: 500px'));
        echo $this->Form->input('Trabajo.fichero', array('type' => 'file'));
        echo $this->Form->input('Trabajo.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trabajos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
