<div id="content" class="clearfix">
                <h2 id="page_header"><span>Estado Alumnos</span></h2>
                <div id="main">
	
<?php
/**
******************************************************
* @file consulta.php
* @brief Archivo que genera las consultas necesarias para mostrar 
* los estados de los alumnos, por año, carrera o estado
* @author dcarrasco
* @version 1.0
* @date Agosto 2010
*******************************************************/
if((isset($_POST['anio'])==TRUE) || (isset($_POST['carrera'])==TRUE) || (isset($_POST['estado'])==TRUE))
{			
if($_POST['carrera']=="Todas" && $_POST['anio']=="Todos" && $_POST['estado']=="Todos"){
	$query = "SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id";}
else if($_POST['carrera']!="Todas" && $_POST['anio']=="Todos" && $_POST['estado']=="Todos"){
	$carrera = mysql_real_escape_string($_POST['carrera']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id 
AND t4.codigo='".$carrera."'";}
else if($_POST['carrera']=="Todas" && $_POST['anio']!="Todos" && $_POST['estado']=="Todos"){
	$anio = mysql_real_escape_string($_POST['anio']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t2.anio_ingreso='".$anio."' ";}
else if($_POST['carrera']=="Todas" && $_POST['anio']=="Todos" && $_POST['estado']!="Todos"){
	$estado = mysql_real_escape_string($_POST['estado']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t5.estado='".$estado."' ";}
else if($_POST['carrera']!="Todas" && $_POST['anio']!="Todos" && $_POST['estado']=="Todos"){
	$anio = mysql_real_escape_string($_POST['anio']);
	$carrera = mysql_real_escape_string($_POST['carrera']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t2.anio_ingreso='".$anio."' AND t4.codigo='".$carrera."'";}
else if($_POST['carrera']=="Todas" && $_POST['anio']!="Todos" && $_POST['estado']!="Todos"){
	$anio = mysql_real_escape_string($_POST['anio']);
	$estado = mysql_real_escape_string($_POST['estado']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t2.anio_ingreso='".$anio."' AND t5.estado='".$estado."'";}
else if($_POST['carrera']!="Todas" && $_POST['anio']=="Todos" && $_POST['estado']!="Todos"){
	$carrera = mysql_real_escape_string($_POST['carrera']);
	$estado = mysql_real_escape_string($_POST['estado']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t4.codigo='".$carrera."' AND t5.estado='".$estado."'";}
else{
	$carrera = mysql_real_escape_string($_POST['carrera']);
	$estado = mysql_real_escape_string($_POST['estado']);
	$anio = mysql_real_escape_string($_POST['anio']);
	$query = "SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t2.anio_ingreso='".$anio."' AND t4.codigo='".$carrera."' AND t5.estado='".$estado."'";}

$result = mysql_query($query) or die(mysql_error());

echo "<div id=\"demo\"> \n";
echo "<table class=\"display\" id=\"alumno\"> \n";
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
if($row = mysql_fetch_assoc($result))
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
echo "</tbody> \n";
echo "</table> \n";
echo "</div> \n";
}
else{
	echo "\n <p><b>Primero debes consultar datos en la barra lateral</b></p>";
}
?>				

</div>
