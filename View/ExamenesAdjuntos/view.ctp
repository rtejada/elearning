<div class="examenesAdjuntos view">
<h2><?php  echo __('Examenes Adjunto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruta Fichero'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['ruta_fichero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Examen Id'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['examen_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($examenesAdjunto['ExamenesAdjunto']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Examenes Adjunto'), array('action' => 'edit', $examenesAdjunto['ExamenesAdjunto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Examenes Adjunto'), array('action' => 'delete', $examenesAdjunto['ExamenesAdjunto']['id']), null, __('Are you sure you want to delete # %s?', $examenesAdjunto['ExamenesAdjunto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Adjuntos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Adjunto'), array('action' => 'add')); ?> </li>
	</ul>
</div>
