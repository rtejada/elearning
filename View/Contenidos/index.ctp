<div class="contenidosTemarios index">
	<h2><?php echo __('Contenidos Temarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
            <th><?php echo $this->Paginator->sort('dsc', 'Titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Enviado'); ?></th>

			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($contenidos as $contenido): ?>
	<tr>
        <td>
            <?php echo $this->Html->link($contenido['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $contenido['Asignatura']['id'])); ?>
        </td>
        <td><?php echo h($contenido['Contenido']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$contenido['Contenido']['created'])); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $contenido['Contenido']['id']));
            $link = array('action' => 'downloadFile', $contenido['Contenido']['fichero_dir'], $contenido['Contenido']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button')); ?>
            <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $contenido['Contenido']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $contenido['Contenido']['id']), null, __('Are you sure you want to delete # %s?', $contenido['Contenido']['id'])); ?>
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
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>
        <ul>
            <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
        </ul>
    </div>

    <?php echo $this->element('menu'); ?>

</div>
