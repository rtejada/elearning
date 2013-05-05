<div class="form">
    <div class="actions">
    <h2><?php echo __('Zona de Administración'); ?></h2><br />

        <?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index'), array('class' => 'button')); ?><br /><br />

        <?php echo $this->Html->link(__('Asignar asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index'), array('class' => 'button')); ?><br /><br />

        <?php echo $this->Html->link(__('Crear usuarios'), array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'button')); ?><br /><br />

        <?php echo $this->Html->link(__('Crear modulos'), array('controller' => 'modulos', 'action' => 'index'), array('class' => 'button')); ?><br /><br />
    </div>
</div>

<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>
    <div id='cssmenu'>
        <ul>
            <li class='last'><?php echo $this->Html->link(__('Volver'), '/'); ?></li>
        </ul>
    </div>
    <?php echo $this->element('menu'); ?>
</div>