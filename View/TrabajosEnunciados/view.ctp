<div class="trabajosEnunciados view">
<h2><?php  echo __('Trabajos Enunciado'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dsc'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Enunciado'); ?></dt>
		<dd>
			<?php echo h($trabajosEnunciado['TrabajosEnunciado']['enunciado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Asignatura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$trabajosEnunciado['TrabajosEnunciado']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$trabajosEnunciado['TrabajosEnunciado']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nuevo Trabajo'), array('controller' => 'trabajos_enunciados', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
