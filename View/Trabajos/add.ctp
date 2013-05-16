<div class="trabajos form">
<?php echo $this->Form->create('Trabajo', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Enviar trabajo'); ?></legend>
	<?php
        echo $this->Form->input('trabajos_enunciado_id', array('label'=> 'Seleccione trabajo'));
		echo $this->Form->input('dsc', array('label'=> 'Título', 'style' => 'width: 500px'));
        echo $this->Form->input('Trabajo.fichero', array('type' => 'file'));
        echo $this->Form->input('Trabajo.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <br />
    <?php echo $this->element('menu'); ?>
</div>