<div class="examenesCabeceras index">
    <div>
        <?php echo $this->Form->create('Basica');?>

        <label>Asignaturas</label>
        <?php echo $this->Chosen->select('asignaturas', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));?>

        <span style="margin-left: 50px">
            <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
            <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
        </span>
        <?php echo $this->Form->end();?>
        <br />
    </div>
	<h2><?php echo __('Exámenes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc', 'Titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('asignatura_id', 'Asignatura'); ?></th>
            <th><?php echo $this->Paginator->sort('dia_examen', 'Dia examen'); ?></th>
            <th><?php echo $this->Paginator->sort('activo', 'Activo'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($examenesCabeceras as $examenesCabecera): ?>
	<tr>
		<td><?php echo h($examenesCabecera['ExamenesCabecera']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($examenesCabecera['Asignatura']['dsc']); ?>&nbsp;</td>
        <td><?php echo h($this->Time->format('d/m/Y',$examenesCabecera['ExamenesCabecera']['dia_examen'])); ?>&nbsp;</td>
        <td><?php if($examenesCabecera['ExamenesCabecera']['activo']==1)
                echo h('Si'); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y H:i:s',$examenesCabecera['ExamenesCabecera']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $examenesCabecera['ExamenesCabecera']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $examenesCabecera['ExamenesCabecera']['id'])); ?>
            <?php
            $link = array('action' => 'downloadFile', $examenesCabecera['ExamenesCabecera']['fichero_dir'], $examenesCabecera['ExamenesCabecera']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
            ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $examenesCabecera['ExamenesCabecera']['id']), null, __('Está seguro que desea eliminar el registro?', $examenesCabecera['ExamenesCabecera']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros actuales de {:count} en total, a partir del
	registro {:start}, que terminan en {:end}')
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
    <div id='cssmenu'>
        <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Crear Examen'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>
