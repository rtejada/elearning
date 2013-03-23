<div class="alumnos view">
<h2><?php  echo __('Alumno'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($alumno['Alumno']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($alumno['Alumno']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido'); ?></dt>
		<dd>
			<?php echo h($alumno['Alumno']['apellido']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Alumno'), array('action' => 'edit', $alumno['Alumno']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alumno'), array('action' => 'delete', $alumno['Alumno']['id']), null, __('Are you sure you want to delete # %s?', $alumno['Alumno']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alumnos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumno'), array('action' => 'add')); ?> </li>
	</ul>
</div>
