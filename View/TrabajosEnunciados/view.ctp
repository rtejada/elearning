<div class="trabajosEnunciados view">
<h2><?php  echo __('Trabajos Enunciado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enunciado'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['enunciado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trabajos Enunciado'), array('action' => 'edit', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trabajos Enunciado'), array('action' => 'delete', $trabajosEnunciado['TrabajosEnunciado']['id']), null, __('Are you sure you want to delete # %s?', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Trabajos'); ?></h3>
	<?php if (!empty($trabajosEnunciado['Trabajo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Trabajos Enunciado Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($trabajosEnunciado['Trabajo'] as $trabajo): ?>
		<tr>
			<td><?php echo $trabajo['id']; ?></td>
			<td><?php echo $trabajo['dsc']; ?></td>
			<td><?php echo $trabajo['asignatura_id']; ?></td>
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
