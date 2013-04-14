<div class="trabajos form">
<?php echo $this->Form->create('Trabajo'); ?>
	<fieldset>
		<legend><?php echo __('Add Trabajo'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
		echo $this->Form->input('asignatura_id');
		echo $this->Form->input('trabajos_enunciado_id');
		echo $this->Form->input('usuario_id');
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
