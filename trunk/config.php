<?php
/**
******************************************************
* @file config.php
* @brief Archivo que guarda las preferencias a la hora de 
* conectarse a la base de datos MySQL
* @author 
* @version 1.0
* @date 2012
*******************************************************/
/**
* host de la base de datos
*/
$dbhost = "localhost";
/**
* usuario de la bdd
*/
$dbuser = "root";
/**
* password BDD
*/
$dbpassword = "";
/**
* BDD a usar
*/
$dbdatabase = "u133858900_tablon";
/**
* Nombre amostrar en la ventana del navegador
*/
$config_name = "SGA - DEPARTAMENTO INDUSTRIAS UTEM";
/**
* ubicacion de la raiz del sitio
*/
//$config_basedir = "http://localhost/psvn/web/";
$config_basedir = "http://localhost:8080/prueba";
//$config_basedir = "http://alumnos.informatica.utem.cl/asignaturas/INF639/2010/1/los_magnificos/";
ini_set('memory_limit', 32 * 1024 * 1024);
?>