<div class="examenesDetalles index">
	<h2><?php echo __('Examenes Detalles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
			<th><?php echo $this->Paginator->sort('alumno_id'); ?></th>
			<th><?php echo $this->Paginator->sort('examenes_cabecera_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nota'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($examenesDetalles as $examenesDetalle): ?>
	<tr>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['id']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['alumno_id']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['examenes_cabecera_id']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['nota']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['created']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $examenesDetalle['ExamenesDetalle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $examenesDetalle['ExamenesDetalle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $examenesDetalle['ExamenesDetalle']['id']), null, __('Are you sure you want to delete # %s?', $examenesDetalle['ExamenesDetalle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Examenes Detalle'), array('action' => 'add')); ?></li>
	</ul>
</div>
