<style>
    dl dt { width: 300px; }
    dl dd a { margin-left: 50px; }
</style>
<div class="form">
   <h2><?php echo __('Zona de Administración'); ?></h2><br />

        <dl>

            <dt><?php echo __('Gestión de Cursos'); ?></dt>
            <dd>
                <?php echo $this->Html->link(__('Ir'), array('controller' => 'cursos', 'action' => 'index'), array('class' => 'button')); ?>

            </dd>

            <dt><?php echo __('Gestión de Módulos'); ?></dt>
            <dd>
                <?php echo $this->Html->link(__('Ir'), array('controller' => 'modulos', 'action' => 'index'), array('class' => 'button')); ?>

            </dd>

            <dt><?php echo __('Gestión de Asignaturas'); ?></dt>
            <dd>
                <?php echo $this->Html->link(__('Ir'), array('controller' => 'asignaturas', 'action' => 'index'), array('class' => 'button')); ?>

            </dd>
            <dt><?php echo __('Gestión de Alumnos y Profesores'); ?></dt>
            <dd>
                <?php echo $this->Html->link(__('Ir'), array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'button')); ?>

            </dd>

            <dt><?php echo __('Relación entre Asignaturas y Alumnos'); ?></dt>
            <dd>
                <?php echo $this->Html->link(__('Ir'), array('controller' => 'alumnos_asignaturas', 'action' => 'index'), array('class' => 'button')); ?>

            </dd>
        </dl>

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