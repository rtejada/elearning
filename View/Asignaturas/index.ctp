<div class="asignaturas index">
	<h2><?php echo __('Asignaturas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id', 'Profesor'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($asignaturas as $asignatura): ?>
	<tr>
		<td><?php echo h($asignatura['Asignatura']['id']); ?>&nbsp;</td>
		<td><?php echo h($asignatura['Asignatura']['dsc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asignatura['Curso']['dsc'], array('controller' => 'cursos', 'action' => 'view', $asignatura['Curso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $asignatura['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($asignatura['Asignatura']['created']); ?>&nbsp;</td>
		<td><?php echo h($asignatura['Asignatura']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $asignatura['Asignatura']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $asignatura['Asignatura']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $asignatura['Asignatura']['id']), null, __('Are you sure you want to delete # %s?', $asignatura['Asignatura']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Cabecera'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
