<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
********************************************************************************************
*  @file header.php
*  @brief muestra el header del sitio en el esta el menu que es transversal a la mayoria de las paginas
*  del sitio mismo si un usuario muestra distintos tipos de opciones en el menu que si no lo esta 
*  ademas discrimina por el tipo de usuario
*  @author 
*  @version 1.0
*  @date 2012
********************************************************************************************/
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
  <title><?php echo $config_name; ?></title>
  <link rel="icon" type="image/ico" href="media/img/favicon.ico" />
  <link href="media/css/global.css" rel="stylesheet" type="text/css" />
	<link href="media/css/superfish.css" rel="stylesheet" type="text/css" media="screen">
	<link href="media/css/demo_page.css" rel="stylesheet" type="text/css" />
	<link href="media/css/demo_table.css" rel="stylesheet" type="text/css" />
	
	<meta content="text/html;" http-equiv="content-type" charset="utf-8">

	<script type="text/javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" src="media/js/hoverIntent.js"></script>
	<script type="text/javascript" src="media/js/superfish.js"></script>
	<script type="text/javascript" src="media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="media/ZeroClipboard/ZeroClipboard.js"></script>
	<script type="text/javascript">
	// initialise plugins
	jQuery(function(){
		jQuery('ul.sf-menu').superfish();
	});
	</script>
	
	
	  <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
  <script type="text/javascript" src="media/lightbox/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="media/lightbox/sexylightbox.v2.3.jquery.min.js"></script>
  <link rel="stylesheet" href="media/lightbox/sexylightbox.css" type="text/css" media="all" />
  
  <script type="text/javascript">
    $(document).ready(function(){
      SexyLightbox.initialize({color:'black', dir: 'media/lightbox/sexyimages'});
    });
  </script>

  <style>
  .alertbox
  {
    background  : url(media/lightbox/images/dialog-help.png) no-repeat scroll left top;
    margin      : 0 10px;
    padding     : 0 0 5px 40px;
    font-family : Verdana;
    font-size   : 12px;
    text-align  : left;
  }
  .alertbox .buttons
  {
    text-align  : right;
  }
  </style>
	
</head>
<body>
        <div id="wrapper">
            <div id="menu">
               <!-- <h1><a href="index.php">Portal de Gestion de Alumnos</a></h1> -->
                <ul class="sf-menu">
                    <li class="current"><a href="index.php">Inicio</a></li>
                    <?php
					if(isset($_SESSION['USERID']) == TRUE){
					echo "<li class=\"current\"><a href=\"#\">Consulta</a> \n";
					echo "<ul> \n";
					echo "<li><a href=\"estados.php\">Estado Alumnos</a></li> \n";
					if(($_SESSION['USERTYPE']== 'Admin') || ($_SESSION['USERTYPE']=='Jefe de Carrera')){
					echo "<li><a href=\"transfer.php\">Transferencias</a></li> \n";}
					echo "</ul> \n";
					echo "</li> \n";
                    echo "<li class=\"current\"><a href=\"#\">Gestion Cuenta</a> \n";
					echo "<ul> \n";
					echo "<li><a href=\"modifica.php\">Modificar Contraseña</a></li> \n";
					if($_SESSION['USERTYPE']== 'Admin'){
					echo "<li><a href=\"setpermisos.php\">Gestionar Permisos</a></li> \n";
					}
					echo "</ul> \n";
					echo "</li> \n";
					}
					?>
					                    
                    <li class="current"><a href="#">Ofertas Laborales</a>
						<ul>
						<!-- poner algun if para ver si ya ingreso -->
						<?php
						if(isset($_SESSION['USERID']) == FALSE){
							echo "<li><a href=\"ver_oferta.php\">Todas las ofertas</a></li>";}
						else if (isset($_SESSION['USERID']) == TRUE ){
							echo "<li><a href=\"ver_oferta.php\">Todas las ofertas</a></li>";
							echo "<li><a href=\"industrial.php\">Ing. Industrial</a></li>";
							echo "<li><a href=\"sistemas.php\">Sistemas de Gestion</a></li>";
							echo "<li><a href=\"agroindustria.php\">Agroindustrias</a></li>";
							echo "<li><a href=\"enviar_oferta.php\">Crear Oferta</a></li>";
							}
						?>
						</ul>
					</li>
                    
                        <li class="current"><a href="#">Formularios</a>
						<ul>
						<!-- poner algun if para ver si ya ingreso -->
						<?php
						if(isset($_SESSION['USERID']) == FALSE){
							echo "<li><a href=\"ingreso.php\">Descargar Formularios</a></li>";}
						else if (isset($_SESSION['USERID']) == TRUE ){
							echo "<li><a href=\"ingreso.php\">Descargar Formularios</a></li>";
							echo "<li><a href=\"ingreso.php\">Cargar Formularios</a></li>";
							echo "<li><a href=\"salir.php\">Nuevas Solicitudes</a></li>";}
						?>
						</ul>
					</li>
                    
                     <li class="current"><a href="#">Profesores</a>
						<ul>
						<!-- poner algun if para ver si ya ingreso -->
						<?php
						if(isset($_SESSION['USERID']) == FALSE){
							echo "<li><a href=\"autoridades.php\">Autoridades</a></li>";}
						else if (isset($_SESSION['USERID']) == TRUE ){
							echo "<li><a href=\"autoridades.php\">Autoridades</a></li>";
							echo "<li><a href=\"jornadacompleta.php\">Jornada Completa</a></li>";
							echo "<li><a href=\"jornadaparcial.php\">Jornada Parcial</a></li>";}
						?>
						</ul>
					</li>
                    
                    
                    
                        <li class="current"><a href="#">Analisis Institucional</a>
						<ul>
						<!-- poner algun if para ver si ya ingreso -->
						<?php
						if(isset($_SESSION['USERID']) == FALSE){
							echo "<li><a href=\"ingreso.php\">Ver Indicadores</a></li>";
							}
						else if (isset($_SESSION['USERID']) == TRUE ){
							echo "<li><a href=\"ingreso.php\">Ver Indicadores</a></li>";
							echo "<li><a href=\"ingreso.php\">Cargar Indicadores</a></li>";
							}
						?>
						</ul>
					</li>
                    
                    <li class="current"><a href="#">Acceso</a>
						<ul>
						<!-- poner algun if para ver si ya ingreso -->
						<?php
						if(isset($_SESSION['USERID']) == FALSE){
							echo "<li><a href=\"ingreso.php\">Ingresar</a></li>";}
						else if (isset($_SESSION['USERID']) == TRUE ){
							echo "<li><a href=\"salir.php\">Salir</a></li>";}
						?>
						</ul>
					</li>
                    
                    
                    <li><a href="acerca_sitio.html" onClick="window.open(this.href, this.target, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=490, height=420, top=85, left=140'); return false;">Acerca del Sitio</a></li>
                    
                   
                </ul>
                <div id="menu_imagen">
                    <img src="media/img/banner3.png" alt="Universidad Tecnológica Metropolitana - Casa Central" />
                </div>
            </div>