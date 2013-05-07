<div class="examenesDetalles form">
<?php echo $this->Form->create('ExamenesDetalle', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Examenes Detalle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dsc');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('examenes_cabecera_id');
		echo $this->Form->input('nota');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExamenesDetalle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExamenesDetalle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('action' => 'index')); ?></li>
	</ul>
</div>
