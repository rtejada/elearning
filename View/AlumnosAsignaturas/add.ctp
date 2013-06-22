<div class="alumnosAsignaturas form" style="height: 500px">
<?php echo $this->Form->create('AlumnosAsignatura'); ?>
	<fieldset>
		<legend><?php echo __('Asignar Asignaturas a Alumnos'); ?></legend>

    <label>Usuario </label>
        <?php
        echo $this->Chosen->select('usuario_id', $usuarios,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px; height: 200px'));
        ?>
        <br/>
    <label>Asignatura </label>
        <?php
        echo $this->Chosen->select('asignatura_id', $asignaturas,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
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
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
