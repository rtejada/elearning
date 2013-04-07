 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CakePHP : The PHP Rapid Development Framework :: <?php echo $title_for_layout?></title>
		<?php echo $this->Html->charset('UTF-8'); ?>
	<meta name="description" content="Plataforma de estudios a distancia" />
	<meta name="keywords" content="formacion, modulo, distancia" />
	<meta name="author" content="François ACTIS-GASTOU" />
        <?php echo $this->Html->css('cake.forms', 'stylesheet', array("media"=>"all" ));?>
        <?php echo $this->Html->css('nautica02liquid', 'stylesheet', array("media"=>"all" ));?>
</head>

<body>

<div id="wrapper-menu-top">

<div id="menu-top">
	<ul>
		<li><a href="http://cakephp.org/" title="sobre"><span>Sobre Eformar</span></a></li>
		<li><a href="http://cakephp.org" title="ventajas"><span>Ventajas</span></a></li>
		<li><a href="http://cakephp.org/" title="contacto"><span>Contacto</span></a></li>
	</ul>
	
</div><!--menu-top-->

</div><!--wrapper-menu-top-->

<div id="wrapper-header">

<div id="header">

<div id="wrapper-header2">

<div id="wrapper-header3">
	<h1>
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51594bd774876484"></script>
	</h1>
</div>
</div>
</div>
</div>

<div id="wrapper-content">
<div id="wrapper-menu-page">
	<div id="menu-page">
	<h3>Iniciar Sesi&oacute;n</h3>
	<form method="post" action="">
<input type="text" name="usuario" value="Usuario" onFocus="if (this.value=='Usuario') this.value='';">
<input type="text" name="nombre" value="Contrase&ntilde;a" onFocus="if (this.value=='Contrase&ntilde;a') this.value='';">
	</form>


</div><!--menu-page-->
</div>
<div id="content">
	
<h2>Texto</h2>


<?php /* if ($this->controller->Session->check('Message.flash')) $this->controller->Session->flash();*/ ?>
<?php /*echo $content_for_layout  */?>
</div>
</div>

<div id="wrapper-footer">
<div id="footer">
<p>
 Eformar : &copy; 2013 FrancoisRoxana, Inc.
</p>
</div>
</div>
</body>
</html>
