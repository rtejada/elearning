<div class="trabajosEnunciados index">
    <h2><?php echo __('Trabajos pendientes'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('dsc', 'Título'); ?></th>
            <th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
            <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
            <th><?php echo $this->Paginator->sort('fecha_tope', 'Fecha tope entrega'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($trabajosEnunciados as $trabajosEnunciado): ?>
            <tr>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['id']); ?>&nbsp;</td>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
                </td>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['created']); ?>&nbsp;</td>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['fecha_tope']); ?>&nbsp;</td>
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

<div class="trabajos index">
	<h2><?php echo __('Trabajos enviados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc'); ?></th>
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

<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==1) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Enviar trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?></li>
            </ul>
        </div>
        <br />
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>