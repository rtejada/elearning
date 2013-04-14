<div class="trabajosEnunciados form">
<?php echo $this->Form->create('TrabajosEnunciado'); ?>
	<fieldset>
		<legend><?php echo __('Edit Trabajos Enunciado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dsc');
		echo $this->Form->input('enunciado');
		echo $this->Form->input('asignatura_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TrabajosEnunciado.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TrabajosEnunciado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
