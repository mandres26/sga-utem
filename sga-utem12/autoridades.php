<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Autoridades</title>
        <link rel="stylesheet" type="text/css" href="../estilos/estilo2.css"/>
        <?
	     include ("cabezera2.php")
	    ?> 
    </head>
    <body>
        <div id="secciones" style=" margin-top:15px">
        <h2>Secciones</h2>
         <a href="autoridades.php" class="mislinks" >Autoridades</a><br><br>
         <a href="jornadacompleta.php" class="mislinks" >Jornada Completa</a><br><br>
         <a href="jornadaparcial.php" class="mislinks" >Jornada Parcial</a><br><br>
        </div>
        
        <div id="presentacion">
     
        <p>A continuación las ilustres autoridades de la Escuela de Industria de la UTEM:</p>
        
        <table class="cuest">
        <caption style="font-size:16px"><strong>Autoridades Escuela de Industria</strong></caption>
            <tr>
            <th style="text-align:center;background-color:#CCC">Cargo</th>
            <th style="text-align:center;background-color:#CCC">Nombre</th>
            <th style="text-align:center;background-color:#CCC">Información</th>
            </tr>
            
            <tr>
            <td>Director de Departamento de Industria</td>
            <td>Carolina Parodi Dávila</td>
            <td style="text-align:center"><input type="button" value="Ver Información" src="info_profesores/cparodi.html"  onClick="window.open(this.src, this.target, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=640, height=330');return false;" /></td>
            </tr>  
            <tr>
            <td>Jefe de Carrera Ingeniería Civil Industrial m/ Sistemas</td>
            <td>Rodrigo Geldes Requena</td>
            <td style="text-align:center"><input type="button" value="Ver Información" src="info_profesores/rgeldes.html"  onClick="window.open(this.src, this.target, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=640, height=330');return false;" /></td>
            </tr>  
            <tr>
            <td>Jefe de Carrera Ingeniería Civil Industrial m/ Agroindustria</td>
            <td>Rafael Loyola Berríos</td>
            <td style="text-align:center"><input type="button" value="Ver Información" src="info_profesores/rloyola.html"  onClick="window.open(this.src, this.target, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=640, height=330');return false;" /></td>
            </tr>
        </table>     
        </div> 
        
        <div id="footer">
        <?
	    include ("pie.php")
	    ?>       
        </div>
</body>
</html>
