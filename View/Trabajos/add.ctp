<div class="trabajos form">
<?php echo $this->Form->create('Trabajo'); ?>
	<fieldset>
		<legend><?php echo __('Add Trabajo'); ?></legend>
	<?php
        echo $this->Form->input('trabajos_enunciado_id');
		echo $this->Form->input('dsc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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