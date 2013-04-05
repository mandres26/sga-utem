<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ofertas Agroindustrias</title>
<link rel="stylesheet" type="text/css" href="../estilos/estilo2.css"/>
     <?
	 include ("cabezera2.php")
	 ?> 
</head>
<body>
<div class="content4">
<p class="parrafo_oferta">Aquí puedes ver todas las ofertas laborales creadas en el sistema para la carrera Ingeniería Civil Industrial mención Agroindustrias.</p>
<?
include_once ("funciones_comunes.php");
//base de datos conectada en funciones comunes.php :D

$ssql = "select * from oferta,carrera where oferta.id_carrera = carrera.id_carrera and carrera.id_carrera=21040 order by id_oferta desc limit 4";
$rs = mysql_query($ssql);
if(mysql_num_rows($rs)){
while ($fila = mysql_fetch_array($rs)){
	echo "<div class='cuadroferta'>";
	echo "<p><b>Empresa: </b>" . $fila["titulo_oferta"];
    echo "<br>";
	echo "<b>Descripción: </b>" . $fila["detalle_oferta"];
	echo "<br>";
	echo "<b>Contacto: </b>" . $fila["correo_oferta"];
	echo "</div>";
	}
}else{
	echo "<p>No se han encontrado ofertas laborales para mostrar</p>";
	}
	
?>

</div>
<div id="footer">
        <?
	    include ("pie.php")
	    ?>       
        </div>

</body>
</html>