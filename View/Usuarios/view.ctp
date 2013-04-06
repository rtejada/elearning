<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellidos'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Nacimiento'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['fecha_nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php
            if ($usuario['Usuario']['tipo']=='1') {
                echo __('Alumno');
            } elseif($usuario['Usuario']['tipo']=='2') {
                echo __('Profesor');
            } ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php
            //aqui se incluye la foto
            $url = $this->Html->url($link);
            echo $this->Html->image($url);
             ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Alumnos Asignaturas'); ?></h3>
	<?php if (!empty($usuario['alumnos_asignaturas'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Alumno Id'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['alumnos_asignaturas'] as $alumnosAsignaturas): ?>
		<tr>
			<td><?php echo $alumnosAsignaturas['id']; ?></td>
			<td><?php echo $alumnosAsignaturas['alumno_id']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Asignaturas'); ?></h3>
	<?php if (!empty($usuario['asignaturas'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Curso Id'); ?></th>
		<th><?php echo __('Profesor Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['asignaturas'] as $asignaturas): ?>
		<tr>
			<td><?php echo $asignaturas['id']; ?></td>
			<td><?php echo $asignaturas['dsc']; ?></td>
			<td><?php echo $asignaturas['curso_id']; ?></td>
			<td><?php echo $asignaturas['profesor_id']; ?></td>
			<td><?php echo $asignaturas['created']; ?></td>
			<td><?php echo $asignaturas['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asignaturas', 'action' => 'view', $asignaturas['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asignaturas', 'action' => 'edit', $asignaturas['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asignaturas', 'action' => 'delete', $asignaturas['id']), null, __('Are you sure you want to delete # %s?', $asignaturas['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asignaturas'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trabajos'); ?></h3>
	<?php if (!empty($usuario['trabajos'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Enunciado Id'); ?></th>
		<th><?php echo __('Alumno Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['trabajos'] as $trabajos): ?>
		<tr>
			<td><?php echo $trabajos['id']; ?></td>
			<td><?php echo $trabajos['dsc']; ?></td>
			<td><?php echo $trabajos['asignatura_id']; ?></td>
			<td><?php echo $trabajos['enunciado_id']; ?></td>
			<td><?php echo $trabajos['alumno_id']; ?></td>
			<td><?php echo $trabajos['created']; ?></td>
			<td><?php echo $trabajos['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trabajos', 'action' => 'view', $trabajos['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trabajos', 'action' => 'edit', $trabajos['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trabajos', 'action' => 'delete', $trabajos['id']), null, __('Are you sure you want to delete # %s?', $trabajos['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trabajos'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Examenes Detalles'); ?></h3>
	<?php if (!empty($usuario['examenes_detalles'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Alumno Id'); ?></th>
		<th><?php echo __('Examenes Cabecera Id'); ?></th>
		<th><?php echo __('Nota'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['examenes_detalles'] as $examenesDetalles): ?>
		<tr>
			<td><?php echo $examenesDetalles['id']; ?></td>
			<td><?php echo $examenesDetalles['dsc']; ?></td>
			<td><?php echo $examenesDetalles['alumno_id']; ?></td>
			<td><?php echo $examenesDetalles['examenes_cabecera_id']; ?></td>
			<td><?php echo $examenesDetalles['nota']; ?></td>
			<td><?php echo $examenesDetalles['created']; ?></td>
			<td><?php echo $examenesDetalles['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'examenes_detalles', 'action' => 'view', $examenesDetalles['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'examenes_detalles', 'action' => 'edit', $examenesDetalles['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'examenes_detalles', 'action' => 'delete', $examenesDetalles['id']), null, __('Are you sure you want to delete # %s?', $examenesDetalles['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
