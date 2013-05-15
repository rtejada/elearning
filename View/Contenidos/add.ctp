<div class="contenidosTemarios form">
<?php echo $this->Form->create('Contenido', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Agregar contenido'); ?></legend>
	<?php
        echo $this->Form->input('dsc', array('label' => 'Título'));
		echo $this->Form->input('asignatura_id');
        echo $this->Form->input('orden', array('style' => 'width: 50px;'));
        echo $this->Form->input('Contenido.fichero', array('type' => 'file'));
        echo $this->Form->input('Contenido.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
