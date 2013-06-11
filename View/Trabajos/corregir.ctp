<div class="trabajos form">

	<fieldset>
		<legend><?php echo __('Corregir Trabajo'); ?></legend>

        <dl>
            <dt><?php echo __('Descripción'); ?></dt>
            <dd>
                <?php echo h($trabajo['Trabajo']['dsc']); ?>
                &nbsp;
            </dd>
            <dt><?php echo __('Alumno'); ?></dt>
            <dd>
                <?php echo h($trabajo['Usuario']['nombre'].' '.$trabajo['Usuario']['apellidos']); ?>
                &nbsp;
            </dd>
        </dl>
        <?php echo $this->Form->create('Trabajo'); ?>
	<?php
        echo $this->Form->input('nota', array('label'=> 'Nota', 'style' => 'width: 100px'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<?php $tipo = $this->Session->read('Auth.User.tipo'); ?>
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
