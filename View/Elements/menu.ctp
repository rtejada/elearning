<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<?php if ($tipo==1) { ?>
<div id='cssmenu'>
    <ul>
        <li class='active'><?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Trabajos'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Examenes'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?></li>
        <li class='last'><?php echo $this->Html->link(__('Notas'), array('controller' => 'notas', 'action' => 'index')); ?></li>
    </ul>
</div>
<?php }
 if ($tipo==2) { ?>
    <br />
    <div id='cssmenu'>
        <ul>
            <li class='has-sub'><a href='#'><span>Asignaturas</span></a>
                <ul>
                    <li class='active'><?php echo $this->Html->link(__('Ver'), array('controller' => 'asignaturas', 'action' => 'index')); ?></li>
                    <li class='active'><?php echo $this->Html->link(__('Crear temario'), array('controller' => 'contenidos', 'action' => 'index')); ?></li>
                </ul>

            <li class='has-sub'><a href='#'><span>Trabajos</span></a>
                <ul>
                    <li><?php echo $this->Html->link(__('Crear'), array('controller' => 'trabajos_enunciados', 'action' => 'index')); ?></li>
                    <li class='last'><?php echo $this->Html->link(__('Ver recibidos'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
                </ul>
            <li class='has-sub'><a href='#'><span>Exámenes</span></a>
                <ul>
                    <li><?php echo $this->Html->link(__('Crear'), array('controller' => 'examenes_cabeceras', 'action' => 'index')); ?></li>
                    <li class='last'><?php echo $this->Html->link(__('Ver recibidos'), array('controller' => 'examenes_detalles', 'action' => 'index')); ?></li>
                </ul>
            <li><?php echo $this->Html->link(__('Notas'), array('controller' => 'alumnos_asignaturas', 'action' => 'add')); ?></li>
            <li class='last'><?php echo $this->Html->link(__('Admin'), array('controller' => 'admin', 'action' => 'admin')); ?></li>
        </ul>
    </div>
<?php } ?>

