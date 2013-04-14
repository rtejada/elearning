<div class="examenesCabeceras form">
<?php echo $this->Form->create('ExamenesCabecera'); ?>
	<fieldset>
		<legend><?php echo __('Add Examenes Cabecera'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
		echo $this->Form->input('asignaturas_id');
		echo $this->Form->input('enunciado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('action' => 'index')); ?></li>
	</ul>
</div>
