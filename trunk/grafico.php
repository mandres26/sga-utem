<html>
<head>
<script type="text/javascript" src="media/ofc/js/swfobject.js"></script>
<?php
/**
/******************************************************
* @file grafico.php
* @brief Archivo que genera los graficos de los datos consultados en Flash
* @author 
* @version 1.0
* @date 2012
*******************************************************/
/**
* Url a visitar
*/
$url = "graficodb.php?carrera=".$_GET['carrera']."&anio=".$_GET['anio'];
/**
* codificamos la url ya que la usara un swfobject 
*/
$url2 = urlencode($url);
?>
<script type="text/javascript">
 swfobject.embedSWF("open-flash-chart.swf", "grafico_pie", "550", "300", "9.0.0", "expressInstall.swf", 
 {"data-file":"<?php echo $url2; ?>", "loading":"Cargando datos..."} );
</script>
</head>
<body>

<div id="grafico_pie">
<p>Necesita Flash</p>
</div>

</body>
</html>