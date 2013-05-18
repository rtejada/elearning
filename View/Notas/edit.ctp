<div class="notas form">
<?php echo $this->Form->create('Nota'); ?>
	<fieldset>
		<legend><?php echo __('Edit Nota'); ?></legend>
	<?php

        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Chosen->select('usuario_id', $alumnos,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Chosen->select('tipo_nota', $tipo_notas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Form->input('nota');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Nota.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Nota.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Notas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignatura'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
