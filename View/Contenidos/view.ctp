<div class="contenidos view">
<h2><?php  echo __('Contenido'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['id']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Asignatura'); ?></dt>
        <dd>
            <?php echo $this->Html->link($contenido['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $contenido['Asignatura']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Título'); ?></dt>
        <dd>
            <?php echo h($contenido['Contenido']['dsc']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Fichero'); ?></dt>
		<dd>
			<?php  $link = array('action' => 'downloadFile', $contenido['Contenido']['fichero_dir'], $contenido['Contenido']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profesor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contenido['Usuario']['nombre'].' '.$contenido['Usuario']['apellidos']
                , array('controller' => 'usuarios', 'action' => 'view', $contenido['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enviado'); ?></dt>
		<dd>
			<?php echo h($contenido['Contenido']['created']); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contenidos Temario'), array('action' => 'edit', $contenido['Contenido']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contenidos Temario'), array('action' => 'delete', $contenido['Contenido']['id']), null, __('Are you sure you want to delete # %s?', $contenido['Contenido']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contenidos Temarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contenidos Temario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
