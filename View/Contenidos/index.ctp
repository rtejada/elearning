<div class="contenidos index">
	<h2><?php echo __('Contenidos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('archivo'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contenidos as $contenido): ?>
	<tr>
		<td><?php echo h($contenido['Contenido']['id']); ?>&nbsp;</td>
		<td><?php echo h($contenido['Contenido']['created']); ?>&nbsp;</td>
		<td><?php echo h($contenido['Contenido']['modified']); ?>&nbsp;</td>
		<td><?php echo h($contenido['Contenido']['archivo']); ?>&nbsp;</td>
		<td><?php echo h($contenido['Contenido']['usuario_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contenido['Contenido']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contenido['Contenido']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contenido['Contenido']['id']), null, __('Are you sure you want to delete # %s?', $contenido['Contenido']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contenido'), array('action' => 'add')); ?></li>
	</ul>
</div>
