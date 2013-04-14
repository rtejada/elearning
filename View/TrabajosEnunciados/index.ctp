<div class="trabajosEnunciados index">
	<h2><?php echo __('Trabajos Enunciados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
			<th><?php echo $this->Paginator->sort('enunciado'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trabajosEnunciados as $trabajosEnunciado): ?>
	<tr>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['id']); ?>&nbsp;</td>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['enunciado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
		</td>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['created']); ?>&nbsp;</td>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trabajosEnunciado['TrabajosEnunciado']['id']), null, __('Are you sure you want to delete # %s?', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Trabajos Enunciado'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
