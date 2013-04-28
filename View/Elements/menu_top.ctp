<?php $id = $this->Session->read('Auth.User.id'); ?>
<div id="menu-top">
    <ul>
        <?php if ($id==NULL) { ?>
        <li><?php echo $this->Html->link(__('<span>Login</span>'), array('controller' => 'usuarios', 'action' => 'login'), array('escape' => false)); ?></li>
        <?php } ?>
        <li><?php echo $this->Html->link(__('<span>Sobre Eformar</span>'), array('controller' => 'pages', 'action' => 'display', 'sobre_eformar' ), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('<span>Ventajas</span>'), array('controller' => 'pages', 'action' => 'display', 'ventajas' ), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('<span>Contacto</span>'), array('controller' => 'pages', 'action' => 'display', 'contacto' ), array('escape' => false)); ?></li>
    </ul>
</div>