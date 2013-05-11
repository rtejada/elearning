<div class="examenesDetalles form">
<?php echo $this->Form->create('ExamenesDetalle', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Corregir examen'); ?></legend>
    <dl>
        <dt><?php echo __('Usuario'); ?></dt>
        <dd>
            <?php echo h($examenesDetalle['Usuario']['nombre'].' '.$examenesDetalle['Usuario']['apellidos']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Examen'); ?></dt>
        <dd>
            <?php echo h($examenesDetalle['ExamenesCabecera']['dsc']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Enviado'); ?></dt>
        <dd>
            <?php echo h($examenesDetalle['ExamenesDetalle']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Fichero'); ?></dt>
        <dd>
        <?php
        $link = array('action' => 'downloadFile', $examenesDetalle['ExamenesDetalle']['fichero_dir'], $examenesDetalle['ExamenesDetalle']['fichero'], 'fichero');
        echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
        ?>
        </dd>
    </dl>
	<?php
		echo $this->Form->input('nota', array('style' => 'width: 50px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar nota')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ExamenesDetalle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ExamenesDetalle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Examenes Detalles'), array('action' => 'index')); ?></li>
	</ul>
</div>
