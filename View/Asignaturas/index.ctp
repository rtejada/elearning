<div class="asignaturas index">
	<h2><?php echo __('Asignaturas'); ?></h2>

        <?php echo $this->Form->create('Basica');?>
        <?php echo $this->Form->input('dsc', array('style' => 'width: 300px',
         'div' => array('class' => 'input text float-left'), 'label' => '')); ?>
        <?php echo $this->Form->submit(__('Filtrar'), array('name'=>'submit', 'class' => 'button' ,
         'div' => array('class' => 'submit float-left'))); ?>
        <?php echo $this->Form->submit(__('Limpiar'), array('name'=>'clear', 'class' => 'button',
         'div' => array('class' => 'submit float-left'))); ?>

        <?php echo $this->Form->end();?>

    <br />

    <div class="CSSTableGenerator" >
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('dsc', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('curso_id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id', 'Profesor'); ?></th>
			<th><?php echo $this->Paginator->sort('creado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($asignaturas as $asignatura): ?>
	<tr>
		<td><?php echo h($asignatura['Asignatura']['dsc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($asignatura['Curso']['dsc'], array('controller' => 'cursos', 'action' => 'view', $asignatura['Curso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($asignatura['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $asignatura['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($this->Time->format('d/m/Y',$asignatura['Asignatura']['created'])); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $asignatura['Asignatura']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $asignatura['Asignatura']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $asignatura['Asignatura']['id']), null, __('Are you sure you want to delete # %s?', $asignatura['Asignatura']['id'])); ?>
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
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nueva Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), '/'); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>

