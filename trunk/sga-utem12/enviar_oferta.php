<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Crear Ofertas</title>
<link rel="stylesheet" type="text/css" href="../estilos/estilo2.css"/>
<SCRIPT language="JavaScript" type="text/javascript">

function contador (campo, cuentacampo, limite) {
if (campo.value.length > limite) campo.value = campo.value.substring(0, limite);
else cuentacampo.value = limite - campo.value.length;
}

</script>
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

<div class="content3">
<?
include_once ("funciones_comunes.php");

//base de datos conectada en funciones comunes.php :D

if ($_POST){
	if ($_POST["titulo_oferta"]==""){
    echo '<script language="javascript"> alert("Insertar titulo de la oferta por favor");</script>';
}   elseif($_POST["detalle_oferta"]==""){
	echo '<script language="javascript"> alert("Insertar el detalle de la oferta por favor");</script>';
}   elseif($_POST["correo_oferta"]==""){
	echo '<script language="javascript"> alert("Insertar el correo de la oferta por favor");</script>';	
}   else{
	echo "<br>";
	$ssql = "insert into oferta (titulo_oferta,detalle_oferta, correo_oferta ,id_carrera) 
	         values('" . $_POST["titulo_oferta"] ."' , '" . $_POST["detalle_oferta"] ."' , '" . $_POST["correo_oferta"] ."' , " . $_POST["id_carrera"] . ")";
    if(mysql_query($ssql)){
	echo '<script language="javascript"> alert("Oferta laboral creada exitosamente");</script>';
	}else{
	echo '<script language="javascript"> alert("Error al insertar oferta laboral");</script>' . mysql_error();	
	}
}
}
else {
	}
?>




<p>Crea Ofertas laborales para los alumnos de la Escuela de Industria de la Universidad Tecnológica Metropolitana. Puedes perfilar la oferta si está dirigida a alguna carrera en especial</p>

<form action="<? echo $_SERVER["PHP_SELF"]?>" method="post">
<div class="campoform">
Empresa:
<br>
<input type="text" name="titulo_oferta" size="35" maxlength="200" />
</div>
<div class="campoform">
Detalle de la Oferta                    
<br>
<textarea name="detalle_oferta" wrap=physical cols="30" rows="9" onKeyDown="contador(this.form.detalle_oferta,this.form.remLen,250);" onKeyUp="contador(this.form.detalle_oferta,this.form.remLen,250);"></textarea>
<input type="text" name="remLen" size="3" maxlength="3" value="250" readonly>te quedan todavía
</div>
<div class="campoform">
Email:
<br>
<input type="text" name="correo_oferta" size="35" maxlength="200" />
</div>
<div class="campoform">
Dirigida a la carrera:
<br>
<select name="id_carrera"> 
<?
$ssql = "select * from carrera order by nombre_carrera";
$rs = mysql_query($ssql);
while($fila = mysql_fetch_array($rs)){
	echo "<option value = " . $fila["id_carrera"]   . ">" . $fila["nombre_carrera"] . "</option>"; 
	}
	
mysql_free_result($rs);
?>
</select>
</div>
<div class="campoform">
<input type="submit" value="Crear" />
</div>
</form>
</div>
<?
//mysql_close($conexion);
?>
<div id="footer">
        <?
	    include ("pie.php")
	    ?>       
        </div>
</body>
</html>