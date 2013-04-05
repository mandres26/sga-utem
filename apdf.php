<?php
session_start();
ob_start();
/**
******************************************************
* @file apdf.php
* @brief Archivo exporta los datos consultados (Estados) a PDF
* @author 
* @version 1.0
* @date 2012
*******************************************************/
require("config.php");
if(isset($_SESSION['USERID']) == TRUE){
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpassword);
//Select Database
mysql_select_db($dbdatabase) or die(mysql_error());
mysql_query("SET NAMES utf8") or die(mysql_error());
/**
*******************************************************
* @brief Consultas de estado para generas los archivos PDF
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

//Require fpdf class
require('media/fpdf/mysql_table.php');
/**
******************************************************
* @brief Clase para exportar datos a PDF, usando una implementacion para bases de datos MySQL
******************************************************/
class PDF extends PDF_MySQL_Table
{
/**
************************************************************
* @brief Constructor Header(), Seteara los valores con los que se crearan los archivos PDF
*************************************************************/
function Header()
{
    //Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Estado Alumnos',0, 1, 'C');
    $this->Ln(10);
    //Ensure table header is output
    parent::Header();
}
}

$pdf = new PDF();
$pdf->AddPage();

//First table: put all columns automatically
$pdf->Table($query);
           
$pdf->Output();
}
else
{
	header("Location: " . $config_basedir);
}
?>
