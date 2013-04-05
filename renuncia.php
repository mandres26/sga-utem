<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de Renuncia</title>
<link rel="stylesheet" type="text/css" href="estilos/estilo2.css"/>
<script language="javascript" type="text/javascript" src="javascript/javascript.js"></script>
<script src="jquery/jquery.js" type="text/javascript"></script> 
<script src="jquery/jquery.Rut.js" type="text/javascript"></script>
<script type="text/javascript">
function isValidEmail(stremail){
  validRegExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/ ; if (stremail.search(validRegExp) == -1) {
    return false;
  }
  return true;
}
function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}

function contador (campo, cuentacampo, limite) {
if (campo.value.length > limite) campo.value = campo.value.substring(0, limite);
else cuentacampo.value = limite - campo.value.length;
}

$(document).ready(function(){
$('#rut_demo_5').Rut({
  on_error: function(){ alert('Rut incorrecto'); },
  format_on: 'keyup' 
});
$("#content > ul").tabs();
});

function valida_envia(){ 
   	//valido el nombre 
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
      	 alert("Escribe la fecha de la Reunión") 
      	 document.pdf.fecha.focus() 
      	 return 0; 
   	}
	if ((document.pdf.email.value.length==0)|| !isValidEmail(document.pdf.email.value)){ 
      	 alert("Escribe Tú Correo Electrónico correctamente") 
      	 document.pdf.email.focus() 
      	 return 0; 	 
   	}
	if (document.pdf.carrera.selectedIndex==0){
		alert("Debe seleccionar su Carrera.")
		document.pdf.justificativo.focus()
		return 0;
	}
	if (document.pdf.motivo_renuncia.value.length==0){ 
      	 alert("Escribe Tú Problema") 
      	 document.pdf.motivo_renuncia.focus() 
      	 return 0; 
   	}
		alert("Espera el mensaje de envío exitoso. Muchas Gracias!!!"); 
   	document.pdf.submit();
} 
</script>
</head>
<body style="background-color:#c4e4f8">

<div class="sub_content8">
<p style="text-align:center; font-weight:bold; text-decoration:underline">Formulario de Renuncia</p>
<p>Por favor complete todos los datos requeridos para dar formato al formulario seleccionado.</p>
<form name="pdf" action="procesar_renuncia.php" method="post" onsubmit="valida_envia(); return false;">
<div class="atencion_campoform1">
<strong>Nombre</strong>:
<input type="text" onkeypress="return soloLetras(event)" name="nombre_alumno" size="35" maxlength="200" />
</div>
<br />
<div class="atencion_campoform2">
<strong>RUT</strong>:
<input type="text" id="rut_demo_5" name="rut_demo_5" size="12" maxlength="200" />
</div>
<br />

<div class="campoform2-3">
<strong>Fecha de Presentación</strong>:
<input type="text" onBlur="esFechaValida(this);" name="fecha"  maxlength="10" />
</div>
<br />

<div class="atencion_campoform3">
<strong>Correo Eléctronico</strong>:
<input type="text" name="email" id="email" />
</div>
<br />

<div>
<strong>Carrera:</strong>
<select name="carrera" class="atencion_campoform5">
    <option value="Elegir">Elegir
	<option value="Ing. Civil Ind. men. Agroindustria">Ing. Civil Ind. men. Agroindustria
	<option value="Ing. Civil Ind. men. Sistemas de Gestión">Ing. Civil Ind. men. Sistemas de Gestión
	<option value="Ingeniería Industrial">Ingeniería Industrial
</select>
</div>
<br />

<div class="campoform2-3">
<strong>Motivo de la Renuncia:</strong>              
<br>
<textarea name="motivo_renuncia" wrap=physical cols="40" rows="5" onKeyDown="contador(this.form.motivo_renuncia,this.form.remLen,350);" onKeyUp="contador(this.form.motivo_renuncia,this.form.remLen,350);"></textarea>
<input type="text" name="remLen" size="3" maxlength="3" value="350" readonly>te quedan todavía
</div>
<br />
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