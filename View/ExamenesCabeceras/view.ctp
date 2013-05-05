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
    <h3><?php echo __('Menu'); ?></h3>
    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>