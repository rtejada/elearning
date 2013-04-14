<div class="contenidosTemarios form">
<?php echo $this->Form->create('ContenidosTemario'); ?>
	<fieldset>
		<legend><?php echo __('Add Contenidos Temario'); ?></legend>
	<?php
		echo $this->Form->input('archivo');
		echo $this->Form->input('usuario_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
