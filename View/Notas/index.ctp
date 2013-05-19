<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="notas index">

    <h2><?php echo __('Sus Asignaturas'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Asignatura'); ?></th>
            <th><?php echo __('Curso'); ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php foreach ($asignaturas_profesor as $asignatura_profesor): ?>
            <tr>
                <td><?php echo $this->Html->link($asignatura_profesor['Asignatura']['dsc'], array('controller' => 'contenidos', 'action' => 'temario', $asignatura_profesor['Curso']['id'])); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($asignatura_profesor['Curso']['dsc'], array('controller' => 'cursos', 'action' => 'view', $asignatura_profesor['Curso']['id'])); ?>
                </td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $asignatura_profesor['Asignatura']['id'])); ?>
                    <?php echo $this->Html->link(__('Calificar'), array('action' => 'edit', $asignatura_profesor['Asignatura']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


	<h2><?php echo __('Notas'); ?></h2>



    <div>
        <?php echo $this->Form->create('Basica');?>

        <?php
            if ($tipo==2) {
            echo '<label>Asignatura</label>';
            echo $this->Chosen->select('asignatura', $asignaturas_profesor_combo,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

            echo '<label>Alumno</label>';
            echo $this->Chosen->select('alumno', $alumnos,
                    array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
            }

            echo '<label>Evaluación</label>';
            echo $this->Chosen->select('tipo_nota', array(0 => '', 1=> 'Primera Evaluación', 2=> 'Segunda Evaluación',
        3=>'Tercera Evaluación', 4=>'Final Junio', 5=> 'Recuperación Septiembre'),
        array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));?>

        <span style="margin-left: 50px">
                <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
            <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
            </span>
        <?php echo $this->Form->end();?>
        <br />
    </div>

	<table cellpadding="0" cellspacing="0">
	<tr>
            <th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
            <th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
            <th><?php echo $this->Paginator->sort('tipo_nota'); ?></th>
            <th><?php echo $this->Paginator->sort('nota'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($notas as $nota): ?>
	<tr>
        <td><?php echo h($nota['Usuario']['nombre'].' '.$nota['Usuario']['apellidos']); ?>&nbsp;</td>
        <td><?php echo h($nota['Asignatura']['dsc']); ?>&nbsp;</td>
        <td><?php echo h($nota['Nota']['tipo_nota']); ?>&nbsp;</td>
		<td><?php echo h($nota['Nota']['nota']); ?>&nbsp;</td>
		<td><?php echo h($nota['Nota']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nota['Nota']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $nota['Nota']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nota['Nota']['id']), null, __('Are you sure you want to delete # %s?', $nota['Nota']['id'])); ?>
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
<li><?php echo $this->Html->link(__('List Usuario'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alumnos Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignaturas'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cursos'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Adjuntos'), array('controller' => 'trabajos_adjuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Adjuntos'), array('controller' => 'trabajos_adjuntos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos'), array('controller' => 'contenidos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos'), array('controller' => 'contenidos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('controller' => 'contenidos_temarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos Temarios'), array('controller' => 'contenidos_temarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('controller' => 'notas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notas'), array('controller' => 'notas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Adjuntos'), array('controller' => 'examenes_adjuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Adjuntos'), array('controller' => 'examenes_adjuntos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Cabeceras'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?> </li>
	</ul>
</div>
