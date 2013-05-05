<div class="examenesCabeceras index">
	<h2><?php echo __('Exámenes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
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
		<td><?php echo h($examenesCabecera['ExamenesCabecera']['id']); ?>&nbsp;</td>
		<td><?php echo h($examenesCabecera['ExamenesCabecera']['dsc']); ?>&nbsp;</td>
		<td><?php echo h($examenesCabecera['Asignatura']['dsc']); ?>&nbsp;</td>
        <td><?php echo h($this->Time->format('d/m/Y',$examenesCabecera['ExamenesCabecera']['dia_examen'])); ?>&nbsp;</td>
        <td><?php if($examenesCabecera['ExamenesCabecera']['activo']==1)
                echo h('Si'); ?>&nbsp;</td>
		<td><?php echo h($this->Time->format('d/m/Y H:i:s',$examenesCabecera['ExamenesCabecera']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $examenesCabecera['ExamenesCabecera']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $examenesCabecera['ExamenesCabecera']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $examenesCabecera['ExamenesCabecera']['id']), null, __('Are you sure you want to delete # %s?', $examenesCabecera['ExamenesCabecera']['id'])); ?>
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
    <div id='cssmenu'>
        <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Crear Examen'), array('controller' => 'examenes_cabeceras', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>
