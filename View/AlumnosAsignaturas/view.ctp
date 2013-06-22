<div class="alumnosAsignaturas view">
<h2><?php  echo __('Alumnos Asignatura'); ?></h2>
	<dl>

		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosAsignatura['Usuario']['nombre'].' '.$alumnosAsignatura['Usuario']['apellidos'], array('controller' => 'usuarios', 'action' => 'view', $alumnosAsignatura['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($alumnosAsignatura['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $alumnosAsignatura['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$alumnosAsignatura['AlumnosAsignatura']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$alumnosAsignatura['AlumnosAsignatura']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>