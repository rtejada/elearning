<div class="alumnosAsignaturas index">
	<h2><?php echo __('Alumnos Asignaturas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($alumnosAsignaturas as $alumnosAsignatura): ?>
	<tr>
		<td><?php echo h($alumnosAsignatura['AlumnosAsignatura']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($alumnosAsignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $alumnosAsignatura['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($alumnosAsignatura['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $alumnosAsignatura['Asignatura']['id'])); ?>
		</td>
		<td><?php echo h($alumnosAsignatura['AlumnosAsignatura']['created']); ?>&nbsp;</td>
		<td><?php echo h($alumnosAsignatura['AlumnosAsignatura']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumnosAsignatura['AlumnosAsignatura']['id']), null, __('Are you sure you want to delete # %s?', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Alumnos Asignatura'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
	</ul>
</div>
