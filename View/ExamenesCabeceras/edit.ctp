<div class="examenesCabeceras form">
<?php echo $this->Form->create('ExamenesCabecera'); ?>
	<fieldset>
		<legend><?php echo __('Editar Examen'); ?></legend>
	<?php
        echo $this->Form->input('dsc', array('label' => 'Título'));
        echo $this->Form->create('Basica');?>
        <label>Asignatura</label>
        <?php
        echo $this->Chosen->select('asignaturas', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
        //echo $this->Form->input('asignatura_id');
        echo $this->Form->input('enunciado');
        echo $this->Form->input('dia_examen', array('label' => 'Fecha del examen', 'dateFormat' => 'DMY'));
        echo $this->Form->input('activo', array('type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <div id='cssmenu'>
        <ul>
           <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>
