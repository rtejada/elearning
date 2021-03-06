<div class="modulos index">
	<h2><?php echo __('Modulos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc','nombre curso'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'creado'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'modificado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($modulos as $modulo): ?>
	<tr>
		<td><?php echo h($modulo['Modulo']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$modulo['Modulo']['created'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$modulo['Modulo']['modified'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $modulo['Modulo']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $modulo['Modulo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $modulo['Modulo']['id']), null, __('Está seguro que desea eliminar el módulo', $modulo['Modulo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} total, a partir del registro {:start}, que termina en {:end}')
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
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Nuevo Modulo'), array('controller' => 'modulos', 'action' => 'add')); ?></li>
            </ul>
        </div>


    <?php echo $this->element('menu'); ?>
</div>
