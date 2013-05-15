<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="contenidosTemarios index">

    <?php if ($tipo==2) { ?>
        <div>
            <?php echo $this->Form->create('Basica');?>
            <label>Asignaturas</label>
            <?php echo $this->Chosen->select('asignaturas', $asignaturas,
                array('data-placeholder' => 'Seleccione...', 'deselect' => true, 'style' => 'min-width: 200px;'));?>

            <span style="margin-left: 50px">
                <?php echo $this->Form->submit(__('Filtrar'), array('div'=>false, 'name'=>'submit')); ?>
                <?php echo $this->Form->submit(__('Limpiar'), array('div'=>false, 'name'=>'clear')); ?>
            </span>
            <?php echo $this->Form->end();?>
            <br />
        </div>
    <?php } ?>

    <h2><?php
        if($tipo==1 and isset($contenidos[0]['Asignatura']['dsc'])) {
            echo __($contenidos[0]['Asignatura']['dsc']);
        } else {
            echo __('Contenidos');
        }?>
    </h2>
    <table cellpadding="0" cellspacing="0">
	<tr>
        <?php if ($tipo==2) { ?>
            <th><?php echo $this->Paginator->sort('asignatura_id'); ?></th>
        <?php } ?>
            <th><?php echo $this->Paginator->sort('dsc', 'Titulo'); ?></th>
        <?php if ($tipo==2) { ?>
            <th><?php echo $this->Paginator->sort('orden'); ?></th>
        <?php } ?>
			<th><?php echo $this->Paginator->sort('created', 'Enviado'); ?></th>

			<th class="actions"><?php echo __('Acciones'); ?></th>

	</tr>
	<?php
	foreach ($contenidos as $contenido): ?>
	<tr>
        <?php if ($tipo==2) { ?>
        <td>
            <?php echo $this->Html->link($contenido['Asignatura']['dsc'], array('controller' => 'asignaturas', 'action' => 'view', $contenido['Asignatura']['id'])); ?>
        </td>
        <?php } ?>
        <td><?php echo h($contenido['Contenido']['dsc']); ?>&nbsp;</td>
        <?php if ($tipo==2) { ?>
        <td><?php echo h($contenido['Contenido']['orden']); ?></td>
        <?php } ?>
		<td><?php echo h($this->Time->format('d/m/Y',$contenido['Contenido']['created'])); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $contenido['Contenido']['id']));
            $link = array('action' => 'downloadFile', $contenido['Contenido']['fichero_dir'], $contenido['Contenido']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
            if($tipo==2) {
                echo $this->Html->link(__('Editar'), array('action' => 'edit', $contenido['Contenido']['id']));
			    echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $contenido['Contenido']['id']), null, __('Are you sure you want to delete # %s?', $contenido['Contenido']['id']));
            }
            ?>
		</td>
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

    <div id='cssmenu'>
        <ul>
            <li class='active'><?php echo $this->Html->link(__('Lista'), array('controller' => 'alumnos_asignaturas', 'action' => 'index')); ?></li>
        </ul>
    </div>

    <?php echo $this->element('menu'); ?>

</div>
