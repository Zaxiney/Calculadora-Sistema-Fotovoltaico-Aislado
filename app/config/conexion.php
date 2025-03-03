<?php

/*
 * Archivo de conexión a la base de datos
 * 23/02/2025
*/

//Llamada a la base de datos (BD_SISTEMA) en el servidor (BD_SERVIDOR)
$servidor = "mysql:dbname=".BD_SISTEMA.";host=".BD_SERVIDOR;

try{
    $pdo = new PDO($servidor, BD_USUARIO, BD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "<script>alert('Conexión Exitosa a la base de datos.');</script>";

}catch (PDOException $e){
    echo "<script>alert('Error al conectar a la base de datos.');</script>";

}
?>