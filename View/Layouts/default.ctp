 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $title_for_layout?></title>
		<?php echo $this->Html->charset('UTF-8'); ?>
	<meta name="description" content="Plataforma de estudios a distancia" />
	<meta name="keywords" content="formacion, modulo, distancia" />

        <?php
              echo $this->Html->meta('icon');
              echo $this->Html->css('cake.generic', 'stylesheet', array("media"=>"all" ));
              echo $this->Html->css('nautica02liquid', 'stylesheet', array("media"=>"all" ));
              echo $this->Html->css('menu', 'stylesheet', array("media"=>"all" ));
              echo $this->Html->script('jquery');
              echo $this->fetch('meta');
              echo $this->fetch('css');
              echo $this->fetch('script');

    ?>

</head>


<body>

<div id="wrapper-menu-top">

    <?php echo $this->element('menu_top'); ?>
<!--menu-top-->

</div><!--wrapper-menu-top-->

<div id="wrapper-header">
    <div id="header">

        <div id="wrapper-header2">

            <div id="wrapper-header3">

                <div class="cabecera">
                        <?php /*echo $this->element('user_top');*/ ?>
                </div>

            </div>

        </div>



    </div>
</div>

<div id="wrapper-content">

    <div id="content">

    <?php echo $this->Session->flash(); ?>

    <?php echo $this->fetch('content'); ?>

    </div>
</div>

<div id="wrapper-footer">
<div id="footer">
<p>
 Eformar : &copy; 2013 Centro Privado no Homologado por la Consejer&iacute;a de Educaci&oacute;n de la Comunidad de Madrid

</p>
</div>
</div>
</body>
</html>
