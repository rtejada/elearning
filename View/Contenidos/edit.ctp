<div class="contenidosTemarios form">
<?php echo $this->Form->create('Contenido'); ?>
	<fieldset>
		<legend><?php echo __('Editar Contenidos Temario'); ?></legend>
	<?php
        echo $this->Form->input('dsc', array('label' => 'Título'));
    ?><br />
        <label>Asignaturas</label>
    <?php
        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Form->input('orden', array('style' => 'width: 50px;'));
        echo $this->Form->input('Contenido.fichero', array('type' => 'file'));
        echo $this->Form->input('Contenido.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'contenidos', 'action' => 'index')); ?></li>
        </ul>
    </div>

    <?php echo $this->element('menu'); ?>
</div>
