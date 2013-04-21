<div class="examenesAdjuntos form">
<?php echo $this->Form->create('ExamenesAdjunto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Examenes Adjunto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dsc');
		echo $this->Form->input('ruta_fichero');
		echo $this->Form->input('examenes_detalle_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExamenesAdjunto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExamenesAdjunto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Examenes Adjuntos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Detalle'), array('controller' => 'examenes_detalles', 'action' => 'add')); ?> </li>
	</ul>
</div>
