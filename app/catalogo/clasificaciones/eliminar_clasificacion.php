<?php
include ('../../config/config.php');
include ('../../config/conexion.php');

$clase = $_GET['clase'];

$sentencia_eliminar = $pdo->prepare('DELETE FROM clasificacion WHERE clasificacion.clase = :clase');
$sentencia_eliminar->bindParam(':clase',$clase);

$sentencia_eliminar->execute();

header("Location: ../consultar_materiales.php");
exit();

?>