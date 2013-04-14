<div class="notas form">
<?php echo $this->Form->create('Nota'); ?>
	<fieldset>
		<legend><?php echo __('Add Nota'); ?></legend>
	<?php
		echo $this->Form->input('nota');
		echo $this->Form->input('alumno_asignatura_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Notas'), array('action' => 'index')); ?></li>
	</ul>
</div>
