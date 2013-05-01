<div class="trabajosAdjuntos index">
	<h2><?php echo __('Trabajos Adjuntos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
			<th><?php echo $this->Paginator->sort('fichero'); ?></th>
			<th><?php echo $this->Paginator->sort('fichero_dir'); ?></th>
			<th><?php echo $this->Paginator->sort('trabajo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trabajosAdjuntos as $trabajosAdjunto): ?>
	<tr>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['id']); ?>&nbsp;</td>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['fichero']); ?>&nbsp;</td>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['fichero_dir']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajosAdjunto['Trabajo']['dsc'], array('controller' => 'trabajos', 'action' => 'view', $trabajosAdjunto['Trabajo']['id'])); ?>
		</td>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['created']); ?>&nbsp;</td>
		<td><?php echo h($trabajosAdjunto['TrabajosAdjunto']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trabajosAdjunto['TrabajosAdjunto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trabajosAdjunto['TrabajosAdjunto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trabajosAdjunto['TrabajosAdjunto']['id']), null, __('Are you sure you want to delete # %s?', $trabajosAdjunto['TrabajosAdjunto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Trabajos Adjunto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
