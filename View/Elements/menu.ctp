<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<?php if ($tipo==1) { ?>
<div id='cssmenu'>
    <ul>
        <li class='active'><?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Trabajos'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Examenes'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
        <li class='last'><?php echo $this->Html->link(__('Notas'), array('controller' => 'notas', 'action' => 'index')); ?></li>
    </ul>
</div>
<?php }
 if ($tipo==2) { ?>
    <br />
    <div id='cssmenu'>
        <ul>
            <li class='active'><?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('Trabajos'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('Examenes'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('Notas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
            <li class='last'><?php echo $this->Html->link(__('Admin'), array('controller' => 'pages', 'action' => 'index')); ?></li>
        </ul>
    </div>
<?php } ?>