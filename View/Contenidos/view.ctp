<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
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
        <?php if ($tipo==2) { ?>
        <dt><?php echo __('Orden'); ?></dt>
        <dd>
            <?php echo h($contenido['Contenido']['orden']); ?>
            &nbsp;
        </dd>
        <?php } ?>
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
			<?php echo h($this->Time->format('d/m/Y',$contenido['Contenido']['created'])); ?>
			&nbsp;
		</dd>

	</dl>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>

        <ul>
            <?php if ($tipo==2) { ?>
            <li class='active'><?php echo $this->Html->link(__('Volver'), array('controller' => 'Contenidos', 'action' => 'index')); ?></li>
            <?php } ?>
        </ul>
    </div>

    <?php echo $this->element('menu'); ?>

</div>