<div class="alumnosAsignaturas index">


    <?php if ($tipo==1) { ?>
    <h2><?php echo __('Lista de Asignaturas en las que ud. está matriculado'); ?></h2>

    <?php } elseif ($tipo==2) { ?>
    <h2><?php echo __('Relación Alumno - Asignatura'); ?></h2>
    <div>
        <?php echo $this->Form->create('Basica');?>
        <label>Asignaturas</label>
        <?php echo $this->Chosen->select('asignaturas', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));?>

        <label>Alumnos</label>
        <?php echo $this->Chosen->select('alumnos', $alumnos,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));?>

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
        <?php if ($tipo==1) { ?>
			<th><?php echo $this->Paginator->sort('dsc', 'Asignaturas'); ?></th>
        <?php } ?>
            <?php if ($tipo==2) { ?>
            <th><?php echo $this->Paginator->sort('dsc', 'Asignatura'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'creado');  ?></th>

			<th class="actions"><?php echo __('Acciones'); ?></th>
           <?php } ?>
	</tr>
	<?php
	foreach ($alumnosAsignaturas as $alumnosAsignatura): ?>
	<tr>
        <td>
            <?php echo $this->Html->link($alumnosAsignatura['Asignatura']['dsc'], array('controller' => 'contenidos', 'action' => 'temario', $alumnosAsignatura['Asignatura']['id'])); ?>
        </td>
        <?php if ($tipo==2) { ?>

		<td><?php echo h($this->Time->format('d/m/Y',$alumnosAsignatura['AlumnosAsignatura']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $alumnosAsignatura['AlumnosAsignatura']['id']), null, __('Are you sure you want to delete # %s?', $alumnosAsignatura['AlumnosAsignatura']['id'])); ?>
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
            <li><?php echo $this->Html->link(__('Asignar Asignatura'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
        </ul>
    </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>

</div>
