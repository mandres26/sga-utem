<?php
include ("cabezera2.php");
//session_start();
/**
********************************************************************************************
*  @file transfer.php
*  @brief muestra los alumnos que han tenido algun cambio de carrera dentro de la universidad.
*  ya que tienen mas de un ingreso, osea, en cohortes tienen distinto cohorte_id ero igual alumno_id
*  @author 
*  @version 1.0
*  @date 2012
********************************************************************************************/
require("config.php");
require("estado_tablero.php");
//if(isset($_SESSION['USERID']) == TRUE){
//Connect to MySQL Server<strong></strong>
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

<div id="content" class="clearfix">
                <h2 id="page_header"><span>Transferencias</span></h2>
                <div id="main">
                <br />
<?php			

$query = "SELECT t1.estudiante_id,t1.anio_ingreso, t2.nombres,t2.apellidos, t2.rut, t4.codigo FROM cohortes AS t1
INNER JOIN estudiantes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 on t3.pe_id = t1.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
GROUP BY estudiante_id HAVING count( 1 ) > 1";

$result = mysql_query($query) or die(mysql_error());

echo "<div id=\"demo\"> \n";
echo "<table class=\"display\" id=\"alumno\"> \n";
echo "<thead> \n";
echo "<tr> \n";
echo "<th>RUT</th> \n";
echo "<th>Nombres</th> \n";
echo "<th>Apellidos</th> \n";
echo "<th>Carrera</th> \n";
echo "<th>Año Ingreso</th> \n";
echo "</tr> \n";
echo "</thead> \n";

echo "<tbody> \n";
if ($row = mysql_fetch_assoc($result))
{
do
{
	echo "<tr> \n";
	echo "<td><a href=\"transalum.php?id=".$row["estudiante_id"]."&TB_iframe=true&height=340&width=565\" rel=\"sexylightbox\" title=\"Transferencias de: " .$row["nombres"] . " ". $row["apellidos"] . "\">".$row["rut"]."</a></td>\n";
	echo "<td>".$row["nombres"]."</td> \n";
	echo "<td>".$row["apellidos"]."</td> \n";
	echo "<td>".$row["codigo"]."</td> \n";
	echo "<td>".$row["anio_ingreso"]."</td>\n";
	echo "</tr> \n";
}while($row = mysql_fetch_assoc($result));
}
echo "</tbody> \n";
echo "</table> \n";
echo "</div> \n"
?>				
</div>

<?php
echo "\n <div id=\"secondary\"> \n";

echo "<br /> \n";
echo "<h3> Exportar a: </h3> \n";
echo "<p>";
echo "<form method=\"get\" action=\"aexcel2.php\"> \n";
echo "<input type=\"image\" src=\"media/images/excel_icon.jpg\" name=\"image\">";
echo "</form> \n";

echo "<br /> \n";
echo "<form method=\"get\" action=\"apdf2.php\"> \n";
echo "<input type=\"image\" src=\"media/images/pdf_icon.jpg\" name=\"image\">";
echo "</form> \n";
echo "</p>";

echo "</div> \n";

/*require("footer.php");
}
else{
	header("Location: " . $config_basedir);
}
*/
?>