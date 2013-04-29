<div class="trabajosEnunciados form">
<?php echo $this->Form->create('TrabajosEnunciado'); ?>
	<fieldset>
		<legend><?php echo __('Edit Trabajos Enunciado'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dsc', array('label' => 'Título'));
		echo $this->Form->input('enunciado');
		echo $this->Form->input('asignatura_id');
        echo $this->Form->input('fecha_tope', array('label' => 'Fecha máxima de entrega'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nuevo Trabajo'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>