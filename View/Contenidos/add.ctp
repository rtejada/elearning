<div class="contenidosTemarios form">
<?php echo $this->Form->create('Contenido', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Agregar contenido'); ?></legend>
	<?php
        echo $this->Form->input('dsc', array('label' => 'Título'));
		echo $this->Form->input('asignatura_id');
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
