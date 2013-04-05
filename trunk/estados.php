<?php
include ("cabezera2.php");
//session_start();
/**
******************************************************
* @file estados.php
* @brief Archivo que genera la tabla donde se almacenara los estados de los alumnos
* @author 
* @version 1.0
* @date 
*******************************************************/
require("config.php");
require("estado_tablero.php");
//if(isset($_SESSION['USERID']) == TRUE){
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpassword);
//Select Database
mysql_select_db($dbdatabase) or die(mysql_error());
mysql_query("SET NAMES utf8") or die(mysql_error());
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "\n";
//require("header.php");
?>
<script type="text/javascript" charset="utf-8">

			$(document).ready(function() {
			$('#alumno').dataTable( {
					"oLanguage": {
					"sLengthMenu": "Mostrar _MENU_ alumnos por pagina",
					"sZeroRecords": "Disculpenos - No se Ha Encontrado Nada",
					"sInfo": "Mostrando desde _START_ hasta _END_ de _TOTAL_ Alumnos",
					"sInfoEmpty": "Mostrando desde 0 hasta 0 de 0 Alumnos",
					"sInfoFiltered": "(filtrado desde _MAX_ alumnos totales)",
					"sSearch": "Buscar:"

		}
		} );
} );
</script>
<?php
require("consulta.php");
require("secondary2.php");
   //require("footer.php");
//}
//else{
	//header("Location: " . $config_basedir);}
?>

