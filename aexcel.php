<?php
session_start();
ob_start();
set_time_limit(240);
/**
******************************************************
* @file aexcel.php
* @brief Archivo exporta los datos consultados (Estados) a excel
* @author dcarrasco
* @version 1.0
* @date Agosto 2010
*******************************************************/
require("config.php");
if(isset($_SESSION['USERID']) == TRUE){
/**
*******************************************************
* @brief nos conectamos al SGBD y seleccionamos la database 
* indicada
******************************************************/
mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase) or die(mysql_error());
mysql_query("SET NAMES utf8") or die(mysql_error());
/**
*******************************************************
* @brief Consulta para generar los archivos Excel
******************************************************/
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
	$carrera = mysql_real_escape_string($_POST['carrera']);
	$anio = mysql_real_escape_string($_POST['anio']);
	$query ="SELECT t1.nombres, t1.apellidos, t1.rut, t2.anio_ingreso, t4.codigo, t5.estado
FROM estudiantes AS t1
INNER JOIN cohortes AS t2 ON t2.estudiante_id = t1.estudiante_id
INNER JOIN planes_estudios AS t3 ON t3.pe_id = t2.pe_id
INNER JOIN carreras AS t4 ON t4.carrera_id = t3.carrera_id
INNER JOIN estados_estudiantes as t5 ON t5.ee_id = t2.ee_id
AND t2.anio_ingreso='".$anio."' AND t4.codigo='".$carrera."'";}
else if($_POST['carrera']=="Todas" && $_POST['anio']!="Todos" && $_POST['estado']!="Todos"){
	$estado = mysql_real_escape_string($_POST['estado']);
	$anio = mysql_real_escape_string($_POST['anio']);
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

/** Error reporting */
error_reporting(E_ALL);
/**
******************************************************
* @brief Setea la configuracion para la exportacion a Excel
******************************************************/
/** PHPExcel */
include 'media/Classes/PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'media/Classes/PHPExcel/Writer/Excel2007.php';

// Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();

/**
*******************************************************
* @brief Seteamos las propiedades que tendra el archivo
* xlsx generado
******************************************************/
//echo date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("UTEM");
$objPHPExcel->getProperties()->setLastModifiedBy("SIAPP");
$objPHPExcel->getProperties()->setTitle("Estado Alumnos");
$objPHPExcel->getProperties()->setSubject("consulta estado alumnos");
$objPHPExcel->getProperties()->setDescription("estados");

/**
*******************************************************
* @brief Agregamos los datos a las distintas celdas del
* archivo a exportar
******************************************************/
//echo date('H:i:s') . " Add some data\n";
$objPHPExcel->setActiveSheetIndex(0);
$result2 = mysql_query($query) or die(mysql_error());
$c=2;
if ($row3 = mysql_fetch_assoc($result2))
{
$objPHPExcel->getActiveSheet()->setCellValue('A1', "Carrera");
$objPHPExcel->getActiveSheet()->setCellValue('B1', "Nombres");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Apellidos");
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Rut");
$objPHPExcel->getActiveSheet()->setCellValue('E1', "Estado");
$objPHPExcel->getActiveSheet()->setCellValue('F1', "Año Ingreso");
do
{
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$c, $row3['codigo']);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$c, $row3['nombres']);
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$c, $row3['apellidos']);
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$c, $row3['rut']);
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$c, $row3['estado']);
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$c, $row3['anio_ingreso']);
	$c++;	
}while($row3 = mysql_fetch_assoc($result2));
}

/**
*******************************************************
* @brief Renombramos el archivo
******************************************************/
//echo date('H:i:s') . " Rename sheet\n";
$objPHPExcel->getActiveSheet()->setTitle('Estado Alumnos');

/**
*******************************************************
* @brief Ponemos los titulos en negrita
******************************************************/
//echo date('H:i:s') . " Set title row bold\n";
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);


/**
*******************************************************
* @brief Seteamos filtrado automatico en la planilla
******************************************************/
//echo date('H:i:s') . " Set autofilter\n";
$objPHPExcel->getActiveSheet()->setAutoFilter('A1:F'.$c);	// Always include the complete filter range!
														// Excel does support setting only the caption
														// row, but that's not a best practise...

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

		
// Save Excel 2007 file
//echo date('H:i:s') . " Write to Excel2007 format\n";
//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

//Redirect output to a clients web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Estados.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}
else
{
	header("Location: " . $config_basedir);
}
?>