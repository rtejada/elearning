<div class="contenidos form">
<?php echo $this->Form->create('Contenido'); ?>
	<fieldset>
		<legend><?php echo __('Edit Contenido'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('archivo');
		echo $this->Form->input('usuario_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Contenido.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Contenido.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contenidos'), array('action' => 'index')); ?></li>
	</ul>
</div>