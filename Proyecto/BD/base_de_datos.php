<?php

$contraseña = "SoyEduardo1";
$usuario = "EduardoRTX";
$nombre_base_de_datos = "TiendaInformatica";
try{
    //creamos el objeto conector
	$base_de_datos = new PDO('mysql:host=leonmunozeduardo-db.c0iucejz0d7p.eu-west-3.rds.amazonaws.com;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
    //ajustamos la consulta
	$base_de_datos->query("set names utf8mb4;");
    //Establecemos atributos a las variables
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>