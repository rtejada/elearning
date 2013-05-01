<div class="trabajosAdjuntos form">
<?php echo $this->Form->create('TrabajosAdjunto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Trabajos Adjunto'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TrabajosAdjunto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TrabajosAdjunto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Trabajos Adjuntos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
