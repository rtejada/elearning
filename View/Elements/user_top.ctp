<?php $user_id = $this->Session->read('Auth.User.id'); ?>
<?php echo $this->Html->link(__('Mi Cuenta'), array('controller' => 'usuarios', 'action' => 'edit', $user_id)); ?><br />
<?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'usuarios', 'action' => 'logout')); ?>