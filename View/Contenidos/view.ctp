<div class="contenidos view">
<h2><?php  echo __('Contenido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['archivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Id'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['usuario_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contenido'), array('action' => 'edit', $contenido['Contenido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contenido'), array('action' => 'delete', $contenido['Contenido']['id']), null, __('Are you sure you want to delete # %s?', $contenido['Contenido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenido'), array('action' => 'add')); ?> </li>
	</ul>
</div>
