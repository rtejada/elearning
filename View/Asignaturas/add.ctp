<div class="asignaturas form">
<?php echo $this->Form->create('Asignatura'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Asignatura'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
	?>
        <label>Curso </label>
        <?php
        echo $this->Chosen->select('curso_id', $cursos,
            array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));
        ?><br/>
        <label>Profesor </label>
    <?php
        echo $this->Chosen->select('usuario_id', $usuarios,
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
                <li class='last'><?php echo $this->Html->link(__('Volver'), '/'); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
