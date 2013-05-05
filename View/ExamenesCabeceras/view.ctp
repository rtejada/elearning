<div class="examenesCabeceras view">
<h2><?php  echo __('Examenes Cabecera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignaturas Id'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['asignatura_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enunciado'); ?></dt>
		<dd>
			<?php echo h($examenesCabecera['ExamenesCabecera']['enunciado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Examenes Cabecera'), array('action' => 'edit', $examenesCabecera['ExamenesCabecera']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Examenes Cabecera'), array('action' => 'delete', $examenesCabecera['ExamenesCabecera']['id']), null, __('Are you sure you want to delete # %s?', $examenesCabecera['ExamenesCabecera']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Examenes Cabeceras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Examenes Cabecera'), array('action' => 'add')); ?> </li>
	</ul>
</div>
