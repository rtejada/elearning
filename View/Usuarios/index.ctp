<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('apellidos'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('creado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Usuario']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['apellidos']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['login']); ?>&nbsp;</td>
		<td><?php
            if (h($usuario['Usuario']['tipo'])=='1') {
                echo "Alumno";
            } elseif(h($usuario['Usuario']['tipo'])=='2') {
                echo "Profesor";
            }
            ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$usuario['Usuario']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Está seguro que desea eliminar el registro?', $usuario['Usuario']['id'])); ?>
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
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>