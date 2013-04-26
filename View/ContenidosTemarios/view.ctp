<div class="contenidosTemarios view">
<h2><?php  echo __('Contenidos Temario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['archivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo Dir'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['archivo_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contenidosTemario['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $contenidosTemario['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contenidosTemario['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $contenidosTemario['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contenidos Temario'), array('action' => 'edit', $contenidosTemario['ContenidosTemario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contenidos Temario'), array('action' => 'delete', $contenidosTemario['ContenidosTemario']['id']), null, __('Are you sure you want to delete # %s?', $contenidosTemario['ContenidosTemario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos Temario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
