<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
<div class="trabajos view">
<h2><?php  echo __('Trabajo Enviado'); ?></h2>
    <br />
	<dl>
        <dt><?php echo __('Enunciado'); ?></dt>
        <dd>
            <?php echo $this->Html->link($trabajo['TrabajosEnunciado']['dsc'], array('controller' => 'trabajos_enunciados', 'action' => 'view', $trabajo['TrabajosEnunciado']['id'])); ?>
            &nbsp;
        </dd>
		<dt><?php echo __('Descripción'); ?></dt>
		<dd>
			<?php echo h($trabajo['Trabajo']['dsc']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Nota'); ?></dt>
        <dd>
            <?php
            if ($trabajo['Trabajo']['nota'] > 0) {
            echo h($trabajo['Trabajo']['nota']);
            } ?>
            &nbsp;
        </dd>
        <?php if ($tipo==2) {   ?>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajo['Usuario']['login'], array('controller' => 'usuarios', 'action' => 'view', $trabajo['Usuario']['id'])); ?>
			&nbsp;
		</dd>
        <?php }   ?>

        <dt><?php echo __('Adjunto'); ?></dt>
        <dd>
            <?php
            $link = array('action' => 'downloadFile', $trabajo['Trabajo']['fichero_dir'], $trabajo['Trabajo']['fichero'], 'fichero');
            echo $this->Html->link(__('Descargar'), $link, array('class' => 'button'));
            ?>
        </dd>

		<dt><?php echo __('Enviado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$trabajo['Trabajo']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado'); ?></dt>
		<dd>
			<?php echo h($this->Time->format('d/m/Y',$trabajo['Trabajo']['modified'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

        <div id='cssmenu'>
            <ul>
                <li class='last'><?php echo $this->Html->link(__('Volver'), array('controller' => 'trabajos', 'action' => 'index')); ?></li>
            </ul>
        </div>
        <br />
    <?php echo $this->element('menu'); ?>
</div>
