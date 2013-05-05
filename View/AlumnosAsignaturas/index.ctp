<div class="alumnosAsignaturas index">


    <?php if ($tipo==1) { ?>
    <h2><?php echo __('Lista de Asignaturas en las que ud. está matriculado'); ?></h2>
    <?php } elseif ($tipo==2) { ?>
    <h2><?php echo __('Relación Alumno - Asignatura'); ?></h2>
    <div>
        <?php echo $this->Form->create('Basica');?>
        <?php echo $this->Form->input('asignaturas', array('div'=>false, 'empty' => true));?>
        <?php echo $this->Form->input('alumnos', array('div'=>false, 'empty' => true));?>
        <span style="margin-left: 50px">
            <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
            <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
        </span>
        <?php echo $this->Form->end();?>
        <br />
    </div>
    <?php } ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
            <?php if ($tipo==2) { ?>
            <th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created');  ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
           <?php } ?>
	</tr>
	<?php
	foreach ($alumnosAsignaturas as $alumnosAsignatura): ?>
	<tr>

        <td>
            <?php echo $this->Html->link($alumnosAsignatura['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $alumnosAsignatura['Asignatura']['id'])); ?>
        </td>
        <?php if ($tipo==2) { ?>
		<td>
			<?php echo $this->Html->link($alumnosAsignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $alumnosAsignatura['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($alumnosAsignatura['AlumnosAsignatura']['created']); ?>&nbsp;</td>
		<td><?php echo h($alumnosAsignatura['AlumnosAsignatura']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alumnosAsignatura['AlumnosAsignatura']['id']), null, __('Are you sure you want to delete # %s?', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
		</td>
        <?php } ?>
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

    <?php if ($tipo==2) { ?>
    <div id='cssmenu'>
        <ul>
            <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Nueva Relación'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'pages', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>

</div>
