<div class="asignaturas form">
<?php echo $this->Form->create('Asignatura'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Asignatura'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
		echo $this->Form->input('curso_id');
		echo $this->Form->input('usuario_id', array('label' => 'Profesor'));
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
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nueva Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'pages', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
