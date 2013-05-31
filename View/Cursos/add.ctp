<div class="cursos form">
<?php echo $this->Form->create('Curso'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Curso'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
        ?><br/>
        <label>Modulo </label>
        <?php
        echo $this->Chosen->select('modulo_id', $modulos,
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
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'cursos', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
