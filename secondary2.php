
<?php 
/**
********************************************************************************************
*  @file secondary2.php
*  @brief muestra en los distintos opciones de filtro para que se pueden 
*  usar para consultar los estados, año de ingreso y carrera de los alumnos
*  tambien muestra las opciones de exportacion y la vista de graficos
*  @author 
*  @version 1.0
*  @date 2012
********************************************************************************************/
echo "\n <div id=\"secondary\"> \n";
echo "<\n <div id=presentacion>";
echo "<h3>Consulta</h3> \n";
echo "<form action=\"estados.php\" method=\"POST\"> \n";
//carreras
echo "Carrera: <select name=\"carrera\"> \n";
/**
* query a realizar
*/
//$qesc = "SELECT permiso FROM usuarios Where id='".$_SESSION['USERID']."'";
$qesc = "SELECT permiso FROM usuarios Where id <> NULL";
/**
* Realizamos la consulta
*/	
$esca = mysql_query($qesc) or die(mysql_error());

if ($row = mysql_fetch_assoc($esca))
{
do
{

/**
* dividimos la cadena separada por comas en sus elementos por separado en un array
*/
	$escuela = explode(',', $row["permiso"]);
		
}while($row = mysql_fetch_assoc($esca));
}

foreach ($escuela as $elem) {
if($_POST['carrera']==$elem)
{
	echo "<option selected value=\"".$elem."\">".$elem."</option> \n";
}
else{
	echo "<option value=\"".$elem."\">".$elem."</option> \n";
}
}
if($_POST['carrera']=='Todas'){
	echo "<option selected value=\"Todas\">Todas</option> \n";
}
else{
	echo "<option value=\"Todas\">Todas</option> \n";
}
echo "</select><br /> \n";

//estados
echo "<br />Estado: <select name=\"estado\"> \n";
/**
* query a realizar
*/
$query3 = 'SELECT DISTINCT t1.estado FROM estados_estudiantes as t1 
inner join cohortes as t2 on t2.ee_id = t1.ee_id';
/**
* realizamos la consulta
*/
$esca3 = mysql_query($query3) or die(mysql_error());
if ($row3 = mysql_fetch_assoc($esca3))
{
do
{
	if($_POST['estado']==$row3['estado']){
		echo "<option selected Value=\"".$row3['estado']."\">".$row3['estado']."</option> \n";
	}
	else{
		echo "<option Value=\"".$row3['estado']."\">".$row3['estado']."</option> \n";
	}
}while($row3 = mysql_fetch_assoc($esca3));
}
if($_POST['estado']=='Todos'){
	echo "<option selected value=\"Todos\">Todos</option> \n";
}
else{
	echo "<option value=\"Todos\">Todos</option> \n";
}
echo "</select><br /> \n";

//año ingreso
echo "<br />Año Ingreso: <select name=\"anio\"> \n";
/**
* Consulta
*/
$qanio = "SELECT DISTINCT anio_ingreso FROM cohortes ORDER BY anio_ingreso";
/**
* Realizamos la consulta
*/
$anioi = mysql_query($qanio) or die(mysql_error());

if ($row2 = mysql_fetch_assoc($anioi))
{
do
{
	if($_POST['anio']==$row2['anio_ingreso']){
		echo "<option selected Value=\"".$row2['anio_ingreso']."\">".$row2['anio_ingreso']."</option> \n";
	}
	else{
		echo "<option Value=\"".$row2['anio_ingreso']."\">".$row2['anio_ingreso']."</option> \n";
	}
}while($row2 = mysql_fetch_assoc($anioi));
}
if($_POST['anio']=='Todos'){
	echo "<option selected Value=\"Todos\">Todos</option> \n";
}
else{
	echo "<option Value=\"Todos\">Todos</option> \n";
}
echo "</select> \n";
echo "<br /><br /><input type=\"submit\" value=\"Consultar\"> \n";
echo "</form> \n";

echo "<br /> \n";
if((isset($_POST['carrera'])==TRUE)&&(isset($_POST['anio'])==TRUE)&&(isset($_POST['estado'])==TRUE))
{
echo "<h3> Exportar a: </h3> \n";
echo "<p>";
echo "<form method=\"POST\" action=\"aexcel.php\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"carrera\" VALUE=\"".$_POST['carrera']."\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"anio\" VALUE=\"".$_POST['anio']."\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"estado\" VALUE=\"".$_POST['estado']."\"> \n";
echo "<input type=\"image\" src=\"media/images/excel_icon.jpg\" name=\"image\">";
//echo "<INPUT TYPE=\"submit\" VALUE=\"Exportar a XLSX\"> \n";
echo "</form> \n";

echo "<br /> \n";
echo "<form method=\"POST\" action=\"apdf.php\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"carrera\" VALUE=\"".$_POST['carrera']."\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"anio\" VALUE=\"".$_POST['anio']."\"> \n";
echo "<INPUT TYPE=\"hidden\" NAME=\"estado\" VALUE=\"".$_POST['estado']."\"> \n";
echo "<input type=\"image\" src=\"media/images/pdf_icon.jpg\" name=\"image\">";
//echo "<INPUT TYPE=\"submit\" VALUE=\"Exportar a PDF\"> \n";
echo "</form> \n";
echo "</p>";

echo "<br /> \n";
echo "<h3> Grafico: </h3> \n";
echo "<a href=\"grafico.php?carrera=".$_POST['carrera']."&anio=".$_POST['anio']."&TB_iframe=true&height=340&width=590\" rel=\"sexylightbox\" alt=\"AAA\" title=\"Carrera " . $_POST['carrera'] . " / Año " . $_POST['anio'] . "\"><img src=\"media/images/pie_graf.jpg\" border=\"0\"></a> \n";
echo "<p><b>(en el grafico vemos los distintos estados de los alumnos de acuerdo a las opciones seleccionadas de año de ingreso y carrera)</b></p> \n";
echo "</div> \n";
}
else
{
	echo "<a>debe Consultar datos antes de Graficar o exportarlos</a>";
	echo "</div> \n";
}
?>
