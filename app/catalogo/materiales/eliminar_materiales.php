<?php
include ('../../config/config.php');
include ('../../config/conexion.php');

$clave_material = $_GET['clave_material'];

$sentencia_eliminar = $pdo->prepare('DELETE FROM materiales WHERE materiales.clave = :clave_material');
$sentencia_eliminar->bindParam(':clave_material',$clave_material);

$sentencia_eliminar->execute();

header("Location: ../consultar_materiales.php");
exit();

?>