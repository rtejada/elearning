<div class="examenesCabeceras form">
<?php echo $this->Form->create('ExamenesCabecera'); ?>
	<fieldset>
		<legend><?php echo __('Editar Examen'); ?></legend>
	<?php
        echo $this->Form->input('dsc', array('label' => 'Título'));
        echo $this->Form->input('asignatura_id');
        echo $this->Form->input('enunciado');
        echo $this->Form->input('dia_examen', array('label' => 'Fecha del examen', 'dateFormat' => 'DMY'));
        echo $this->Form->input('activo', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExamenesCabecera.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExamenesCabecera.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('action' => 'index')); ?></li>
	</ul>
</div>
