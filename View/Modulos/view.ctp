<div class="modulos view">
<h2><?php  echo __('Modulo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($modulo['Modulo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Modulo'), array('action' => 'edit', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Modulo'), array('action' => 'delete', $modulo['Modulo']['id']), null, __('Are you sure you want to delete # %s?', $modulo['Modulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Modulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Modulo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cursos'); ?></h3>
	<?php if (!empty($modulo['Curso'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dsc'); ?></th>
		<th><?php echo __('Modulo Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($modulo['Curso'] as $curso): ?>
		<tr>
			<td><?php echo $curso['id']; ?></td>
			<td><?php echo $curso['dsc']; ?></td>
			<td><?php echo $curso['modulo_id']; ?></td>
			<td><?php echo $curso['created']; ?></td>
			<td><?php echo $curso['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cursos', 'action' => 'view', $curso['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cursos', 'action' => 'edit', $curso['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cursos', 'action' => 'delete', $curso['id']), null, __('Are you sure you want to delete # %s?', $curso['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
