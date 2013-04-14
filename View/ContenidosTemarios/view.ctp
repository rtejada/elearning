<div class="contenidosTemarios view">
<h2><?php  echo __('Contenidos Temario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Archivo'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['archivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Id'); ?></dt>
		<dd>
			<?php echo h($contenidosTemario['ContenidosTemario']['usuario_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contenidos Temario'), array('action' => 'edit', $contenidosTemario['ContenidosTemario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contenidos Temario'), array('action' => 'delete', $contenidosTemario['ContenidosTemario']['id']), null, __('Are you sure you want to delete # %s?', $contenidosTemario['ContenidosTemario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos Temario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
