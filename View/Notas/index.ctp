<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="notas index">

    <?php if($tipo==2) { ?>
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
                    <?php echo $this->Html->link(__('Calificar'), array('controller' => 'notas', 'action' => 'add', $asignatura_profesor['Asignatura']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php } ?>

    <h2><?php echo __('Notas'); ?></h2>
    <br>


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

            echo '<br />';

            echo '<label>Evaluación</label>';
            echo $this->Chosen->select('tipo_nota', $tipo_notas,
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
        <?php if($tipo==2) { ?>
            <th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
        <?php } ?>
            <th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
            <th><?php echo $this->Paginator->sort('tipo_nota', 'Evaluación'); ?></th>
            <th><?php echo $this->Paginator->sort('nota'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
        <?php if($tipo==2) { ?>
			<th class="actions"><?php echo __('Acciones'); ?></th>
        <?php } ?>
	</tr>
	<?php
	foreach ($notas as $nota): ?>
	<tr>
        <?php if($tipo==2) { ?>
        <td><?php echo h($nota['Usuario']['nombre'].' '.$nota['Usuario']['apellidos']); ?>&nbsp;</td>
        <?php } ?>
        <td><?php echo h($nota['Asignatura']['dsc']); ?>&nbsp;</td>
        <td><?php echo h($tipo_notas[$nota['Nota']['tipo_nota']]); ?>&nbsp;</td>
		<td><?php echo h($nota['Nota']['nota']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$nota['Nota']['created'])); ?>&nbsp;</td>
        <?php if($tipo==2) { ?>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $nota['Nota']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $nota['Nota']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $nota['Nota']['id']), null, __('Está seguro que desea eliminar el registro?', $nota['Nota']['id'])); ?>
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
               <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>