<div class="trabajosEnunciados index">
    <div>
        <?php echo $this->Form->create('Basica');?>

        <label>Asignaturas</label>
        <?php echo $this->Form->create('Basica');?>
        <?php echo $this->Form->input('dsc', array('style' => 'width: 300px',
        'div' => array('class' => 'input text float-left'), 'label' => '')); ?>

            <?php echo $this->Form->submit(__('Filtrar'), array('name'=>'submit', 'class' => 'button' ,
            'div' => array('class' => 'submit float-left'))); ?>
            <?php echo $this->Form->submit(__('Limpiar'), array('name'=>'clear', 'class' => 'button',
            'div' => array('class' => 'submit float-left'))); ?>


        <?php echo $this->Form->end();?>
        <br />
    </div>
    <br />
    <div>
	<h2><?php echo __('Trabajos Enunciados'); ?></h2>
    <table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc', 'Título'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_tope', 'Fecha tope entrega'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($trabajosEnunciados as $trabajosEnunciado): ?>
	<tr>
		<td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
		</td>
		<td><?php echo h($this->Time->format('d/m/Y',$trabajosEnunciado['TrabajosEnunciado']['created'])); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$trabajosEnunciado['TrabajosEnunciado']['fecha_tope'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $trabajosEnunciado['TrabajosEnunciado']['id']), null, __('Are you sure you want to delete # %s?', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
    </div>
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

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nuevo Trabajo'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>