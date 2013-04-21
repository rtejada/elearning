<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellidos'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['id']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['apellidos']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['login']); ?>&nbsp;</td>
		<td><?php
            if (h($usuario['Usuario']['tipo'])=='1') {
                echo "Alumno";
            } elseif(h($usuario['Usuario']['tipo'])=='2') {
                echo "Profesor";
            }
            ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['created']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignaturas'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cursos'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Adjuntos'), array('controller' => 'trabajos_adjuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Adjuntos'), array('controller' => 'trabajos_adjuntos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos'), array('controller' => 'contenidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos'), array('controller' => 'contenidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('controller' => 'contenidos_temarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos Temarios'), array('controller' => 'contenidos_temarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notas'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Adjuntos'), array('controller' => 'examenes_adjuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Adjuntos'), array('controller' => 'examenes_adjuntos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Cabeceras'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?> </li>
	</ul>
</div>
