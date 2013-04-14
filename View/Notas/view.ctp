<div class="notas view">
<h2><?php  echo __('Nota'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nota'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['nota']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alumno Asignatura Id'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['alumno_asignatura_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($nota['Nota']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nota'), array('action' => 'edit', $nota['Nota']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nota'), array('action' => 'delete', $nota['Nota']['id']), null, __('Are you sure you want to delete # %s?', $nota['Nota']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nota'), array('action' => 'add')); ?> </li>
	</ul>
</div>
