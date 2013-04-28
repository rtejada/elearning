<?php
 $user_id = $this->Session->read('Auth.User.id');
 if($user_id != NULL) {
     echo $this->Html->link(__('Mi Cuenta'), array('controller' => 'usuarios', 'action' => 'edit', $user_id));
     echo '<br />';
     echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'usuarios', 'action' => 'logout'));
 }
