<div class="asignaturas view">
<h2><?php  echo __('Asignatura'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Curso'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asignatura['Curso']['dsc'], array('controller' => 'cursos', 'action' => 'view', $asignatura['Curso']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($asignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $asignatura['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($asignatura['Asignatura']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Asignatura'), array('action' => 'edit', $asignatura['Asignatura']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Asignatura'), array('action' => 'delete', $asignatura['Asignatura']['id']), null, __('Are you sure you want to delete # %s?', $asignatura['Asignatura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Examenes Cabeceras'); ?></h3>
	<?php if (!empty($asignatura['ExamenesCabecera'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Asignaturas Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Enunciado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($asignatura['ExamenesCabecera'] as $examenesCabecera): ?>
		<tr>
			<td><?php echo $examenesCabecera['id']; ?></td>
			<td><?php echo $examenesCabecera['dsc']; ?></td>
			<td><?php echo $examenesCabecera['asignaturas_id']; ?></td>
			<td><?php echo $examenesCabecera['created']; ?></td>
			<td><?php echo $examenesCabecera['modified']; ?></td>
			<td><?php echo $examenesCabecera['enunciado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'examenes_cabeceras', 'action' => 'view', $examenesCabecera['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'examenes_cabeceras', 'action' => 'edit', $examenesCabecera['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'examenes_cabeceras', 'action' => 'delete', $examenesCabecera['id']), null, __('Are you sure you want to delete # %s?', $examenesCabecera['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Examenes Cabecera'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trabajos'); ?></h3>
	<?php if (!empty($asignatura['Trabajo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Trabajos Enunciado Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($asignatura['Trabajo'] as $trabajo): ?>
		<tr>
			<td><?php echo $trabajo['id']; ?></td>
			<td><?php echo $trabajo['dsc']; ?></td>
			<td><?php echo $trabajo['trabajos_enunciado_id']; ?></td>
			<td><?php echo $trabajo['usuario_id']; ?></td>
			<td><?php echo $trabajo['created']; ?></td>
			<td><?php echo $trabajo['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trabajos', 'action' => 'view', $trabajo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trabajos', 'action' => 'edit', $trabajo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trabajos', 'action' => 'delete', $trabajo['id']), null, __('Are you sure you want to delete # %s?', $trabajo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trabajos Enunciados'); ?></h3>
	<?php if (!empty($asignatura['TrabajosEnunciado'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Enunciado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($asignatura['TrabajosEnunciado'] as $trabajosEnunciado): ?>
		<tr>
			<td><?php echo $trabajosEnunciado['id']; ?></td>
			<td><?php echo $trabajosEnunciado['dsc']; ?></td>
			<td><?php echo $trabajosEnunciado['asignatura_id']; ?></td>
			<td><?php echo $trabajosEnunciado['created']; ?></td>
			<td><?php echo $trabajosEnunciado['modified']; ?></td>
			<td><?php echo $trabajosEnunciado['enunciado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajosEnunciado['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trabajos_enunciados', 'action' => 'edit', $trabajosEnunciado['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trabajos_enunciados', 'action' => 'delete', $trabajosEnunciado['id']), null, __('Are you sure you want to delete # %s?', $trabajosEnunciado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Alumnos Asignaturas'); ?></h3>
	<?php if (!empty($asignatura['alumnos_asignaturas'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($asignatura['alumnos_asignaturas'] as $alumnosAsignaturas): ?>
		<tr>
			<td><?php echo $alumnosAsignaturas['id']; ?></td>
			<td><?php echo $alumnosAsignaturas['usuario_id']; ?></td>
			<td><?php echo $alumnosAsignaturas['asignatura_id']; ?></td>
			<td><?php echo $alumnosAsignaturas['created']; ?></td>
			<td><?php echo $alumnosAsignaturas['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'alumnos_asignaturas', 'action' => 'view', $alumnosAsignaturas['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'alumnos_asignaturas', 'action' => 'edit', $alumnosAsignaturas['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'alumnos_asignaturas', 'action' => 'delete', $alumnosAsignaturas['id']), null, __('Are you sure you want to delete # %s?', $alumnosAsignaturas['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
