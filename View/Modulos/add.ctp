<div class="modulos form">
<?php echo $this->Form->create('Modulo'); ?>
	<fieldset>
		<legend><?php echo __('Add Modulo'); ?></legend>
	<?php
		echo $this->Form->input('dsc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Menu'); ?></h3>

    <div id='cssmenu'>
        <ul>
            <li class='active'><?php echo $this->Html->link(__('Volver'), array('controller' => 'modulos', 'action' => 'index')); ?></li>
        </ul>
    </div>


    <?php echo $this->element('menu'); ?>
</div>
