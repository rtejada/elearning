<div class="usuarios view">
<h2><?php  echo __('Usuario'); ?></h2>

    <?php
      $enlace = array('controller' => 'usuarios', 'action' => 'edit', $usuario['Usuario']['id']);
      echo $this->Html->link(__('Editar Perfil'), $enlace, array('class' => 'button')); ?>
    <dl>

		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellidos'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['apellidos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha de nacimiento'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['fecha_nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dirección'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php
            if ($usuario['Usuario']['tipo']=='1') {
                echo __('Alumno');
            } elseif($usuario['Usuario']['tipo']=='2') {
                echo __('Profesor');
            } ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php

            //aqui se incluye la foto
            $url = $this->Html->url($link);
            echo $this->Html->image($url);

            $link = array('action' => 'downloadFile', $usuario['Usuario']['foto_dir'], $usuario['Usuario']['foto']);
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button', 'target' => '_blank'));

             ?>
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
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'usuarios', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Nueva Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'pages', 'action' => 'index')); ?></li>
            </ul>
        </div>
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>
