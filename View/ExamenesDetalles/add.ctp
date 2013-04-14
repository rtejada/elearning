<div class="examenesDetalles form">
<?php echo $this->Form->create('ExamenesDetalle'); ?>
	<fieldset>
		<legend><?php echo __('Add Examenes Detalle'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
		echo $this->Form->input('alumno_id');
		echo $this->Form->input('examenes_cabecera_id');
		echo $this->Form->input('nota');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('action' => 'index')); ?></li>
	</ul>
</div>
