<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="examenesDetalles form">
<?php echo $this->Form->create('ExamenesDetalle', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Enviar examen'); ?></legend>
	<?php
		echo $this->Form->input('dsc', array('label'=>'Título'));
		echo $this->Form->input('examenes_cabecera_id', array('label'=>'Examen'));
        echo $this->Form->input('ExamenesDetalle.fichero', array('type' => 'file'));
        echo $this->Form->input('ExamenesDetalle.fichero_dir', array('type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <br />
    <?php echo $this->element('menu'); ?>
</div>