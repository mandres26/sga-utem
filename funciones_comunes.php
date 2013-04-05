<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?
//session_start();
function conecta_base_datos(){
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("tablon");
	return $conexion;
	}
$conexion = conecta_base_datos();

function dame_nombre_pais($id){
	if (ctype_digit($id)){
	$ssql = "select nombre_pais from pais where id_pais= " . $id ;
	$rs = mysql_query($ssql);
	if(mysql_num_rows($rs)>0){
	$fila = mysql_fetch_array ($rs);
	} return "Pais deconocido";
	return $fila["nombre_pais"];
	}else{
		return false;
		  }


}
function autenticado(){
//compruebo si existen variables de sesion
if(isset($_SESSION["nombre_usuario"]) && isset($_SESSION["apellidos_usuario"]) && isset($_SESSION["email_usuario"])&&   isset($_SESSION["contrasena_usuario"])){
$ssql="select nombre from usuario where email='" . $_SESSION["email_usuario"] . "' and contrasena='" .
       md5($_SESSION["contrasena_usuario"]) . "'";
	   //echo"<p>" . $ssql. "</p>";
//compruebo si la sentencia sql de buscar al usuario va bien (Y).
if($record_usuario = mysql_query($ssql)){
//compruebo si me devuelve solo 1 usuario 
 if(mysql_num_rows($record_usuario) == 1){
//compruebo si mi usuario tiene el mismo nombre de la variable de sesion 
 $usuario_encontrado = mysql_fetch_array($record_usuario);
   if($usuario_encontrado["nombre"] == $_SESSION["nombre_usuario"]){
//si todo da positivo, devuelvo el true   
   return true;
   }
 }
}

}
// si algo falló, devuelvo falso
return false;
}

function muestra_usuario(){
if(autenticado()){
echo '<div id="muestrausuario">';
echo '<img src="img/user_photo.jpg" width="41" height="48">
      Bienvenido:
	  <br>
	  <b>' . $_SESSION["nombre_usuario"] . '</b>';
echo '</div>';
	}	 
}?>
</body>
</html>