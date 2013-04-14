<div class="examenesDetalles view">
<h2><?php  echo __('Examenes Detalle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno Id'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['alumno_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Examenes Cabecera Id'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['examenes_cabecera_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['nota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Examenes Detalle'), array('action' => 'edit', $examenesDetalle['ExamenesDetalle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Examenes Detalle'), array('action' => 'delete', $examenesDetalle['ExamenesDetalle']['id']), null, __('Are you sure you want to delete # %s?', $examenesDetalle['ExamenesDetalle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Detalle'), array('action' => 'add')); ?> </li>
	</ul>
</div>
