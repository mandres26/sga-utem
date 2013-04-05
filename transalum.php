<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<html>
<head>
<style>
table, th, td {
	border: 1px solid #D4E0EE;
	border-collapse: collapse;
	font-family: "Trebuchet MS", Arial, sans-serif;
	color: #555;
}

caption {
	font-size: 150%;
	font-weight: bold;
	margin: 5px;
}

td, th {
	padding: 4px;
}

thead th {
	text-align: center;
	background: #E6EDF5;
	color: #4F76A3;
	font-size: 100% !important;
}

tbody th {
	font-weight: bold;
}

tbody tr { background: #FCFDFE; }

tbody tr.odd { background: #F7F9FC; }

table a:link {
	color: #718ABE;
	text-decoration: none;
}

table a:visited {
	color: #718ABE;
	text-decoration: none;
}

table a:hover {
	color: #718ABE;
	text-decoration: underline !important;
}

tfoot th, tfoot td {
	font-size: 85%;
}
</style>
</head>
<body>
<?php
/**
********************************************************************************************
*  @file transalum.php
*  @brief muestra las distintas carreras en la que han estado los alumnos que tiene mas de 
*  un ingreso, ademas de mostrar el año de ingreso y el estado en que quedo
*  @author 
*  @version 1.0
*  @date 2012
********************************************************************************************/
require("config.php");
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpassword);
//Select Database
mysql_select_db($dbdatabase) or die(mysql_error());
mysql_query("SET NAMES utf8") or die(mysql_error());

$query = 'SELECT t1.estudiante_id, t1.anio_ingreso, t2.nombres,t2.apellidos, t2.rut, t4.codigo, t5.estado FROM cohortes AS t1
INNER JOIN estudiantes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 on t3.pe_id = t1.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes AS t5 ON t5.ee_id = t1.ee_id 
WHERE t1.estudiante_id=\''.$_GET['id'].'\'';
/**
* Realizamos la Consulta
*/
$result = mysql_query($query) or die(mysql_error());

echo "<div id=\"demo\"> \n"; // demo
echo "<table class=\"display\" id=\"alumno2\" border=\"1\"> \n"; // display
echo "<thead> \n";
echo "<tr> \n";
echo "<th>Carrera</th> \n";
echo "<th>Nombres</th> \n";
echo "<th>Apellidos</th> \n";
echo "<th>Rut</th> \n";
echo "<th>Estado</th> \n";
echo "<th>Año Ingreso</th> \n";
echo "</tr> \n";
echo "</thead> \n";

echo "<tbody> \n";
if ($row = mysql_fetch_assoc($result))
{
do
{
	echo "<tr> \n";
	echo "<td>".$row["codigo"]."</td> \n";
	echo "<td>".$row["nombres"]."</td> \n";
	echo "<td>".$row["apellidos"]."</td> \n";
	echo "<td>".$row["rut"]."</td>\n";
	echo "<td>".$row["estado"]."</d>\n";
	echo "<td>".$row["anio_ingreso"]."</td>\n";
	echo "</tr> \n";

}while($row = mysql_fetch_assoc($result));
}
?>

</div>
</body>
</html>

