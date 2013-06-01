<div class="alumnosAsignaturas form">
<?php echo $this->Form->create('AlumnosAsignatura'); ?>
	<fieldset>
		<legend><?php echo __('Editar Alumnos Asignatura'); ?></legend>
	<?php
		echo $this->Form->input('id');
    ?>
        <label>Usuario</label>
    <?php
        echo $this->Chosen->select('usuarios', $usuarios,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
	?><br />
        <label>Asignaturas</label>
    <?php
        echo $this->Chosen->select('asignaturas', $asignaturas,
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

