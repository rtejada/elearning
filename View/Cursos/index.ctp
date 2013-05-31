<div class="cursos index">
	<h2><?php echo __('Cursos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
			<th><?php echo $this->Paginator->sort('modulo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($cursos as $curso): ?>
	<tr>
		<td><?php echo h($curso['Curso']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($curso['Modulo']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$curso['Curso']['created'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$curso['Curso']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $curso['Curso']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $curso['Curso']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $curso['Curso']['id']), null, __('Está seguro que desea eliminar el registro?', $curso['Curso']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros actuales de {:count} en total, a partir del registro {:start}, que terminan en {:end}')
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
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li><?php echo $this->Html->link(__('Nuevo Curso'), array('controller' => 'cursos', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), '/'); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>