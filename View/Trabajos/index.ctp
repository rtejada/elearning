<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="trabajos index">


    <?php if ($tipo==1) {  ?>
    <h2><?php echo __('Trabajos pendientes');   ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>

            <th><?php echo __('Enunciado'); ?></th>
            <th><?php echo __('Asignatura'); ?></th>
            <th><?php echo __('Creado'); ?></th>
            <th><?php echo __('Fecha tope entrega'); ?></th>
            <th class="actions"></th>
        </tr>
        <?php foreach ($trabajosEnunciados as $trabajosEnunciado): ?>
            <tr>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['dsc']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($trabajosEnunciado['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $trabajosEnunciado['Asignatura']['id'])); ?>
                </td>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['created']); ?>&nbsp;</td>
                <td><?php echo h($trabajosEnunciado['TrabajosEnunciado']['fecha_tope']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajosEnunciado['TrabajosEnunciado']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php }  ?>
    <br />

    <div>
        <?php echo $this->Form->create('Basica');?>

        <?php
        echo $this->Chosen->select('Enunciado');
        ?>

        <?php echo $this->Form->input('Enunciado', array('div'=>false, 'empty' => true));?>
        <?php if ($tipo==2)
            echo $this->Form->input('alumnos', array('div'=>false, 'empty' => true));?>
        <span style="margin-left: 50px">
            <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
            <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
        </span>
        <?php echo $this->Form->end();?>
        <br />
    </div>

	<h2><?php echo __('Trabajos enviados'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('trabajos_enunciado_id', 'Enunciado'); ?></th>
			<th><?php echo $this->Paginator->sort('dsc', ' '); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id', 'Alumno'); ?></th>
            <th><?php echo $this->Paginator->sort('nota', 'Nota'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'Enviado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trabajos as $trabajo): ?>
	<tr>
		<td><?php echo h($trabajo['Trabajo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajo['TrabajosEnunciado']['dsc'], array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajo['TrabajosEnunciado']['id'])); ?>
		</td>
        <td><?php echo h($trabajo['Trabajo']['dsc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trabajo['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $trabajo['Usuario']['id'])); ?>
		</td>
        <td><?php  if ($trabajo['Trabajo']['nota'] > 0)
                   echo h($trabajo['Trabajo']['nota']);  ?>&nbsp;</td>
		<td><?php echo h($trabajo['Trabajo']['created']); ?>&nbsp;</td>
		<td class="actions">
            <?php
            $link = array('action' => 'downloadFile', $trabajo['Trabajo']['fichero_dir'], $trabajo['Trabajo']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
            ?>

            <?php echo $this->Html->link(__('Ver'), array('action' => 'view', $trabajo['Trabajo']['id'])); ?>
			<?php      if(($trabajo['Trabajo']['nota']==0) and ($tipo==1)) {
                            echo $this->Html->link(__('Editar'), array('action' => 'edit', $trabajo['Trabajo']['id']));
			                echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $trabajo['Trabajo']['id']), null, __('Are you sure you want to delete # %s?', $trabajo['Trabajo']['id']));
                       } elseif($tipo==2) {
                            echo $this->Html->link(__('Corregir'), array('action' => 'corregir', $trabajo['Trabajo']['id']));
                       }


            ?>	</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>


<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <?php if ($tipo==1) { ?>
        <div id='cssmenu'>
            <ul>
                <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
                <li class='last'><?php echo $this->Html->link(__('Enviar trabajo'), array('controller' => 'trabajos', 'action' => 'add')); ?></li>
            </ul>
        </div>
        <br />
    <?php } ?>

    <?php echo $this->element('menu'); ?>
</div>