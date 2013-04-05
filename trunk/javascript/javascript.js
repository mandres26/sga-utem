// JavaScript Document

// Función que comprueba que existan solo letras en el campo del formulario incluyendo copy-paste.
//----------------------------------------------------------------------------------------------------
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8,37,39,46];

    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}
function limpia(){
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i=0;i<tam;i++){
 if(!isNaN(val[i]))
 document.getElementById("miInput").value='';
    }
}
//---------------------------------------------------------------------------------------------------
//Funcion  para validar las fechas ingresadas en los formularios.
function esFechaValida(fecha){
    if (fecha != undefined && fecha.value != "" ){
        if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha.value)){
            alert("formato de fecha no válido (dd/mm/aaaa)");
            return false;
        }
        var dia  =  parseInt(fecha.value.substring(0,2),10);
        var mes  =  parseInt(fecha.value.substring(3,5),10);
        var anio =  parseInt(fecha.value.substring(6),10);
 
    switch(mes){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            numDias=31;
            break;
        case 4: case 6: case 9: case 11:
            numDias=30;
            break;
        case 2:
            if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
            break;
        default:
            alert("Fecha introducida errónea");
            return false;
    }
 
        if (dia>numDias || dia==0){
            alert("Fecha introducida errónea");
            return false;
        }
        return true;
    }
}
function comprobarSiBisisesto(anio){
if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
    return true;
    }
else {
    return false;
    }
}

//----------------------------------------------------------------------------------------------------
//Función para validar que los campos del formulario estén correctamente completados para poder enviarlo a traves del correo electronico.

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
	if (document.pdf.justificativo.value.length==0){ 
      	 alert("Selecciona la Opción de Justificativo") 
      	 document.pdf.justificativo.focus() 
      	 return 0; 
   	}
   	/*valido la edad. tiene que ser entero mayor que 18 
   	edad = document.fvalida.edad.value 
   	edad = validarEntero(edad) 
   	document.fvalida.edad.value=edad 
   	if (edad==""){ 
      	 alert("Tiene que introducir un número entero en su edad.") 
      	 document.fvalida.edad.focus() 
      	 return 0; 
   	}else{ 
      	 if (edad<18){ 
         	 alert("Debe ser mayor de 18 años.") 
         	 document.fvalida.edad.focus() 
         	 return 0; 
      	 } 
   	} 
  
	
   	//valido el interés 
   	if (document.fvalida.interes.selectedIndex==0){ 
      	 alert("Debe seleccionar un motivo de su contacto.") 
      	 document.fvalida.interes.focus() 
      	 return 0; 
   	} 
    */
   	//el formulario se envia 
   	alert("Muchas Gracias por Completar el Formulario Correctamente"); 
   	document.pdf.submit();
} 





