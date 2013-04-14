<div class="trabajos view">
<h2><?php  echo __('Trabajo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trabajo['Trabajo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($trabajo['Trabajo']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajo['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajo['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabajos Enunciado'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajo['TrabajosEnunciado']['dsc'], array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajo['TrabajosEnunciado']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajo['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $trabajo['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trabajo['Trabajo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trabajo['Trabajo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trabajo'), array('action' => 'edit', $trabajo['Trabajo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trabajo'), array('action' => 'delete', $trabajo['Trabajo']['id']), null, __('Are you sure you want to delete # %s?', $trabajo['Trabajo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
