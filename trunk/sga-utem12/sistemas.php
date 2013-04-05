<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ofertas Sistemas de Gestión</title>
<link rel="stylesheet" type="text/css" href="../estilos/estilo2.css"/>
     <?
	 include ("cabezera2.php")
	 ?> 
</head>
<body>

<div id="secciones" style=" margin-top:15px">
        <h2>Secciones</h2>
        <a href="ver_oferta.php" class="mislinks" >Todas las ofertas</a><br><br>
         <a href="industrial.php" class="mislinks" >Industrial</a><br><br>
         <a href="agroindustria.php" class="mislinks" >Agroindustrias</a><br><br>
         <a href="sistemas.php" class="mislinks" >Sistemas de Gestión</a><br><br>
         <a href="enviar_oferta.php" class="mislinks" >Crear ofertas</a><br><br>
        </div>

<div class="content4">
<p>Aquí puedes ver todas las ofertas laborales creadas en el sistema para la carrera Ingeniería Civil Industrial mención Sistemas de Gestión.</p>
<?
include_once ("funciones_comunes.php");
//base de datos conectada en funciones comunes.php :D

$ssql = "select * from oferta,carrera where oferta.id_carrera = carrera.id_carrera and carrera.id_carrera=21044 order by id_oferta desc limit 4";
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