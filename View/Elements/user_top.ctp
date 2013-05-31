<?php ?>
<div class="user_top">
<?php
 $user_id = $this->Session->read('Auth.User.id');
 if($user_id != NULL) {
     echo $this->Html->link(__('Mi Cuenta'), array('controller' => 'usuarios', 'action' => 'view', $user_id));
     echo '&nbsp;&nbsp;&nbsp;';
     echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'usuarios', 'action' => 'logout'));
 }
    ?>
</div>
