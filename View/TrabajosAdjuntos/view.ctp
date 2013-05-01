<div class="trabajosAdjuntos view">
<h2><?php  echo __('Trabajos Adjunto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fichero'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['fichero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fichero Dir'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['fichero_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabajo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajosAdjunto['Trabajo']['dsc'], array('controller' => 'trabajos', 'action' => 'view', $trabajosAdjunto['Trabajo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trabajosAdjunto['TrabajosAdjunto']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trabajos Adjunto'), array('action' => 'edit', $trabajosAdjunto['TrabajosAdjunto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trabajos Adjunto'), array('action' => 'delete', $trabajosAdjunto['TrabajosAdjunto']['id']), null, __('Are you sure you want to delete # %s?', $trabajosAdjunto['TrabajosAdjunto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos Adjuntos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajos Adjunto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?> </li>
	</ul>
</div>
