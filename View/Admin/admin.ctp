<fieldset>
    <legend><?php echo __('Zona de Administración'); ?></legend>

    <dl>
        <dt><?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index'), array('class' => 'button')); ?></dt>
        <dd>
            <?php echo $this->Html->link(__('Asignar asignaturas'), array('controller' => 'alumnos_asignaturas', 'action' => 'index'), array('class' => 'button')); ?>
        </dd>
        <dt><?php echo $this->Html->link(__('Crear usuarios'), array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'button')); ?></dt>
        <dd>
            <?php echo $this->Html->link(__('Crear modulos'), array('controller' => 'modulos', 'action' => 'index'), array('class' => 'button')); ?>
        </dd>
    </dl>

</fieldset>