<div class="trabajosAdjuntos form">
<?php echo $this->Form->create('TrabajosAdjunto'); ?>
	<fieldset>
		<legend><?php echo __('Add Trabajos Adjunto'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
		echo $this->Form->input('fichero');
		echo $this->Form->input('fichero_dir');
		echo $this->Form->input('trabajo_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trabajos Adjuntos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
