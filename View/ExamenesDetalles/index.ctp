<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="examenesDetalles index">

    <?php if ($tipo==1) {  ?>
    <h2><?php echo __('Examenes activos'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo __('Descripción'); ?></th>
            <th><?php echo __('Asignatura'); ?></th>
            <th><?php echo __('Fecha Examen');; ?></th>
            <th class="actions"><?php echo __('Acciones'); ?></th>
        </tr>
        <?php
        foreach ($examenesCabeceras as $examenesCabecera): ?>
            <tr>
                <td><?php echo h($examenesCabecera['ExamenesCabecera']['dsc']); ?>&nbsp;</td>
                <td><?php echo h($examenesCabecera['Asignatura']['dsc']); ?>&nbsp;</td>
                <td><?php echo h($this->Time->format('d/m/Y',$examenesCabecera['ExamenesCabecera']['dia_examen'])); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Ver'), array('controller'=> 'examenes_cabeceras', 'action' => 'view', $examenesCabecera['ExamenesCabecera']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php }  ?>


    <div>
        <?php echo $this->Form->create('Basica');?>
        <table border="0" class="tabla_filter">
            <tr>
                <?php if($tipo==2) { ?>
                <td>
                    <label>Examenes</label>
                    <?php
                    echo $this->Chosen->select('Enunciado', $enunciados,
                        array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
                    ?>
                </td>
                <?php } ?>
                <br>
                <td>
                    <label>Mostrar </label>
                    <?php
                    echo $this->Chosen->select('corregidos', $opciones, array('data-placeholder' => 'Seleccione...',
                        'deselect' => true, 'style' => 'min-width: 200px;')); ?>

                </td>
            </tr>
            <tr>
                <?php if($tipo==2) { ?>
                <td>
                    <?php
                        echo "<label>Alumno</label>";
                        echo $this->Chosen->select('alumnos', $alumnos, array('data-placeholder' => 'Seleccione...',
                            'deselect' => true, 'style' => 'min-width: 200px;'));
                    ?>
                </td>
                <?php } ?>
                <td>
                    <span style="margin-left: 50px">
                        <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
                        <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
                    </span>
                </td>
            </tr>
        </table>
        <?php echo $this->Form->end();?>
    </div>
    <br>

	<h2><?php
        if($tipo==1) {
            echo __('Examenes enviados');
        } else {
            echo __('Examenes recibidos');
        }?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc', 'Asignatura'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id', 'Alumno'); ?></th>
			<th><?php echo $this->Paginator->sort('examenes_cabecera_id', 'Examen'); ?></th>
			<th><?php echo $this->Paginator->sort('nota', 'Nota'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Enviado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($examenesDetalles as $examenesDetalle): ?>
	<tr>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['Usuario']['nombre']).' '.($examenesDetalle['Usuario']['apellidos']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesCabecera']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($examenesDetalle['ExamenesDetalle']['nota']); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y',$examenesDetalle['ExamenesDetalle']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $examenesDetalle['ExamenesDetalle']['id']));
            $link = array('action' => 'downloadFile', $examenesDetalle['ExamenesDetalle']['fichero_dir'], $examenesDetalle['ExamenesDetalle']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
             if ($tipo==1) {
			    echo $this->Html->link(__('Editar'), array('action' => 'edit', $examenesDetalle['ExamenesDetalle']['id']));
                echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $examenesDetalle['ExamenesDetalle']['id']), null, __('Está seguro que desea eliminar el registro?', $examenesDetalle['ExamenesDetalle']['id']));
             } elseif($tipo==2) {
                echo $this->Html->link(__('Corregir'), array('action' => 'corregir', $examenesDetalle['ExamenesDetalle']['id']));
             }  ?>
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
            <li class='first'><?php echo $this->Html->link(__('Lista'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?></li>
            <?php if($tipo==1) { ?>
            <li><?php echo $this->Html->link(__('Enviar Examen'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?></li>
            <?php } ?>
            <li class='last'><?php echo $this->Html->link(__('Volver'), '/'); ?></li>
        </ul>
    </div>
    <br />
    <?php echo $this->element('menu'); ?>
</div>