<div class="trabajosEnunciados form">
<?php echo $this->Form->create('TrabajosEnunciado', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Editar Trabajos Enunciado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dsc', array('label' => 'Título'));
		echo $this->Form->input('enunciado');
    ?>
           <label>Asignaturas</label>
    <?php
        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Form->input('fecha_tope', array('label' => 'Fecha máxima de entrega', 'dateFormat' => 'DMY'));
        echo $this->Form->input('TrabajosEnunciado.fichero', array('type' => 'file'));
        echo $this->Form->input('TrabajosEnunciado.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>