<div class="trabajos index">
	<h2><?php echo __('Trabajos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('trabajos_enunciado_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trabajos as $trabajo): ?>
	<tr>
		<td><?php echo h($trabajo['Trabajo']['id']); ?>&nbsp;</td>
		<td><?php echo h($trabajo['Trabajo']['dsc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajo['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajo['Asignatura']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trabajo['TrabajosEnunciado']['dsc'], array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajo['TrabajosEnunciado']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($trabajo['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $trabajo['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($trabajo['Trabajo']['created']); ?>&nbsp;</td>
		<td><?php echo h($trabajo['Trabajo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trabajo['Trabajo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trabajo['Trabajo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trabajo['Trabajo']['id']), null, __('Are you sure you want to delete # %s?', $trabajo['Trabajo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Trabajo'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Enunciados'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
