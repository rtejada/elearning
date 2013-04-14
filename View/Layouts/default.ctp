 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cake :: <?php echo $title_for_layout?></title>
		<?php echo $this->Html->charset('UTF-8'); ?>
	<meta name="description" content="Plataforma de estudios a distancia" />
	<meta name="keywords" content="formacion, modulo, distancia" />
	<meta name="author" content="Fran�ois ACTIS-GASTOU" />
        <?php echo $this->Html->css('cake.forms', 'stylesheet', array("media"=>"all" ));?>
        <?php echo $this->Html->css('nautica02liquid', 'stylesheet', array("media"=>"all" ));?>
        <?php echo $this->Html->css('cake.generic'); ?>
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
<h1></h1>
<div class="addthis_toolbox addthis_default_style" style="float:right">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>

</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51594bd774876484"></script>

</div>
</div>
</div>
</div>

<div id="wrapper-content">

<div id="content">

<h2>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
</h2>

</div>
</div>

<div id="wrapper-footer">
<div id="footer">
<p>
 Eformar : &copy; 2013 Centro Privado no Homologado por la Consejer&iacute;a de Educaci&oacute;n de la Comunidad de Madrid
</p>
</div>
</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
