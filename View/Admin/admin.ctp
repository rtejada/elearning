<style>
    dl dt { width: 300px; }
    dl dd a { margin-left: 50px; }
</style>
<div class="form">
   <table>
        <tr><td colspan="3"><?php echo __('Zona de Administración'); ?></td></tr>
        <tr>
            <td class="actions">
                <?php echo $this->Html->link(__('Cursos'), array('controller' => 'cursos', 'action' => 'index'), array('class' => 'button')); ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__('Modulos'), array('controller' => 'modulos', 'action' => 'index'), array('class' => 'button')); ?>
            </td>

            <td class="actions">
                <?php echo $this->Html->link(__('Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index'), array('class' => 'button')); ?>
            </td>

        </tr>

        <tr>
            <td class="actions">
                <?php echo $this->Html->link(__('Alumnos y Profesores'), array('controller' => 'usuarios', 'action' => 'index'), array('class' => 'button')); ?>
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__('Asignaturas y Alumnos'), array('controller' => 'alumnos_asignaturas', 'action' => 'index'), array('class' => 'button')); ?>
            </td>
            <td class="actions">

            </td>
        </tr>
    </table>

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