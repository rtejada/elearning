<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="notas form">
<?php echo $this->Form->create('Nota'); ?>
	<fieldset>
		<legend><?php echo __('Editar Nota'); ?></legend>
	<?php

        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Chosen->select('usuario_id', $alumnos,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Chosen->select('tipo_nota', $tipo_notas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));

        echo $this->Form->input('nota');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'notas', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
