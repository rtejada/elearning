<?php $id = $this->Session->read('Auth.User.id'); ?>
<div id="menu-top">
    <ul>
        <li><?php echo $this->Html->link(__('<span>Inicio</span>'), '/' , array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('<span>Sobre Eformar</span>'), array('controller' => 'pages', 'action' => 'display', 'sobre_eformar' ), array('escape' => false)); ?></li>
        <li><?php echo $this->Html->link(__('<span>Contacto</span>'), array('controller' => 'pages', 'action' => 'display', 'contacto' ), array('escape' => false)); ?></li>
        <?php if ($id==NULL) { ?>
        <li><?php echo $this->Html->link(__('<span>Login</span>'), array('controller' => 'usuarios', 'action' => 'login'), array('escape' => false)); ?></li>
        <?php } ?>
        <?php if ($id) { ?>
            <li><?php echo $this->Html->link(__('<span>Mi Cuenta</span>'), array('controller' => 'usuarios', 'action' => 'view', $id), array('escape' => false)); ?></li>
            <li><?php echo $this->Html->link(__('<span>Logout</span>'), array('controller' => 'usuarios', 'action' => 'logout'), array('escape' => false)); ?></li>
        <?php } ?>

    </ul>
</div>