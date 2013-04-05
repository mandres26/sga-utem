<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Justificativo 2140</title>
<link rel="stylesheet" type="text/css" href="estilos/estilo2.css"/>
<script language="javascript" type="text/javascript" src="javascript/javascript.js"></script>
<script src="jquery/jquery.js" type="text/javascript"></script> 
<script src="jquery/jquery.Rut.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#rut_demo_5').Rut({
  on_error: function(){ alert('Rut incorrecto'); },
  format_on: 'keyup' 
});
$("#content > ul").tabs();
});

function valida_envia(){ 
   	//valido el nombre 
   	if (document.pdf.nombre_profesor.value.length==0){ 
      	 alert("Escribe el Nombre del Profesor") 
      	 document.pdf.nombre_profesor.focus() 
      	 return 0; 
   	} 
    if (document.pdf.nombre_alumno.value.length==0){ 
      	 alert("Escribe Tú Nombre") 
      	 document.pdf.nombre_alumno.focus() 
      	 return 0; 
   	} 
	if (document.pdf.rut_demo_5.value.length==0){ 
      	 alert("Escribe Tú RUT") 
      	 document.pdf.rut_demo_5.focus() 
      	 return 0; 
   	}
	if (document.pdf.fecha.value.length==0){ 
      	 alert("Escribe la fecha del justificativo") 
      	 document.pdf.fecha.focus() 
      	 return 0; 
   	}
	if (document.pdf.nombre_asignatura.value.length==0){ 
      	 alert("Escribe la asignatura") 
      	 document.pdf.nombre_asignatura.focus() 
      	 return 0; 
   	}
	if (document.pdf.justificativo.selectedIndex==0){
		alert("Debe seleccionar que Justificará.")
		document.pdf.justificativo.focus()
		return 0;
	}
		alert("Espera el mensaje de envío exitoso. Muchas Gracias!!!"); 
   	document.pdf.submit();
} 
</script>
</head>
<body style="background-color:#c4e4f8">

<div class="sub_content6">
<p style="text-align:center; font-weight:bold; text-decoration:underline">Justificativo 2145</p>
<p>Por favor complete todos los datos requeridos para dar formato al formulario seleccionado.</p>
<form name="pdf" action="procesar2145.php" method="post" onsubmit="valida_envia(); return false;">
<div class="campoform2">
<strong>Dirigida al Profesor</strong>:
<input type="text" onkeypress="return soloLetras(event)" name="nombre_profesor" size="35" maxlength="200" />
</div>
<br />
<div class="campoform2-1">
<strong>Tu Nombre</strong>:
<input type="text" onkeypress="return soloLetras(event)" name="nombre_alumno" size="35" maxlength="200" />
</div>
<br />
<div class="campoform2-2">
<strong>Tu RUT</strong>:
<input type="text" id="rut_demo_5" name="rut_demo_5" size="12" maxlength="200" />
</div>
<br />
<div class="campoform2-3">
<strong>Fecha Justificativo</strong>:
<input type="text" onBlur="esFechaValida(this);" name="fecha"  maxlength="10" />
</div>
<br />
<div class="campoform2-4">
<strong>Asignatura</strong>:
<input type="text" onkeypress="return soloLetras(event)" name="nombre_asignatura" size="35" maxlength="200" />
</div>
<br />
<div>
<div class="justificativo">
<strong>Justificativo:</strong>
<select name="justificativo">
    <option value="Elegir">Elegir
	<option value="Cátedra">Cátedra
	<option value="Control">Control
	<option value="Laboratorio">Laboratorio
	<option value="Prueba">Prueba
</select>
</div>
</div>
<br /><br />
<div class="campoform">
<input type="reset" value="Limpiar" />
</div>
<div class="campoform">
<input type="submit" value="Enviar PDF" />
</div>
</form>

</div>
</body>
</html>