<div class="examenesDetalles view">
<h2><?php  echo __('Examenes Detalle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['dsc']); ?>
			&nbsp;
		</dd>
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
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo h($examenesDetalle['ExamenesDetalle']['nota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enviado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$examenesDetalle['ExamenesDetalle']['created'])); ?>
			&nbsp;
		</dd>

        <dt><?php echo __('Fichero'); ?></dt>
        <dd>
            <?php
            $link = array('action' => 'downloadFile', $examenesDetalle['ExamenesDetalle']['fichero_dir'], $examenesDetalle['ExamenesDetalle']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
            ?>
            &nbsp;
        </dd>



	</dl>
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
