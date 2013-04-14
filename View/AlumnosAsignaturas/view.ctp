<div class="alumnosAsignaturas view">
<h2><?php  echo __('Alumnos Asignatura'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alumnosAsignatura['AlumnosAsignatura']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosAsignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $alumnosAsignatura['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosAsignatura['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $alumnosAsignatura['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($alumnosAsignatura['AlumnosAsignatura']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($alumnosAsignatura['AlumnosAsignatura']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alumnos Asignatura'), array('action' => 'edit', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alumnos Asignatura'), array('action' => 'delete', $alumnosAsignatura['AlumnosAsignatura']['id']), null, __('Are you sure you want to delete # %s?', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignatura'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Notas'); ?></h3>
	<?php if (!empty($alumnosAsignatura['Nota'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $alumnosAsignatura['Nota']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
	<?php echo $alumnosAsignatura['Nota']['nota']; ?>
&nbsp;</dd>
		<dt><?php echo __('Alumno Asignatura Id'); ?></dt>
		<dd>
	<?php echo $alumnosAsignatura['Nota']['alumno_asignatura_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $alumnosAsignatura['Nota']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $alumnosAsignatura['Nota']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Nota'), array('controller' => 'notas', 'action' => 'edit', $alumnosAsignatura['Nota']['id'])); ?></li>
			</ul>
		</div>
	</div>
	