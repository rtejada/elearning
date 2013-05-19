<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
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
		<dt><?php echo __('Alumno'); ?></dt>
		<dd>
			<?php echo h($nota['Usuario']['nombre'].' '.$nota['Usuario']['apellidos']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Asignatura'); ?></dt>
        <dd>
            <?php echo h($nota['Asignatura']['dsc']); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$nota['Nota']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$nota['Nota']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==2) { ?>
    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'notas', 'action' => 'index')); ?></li>
        </ul>
    </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
